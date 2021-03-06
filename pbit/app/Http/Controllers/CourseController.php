<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\TrailerVideo;
use VideoThumbnail;
use Carbon\Carbon;
use App\Document;
use App\Chapter;
use App\Helper;
use App\Video;
use App\Topic;
use App\Item;
use Session;
use Auth;
use Cart;
use DB;
use CloudFrontUrlSigner;

class CourseController extends Controller
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
        $courses = Course::orderBy('id','desc')->get();
        return view('admin.pages.courses.index',compact('courses'));
    }

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.courses.add');
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
            'course_name' => 'required|string|max:255|unique:courses',
            'course_title' => 'required|string|max:255',
            'course_price' => 'required|max:11',
            'actual_price' => 'required|max:11',
            'course_description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'video' => 'required|mimes:avi,mpeg,mp4',
            'document.*' => 'mimes:doc,pdf,docx'
        ]);

        if($validator->fails()){
            
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

               $image = '';
               $video = $document = '';

               // save thumbtail
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $image =  str_random(20) . '.' . $file->getClientOriginalExtension();
                    $file->move($this->upload_path.'/thumnail/', $image);
                }

               $course_id =  Course::insertGetId([
                    'user_id' =>Auth::id(),
                    'course_name' => $input['course_name'], 
                    'course_title' => $input['course_title'],
                    'slug' => str_slug($input['course_name'], '-'),
                    'course_price' => $input['course_price'],
                    'actual_price' => $input['actual_price'],
                    'course_description' => $input['course_description'],
                    'image' => $image,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                // save video
                if($request->hasFile('video')){
                        $file = $request->file('video');
                        Helper::upload_video($course_id,$file,'course');
                }

                // save document
                if($request->hasFile('document')){

                    foreach($request->file('document') as $file){
                        $document = $course_id.'_'.str_random(20) . '.' . $file->getClientOriginalExtension();
                        $file->move($this->upload_path.'/documents', $document);
                        Document::create([
                            'parent_id' => $course_id, 
                            'parent_type' => 'course', 
                            'document_url' => $document
                        ]);
                    }
                }

                $topiscussesscreated= __('Course Successfully Created');
                $request->session()->flash('status', $topiscussesscreated);
                return redirect('admin/courses');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('id', $id)->first();

        $video_url =  CloudFrontUrlSigner::sign('https://d3gpe1urc8fnib.cloudfront.net/course/'.$course->video->url, Carbon::now()->addHours(2) );
        return view('admin.pages.courses.edit',compact('course','video_url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $course_id = $id;       
        $validator =  Validator::make($input, [
            'course_name' => 'required|string|max:255|unique:courses,course_name,'.$id,
            'course_title' => 'required|string|max:255',
            'course_price' => 'required|max:11',
            'actual_price' => 'required|max:11',
            'course_description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'video' => 'mimes:avi,mpeg,mp4',
            'document.*' => 'mimes:doc,pdf,docx'
        ]);

        if($validator->fails()){
            
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

               $video = $document = '';
               $course = Course::find($course_id);
               // save thumbtail
                if($request->hasFile('image')){
                  // delete old file
                    @unlink($this->upload_path.'/thumnail/'.$course->image);
                    $file = $request->file('image');
                    $course->image =  str_random(20) . '.' . $file->getClientOriginalExtension();
                    $file->move($this->upload_path.'/thumnail', $course->image);
                }

                $course->course_name = $input['course_name'];
                $course->slug  =  str_slug($input['course_name'], '-'); 
                $course->course_title = $input['course_title'];
                $course->course_description = $input['course_description'];
                $course->course_price = $input['course_price'];
                $course->actual_price = $input['actual_price'];
                $course->publish = $input['publish'];
                $course->updated_at = date('Y-m-d H:i:s');
                $course->save();
                // save video
                if($request->hasFile('video')){
                   // delete old videos
                      $will_delete_video = Video::where([ 
                                                       ['parent_type','=','course'],
                                                       ['parent_id','=',$course_id],
                                                       ])->get();                      
                      if(count($will_delete_video)){
                        foreach ($will_delete_video as $del_video) {
                          Storage::disk('s3')->delete('course/' . $del_video->url);
                          DB::table('temp_video_links')->where('video_name',$del_video->url)->delete();
                          Video::where('id',$del_video->id)->delete();
                        }
                      }
                    // save video
                    $file = $request->file('video');
                    Helper::upload_video($course_id,$file,'course');
                }

                // save document
                if($request->hasFile('document')){
                    foreach($request->file('document') as $file){
                        $document = $course_id.'_'.str_random(20) . '.' . $file->getClientOriginalExtension();
                        $file->move($this->upload_path.'/documents', $document);
                        Document::create([
                            'parent_id' => $course_id, 
                            'parent_type' => 'course',
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
                          Document::where('id',$del_doc->id)->delete();
                        }
                      }
                  }

                $topiscussesscreated= __('Course Successfully Updated');
                $request->session()->flash('status', $topiscussesscreated);
                return redirect('admin/courses');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $orders =  Item::where('item_id',$id)->groupBy('order_id')->pluck('order_id');
      if(count($orders)){
         $topiscussesscreated= __("This Course can't be deleted. if you want to delete this course must delete Order Number # = ".implode(',', $orders->toArray()) );
         session()->flash('error', $topiscussesscreated);
         return redirect()->back();
      }

      //die("&&&"); 

      // cource completely delete form server
        Course::where('id',$id)->delete();
        Helper::delete_video($id,'course');
        Helper::delete_trailer_video($id,'course');        
        // cource's chapters completely delete form server
        $chapters =  Chapter::where('course_id',$id)->get();
        if($chapters){
          foreach ($chapters as $key => $chapter) {
             Helper::delete_video($chapter->id,'chapter');
             Helper::delete_trailer_video($chapter->id,'chapter');
             $chapter->delete();
          }
        }
      
        // cource's topics completely delete form server
        $topics =  Topic::where('course_id',$id)->get();
        if($topics){
          foreach ($topics as $key => $topic) {
            Helper::delete_video($topic->id,'topic');
            Helper::delete_trailer_video($topic->id,'topic');
            $topic->delete();
          }
        }
        return redirect()->back();
    }


    public function singlecourse(Request $request,$name){
            $courses_exist = Course::where('courses.course_name', $name)->first();                
            if($courses_exist){
                $getchapter=DB::table('chapters')           
                ->where('chapters.course_id',$courses_exist->id)->paginate(5);
                
                foreach ($getchapter as $key => $value) {                     
                    $counttopic =DB::table('topics')->where('topics.chapter_id',$value->id)->count();
                    // $trielvideoget =DB::table('trailer_videos')->where([
                    //                                                 ['parent_id', '=' ,  $value->id],
                    //                                                 ['parent_type', '=' , 'chapter']
                    //                                               ])->first();
                    // $value->trailer_url=$trielvideoget->trailer_url;
                    $value->totalcount =$counttopic;                          
                }
               //print_r($getchapter);                
              return view('singlecourse',['current_course' => $courses_exist,'title'=>'','breadcrum'=>'course/'.$name.'','chapter_list' => $getchapter,'class'=> $courses_exist->course_name,'type'=>"innerpage"]);
            }else{
                echo ('This page has expired'); die;
            }            
    }

    public function courselist(Request $request)
    {       
        $courselist = Course::get();        
        if(count($courselist)>0){
                 // print_r($courselist);
                if(count(Cart::content())){         
                    $tiems= Cart::content();            
                    foreach ($tiems as $key => $value) {                       
                            $existcourse[]= $value->id;  

                    }

                    if(count($existcourse)>0){  $existcourse=$existcourse; }
                }else{
                  $existcourse=array();
                }              
           return view('courselist',['courselist' => $courselist, 'title'=>'','exitarray'=>$existcourse,'breadcrum'=>'course','class'=>'courses','type'=>"innerpage"]);
         }else{
          return redirect('/');
         }            
    }
   public function sampleVideo($name){   
		    $courses_exist=DB::table('topics')
              ->leftJoin('courses', 'courses.id', '=', 'topics.course_id')           
              ->select('topics.*',  'courses.course_name')
              ->where('topics.slug', $name)->first();
                //print_r($courses_exist); 	
        if($courses_exist){
            $courselist =Topic::where([
                ['publish','=',true],
                ['course_id','=',$courses_exist->course_id],
            ])->paginate(5);
           
            $trialVideo = DB::table('trailer_videos')->where([['parent_id', '=', $courses_exist->id],['parent_type','=','topic']])->get();
            if(count($trialVideo) > 0){ 
            $topicDetail = DB::table('topics')->where([['id', '=', $courses_exist->id]])->get();
			return view('user.video-detail',['lists' => $courselist,'title'=>'','breadcrum'=>'topic/'.$name.'','class'=> $courses_exist->course_name,'type'=>"innerpage",'trialVideo' =>$trialVideo,'topicDetail'=>$topicDetail]);
			}else{
				 return redirect('/');
			}

        }else{
            return redirect('/');
        }        
    }

  public function show_cource_detail($slug){    
    $course = Course::join('items' , 'items.item_id','=','courses.id')
                     ->join('orders' , 'orders.id','=','items.order_id')
                     ->select('courses.*')
                     ->where([
                      ['courses.slug',$slug],
                      ['orders.user_id',Auth::id()]
                     ]
                     )->first();
    if(!$course){
      return redirect('/page_not_found');
    }
      return view('user.courseDetail',compact('course'));
  }

}