<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\TrailerVideo;
use VideoThumbnail;
use App\Document;
use App\Helper;
use App\Video;
use Auth;
use DB;

class ChapterController extends Controller
{



    private $upload_path;

    public function __construct()
    {
        # code...
        $this->upload_path = public_path('/uploads');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $chapters = Chapter::where([ ['publish', '=' , true ] ])->orderBy('id','desc')->get();
        return view('admin.pages.chapters.index',compact('chapters'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = DB::table('courses')->get();
        return view('admin.pages.chapters.add',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator =  Validator::make($input, [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'course_id' => 'required|alpha_num',
            'thumnail' => 'required|mimes:jpeg,jpg,png',
            'video' => 'required|mimes:avi,mpeg,mp4',
            'document' => 'required',
            'document.*' => 'mimes:doc,pdf,docx'
        ]);

        if($validator->fails()){
            
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

               $image = '';
               $video = $document = '';

               // save thumbtail
                if($request->hasFile('thumnail')){
                    $file = $request->file('thumnail');
                    $image =  str_random(20) . '.' . $file->getClientOriginalExtension();
                    $file->move($this->upload_path.'/thumnail/', $image);
                }

               $chapter_id =  Chapter::insertGetId([
                    'user_id' =>Auth::id(),
                    'title' => $input['title'],
                    'slug' => str_slug($input['title'], '-'),
                    'description' => $input['description'],
                    'course_id' => $input['course_id'],
                    'publish' => $input['publish'],
                    'image' => $image,
				    'created_at' => date('Y-m-d H:i:s')
                ]);

                // save video
                if($request->hasFile('video')){
                        $file = $request->file('video');
                        Helper::upload_video($chapter_id,$file,'chapter');
                }


                // save document
                if($request->hasFile('document')){

                    foreach($request->file('document') as $file){
                        $document = $chapter_id.'_'.str_random(20) . '.' . $file->getClientOriginalExtension();
                        $file->move($this->upload_path.'/documents', $document);
                        Document::create([
                            'parent_id' => $chapter_id, 
                            'parent_type' => 'chapter', 
                            'document_url' => $document
                        ]);
                    }
                }

                $topiscussesscreated= __('Chapter Successfully Created');
                $request->session()->flash('status', $topiscussesscreated);

                return redirect('admin/chapters');
        }

   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter = Chapter::where('id', $id)->first();
        $courses = DB::table('courses')->get();
        return view('admin.pages.chapters.edit',compact('courses','chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $chapter_id = $id;

        $validator =  Validator::make($input, [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'course_id' => 'required|alpha_num',
            'thumnail' => 'mimes:jpeg,jpg,png',
            'video' => 'mimes:avi,mpeg,mp4',
            'document.*' => 'mimes:doc,pdf,docx'
        ]);

        if($validator->fails()){
       
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

               $video = $document = '';
               $chapter = Chapter::find($chapter_id);

               // save thumbtail
                if($request->hasFile('thumnail')){

                  // delete old file
                    @unlink($this->upload_path.'/thumnail/'.$chapter->image);

                    $file = $request->file('thumnail');
                    $chapter->image =  str_random(20) . '.' . $file->getClientOriginalExtension();
                    $file->move($this->upload_path.'/thumnail', $chapter->image);
                }

                $chapter->title = $input['title'];
                $chapter->slug  =  str_slug($input['title'], '-');
                $chapter->description = $input['description'];
                $chapter->course_id = $input['course_id'];
                $chapter->publish = $input['publish'];
				$chapter->updated_at = date('Y-m-d H:i:s');
                $chapter->save();

                
                if($request->hasFile('video')){

                   // delete old videos
                    $will_delete_video = Video::where( [ 
                                                       ['parent_type','=','chapter'],
                                                       ['parent_id','=',$chapter_id],
                                                       ])->get();
                      if(count($will_delete_video)){
                        foreach ($will_delete_video as $del_video) {
                          Storage::disk('s3')->delete('chapter/' . $del_video->url);
                          DB::table('temp_video_links')->where('video_name',$del_video->url)->delete();
                          Video::where('id',$del_video->id)->delete();
                        }
                      }
                      // save new video
                    $file = $request->file('video');
                    Helper::upload_video($chapter_id,$file,'chapter');
                }
              
              
                // save document
                if($request->hasFile('document')){

                    foreach($request->file('document') as $file){
                        $document = $chapter_id.'_'.str_random(20) . '.' . $file->getClientOriginalExtension();
                        $file->move($this->upload_path.'/documents', $document);
                        Document::create([
                            'parent_id' => $chapter_id, 
                            'parent_type' => 'chapter',
                            'document_url' => $document
                        ]);
                    }
                }

                // delete old document
                if(!empty($request->document_ids)){
                  $will_delete_document = Document::whereIn('id',explode(',',$request->document_ids))->get();
                  if(count($will_delete_document)){
                    foreach ($will_delete_document as $del_doc) {
                      @unlink($this->upload_path.'/documents/'.$del_doc->document_url);
                      Document::where('id',$del_doc->id)->delete();;
                    }
                  }
                }
                $topiscussesscreated= __('chapter Successfully Updated');
                $request->session()->flash('status', $topiscussesscreated);

                return redirect('admin/chapters');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        //
    }
	
	public function get_chapters(Request $request){
		
		$course_id = $request->get('course_id');
		
		$chapters =  Chapter::select('id','title')->where([
		['publish','=', true],
		['course_id' , '=' , $course_id ]
		])->orderBy('title','ASC')->get();
		
		return \Response::json(['status' => 1 , 'data' => $chapters ]);
	}
}
