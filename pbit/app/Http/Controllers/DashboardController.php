<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Helper;
use App\Order;
use Response;
use App\User;
use App\Chapter;
use App\Topic;
use Auth;
use URL;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$courses =  Helper::get_user_byed_course(); 

       return view('user.dashboard',['title'=>'User dashboard' , 'courses' =>$courses]);
    }

    public function myorderlist(Request $request){
    	if(empty(Auth::user()->id)){
			return redirect('/');
		}	
		$id = Auth::user()->id;	
		$usersData = DB::table('orders')
            ->join('items', 'items.order_id', '=', 'orders.id')
			->join('courses', 'courses.id', '=', 'items.item_id')
            ->select('courses.*')
			->where([['orders.user_id', $id],['orders.status','complete']])	
			->orderBy('courses.id','asc')
            ->get();
			$userArray = DB::table('orders')->where('user_id', Auth::user()->id)->get();					 
        	return view('user.myorders',['userData' => $usersData,'title'=>'Orders','orderliist'=>$userArray]);

    }

    public function sigleorderlist(Request $request,$oderid){
    	if(empty(Auth::user()->id)){
			return redirect('/');
		}  
	    $id = Auth::user()->id;	
     
    	$itemsdetails = DB::table('items')->join('orders', 'order_id', '=', 'orders.id')->join('courses', 'courses.id', '=', 'items.item_id')->where('orders.id', $oderid)->where('orders.user_id', Auth::user()->id)->get();    	
    	if(count($itemsdetails)>0){    		
			return view('user.singleorder',['title'=>'Order Details','itemsdetails'=>$itemsdetails]);	
    	}else{    		 
    		return redirect('user-dashboard');	
    	}
    			
    }


    

	public function ratingondashboard(Request $request){
				 	if(empty(Auth::user()->id)){
						return redirect('/');
					}
		    $input = $request->all();		    
		  $count= DB::table('user_testimonial')->where([['user_id', Auth::user()->id],['item_id',$input['productid']]])->count();	
			if($count>0){
				DB::table('user_testimonial')
		            ->where([['user_id', Auth::user()->id],['item_id',$input['productid']]])		                        
		            ->update(['rating' => $input['rating']]);		     
			}else{
				DB::table('user_testimonial')->insert(['text' => '', 'user_id' => Auth::user()->id,'item_id'=>$input['productid'],'rating'=>$input['rating']]);
			}
	}
	
	public function search(Request $request)  
	{
		if ($request->ajax()) {
			$html = "";
			$input = $request->all();
			$data  = $input['search'];
			$searchData1 = DB::table('topics')->where('title','LIKE',"%$data%")->orderBy('id','desc')->take(15)->get();
			$searchData2 = DB::table('courses')->select('id','course_name as title')->where('course_name','LIKE',"%$data%")->orderBy('id','desc')->take(3)->get();
			$searchData1 = $searchData1->toArray();
			$searchData2 = $searchData2->toArray();
			$result = array_merge($searchData1,$searchData2);
			//print_r($result);
			
				if(!empty($result)){
					return json_encode($result);
				}else{
					return '[{"title":"Record not Found" }]';
				}
		}else{
			return response()->json(['status'=>0 , 'message'=> 'permission not granted']);
		}
	}
	
	public function userSearch(Request $request)  
	{
		
		if ($request->ajax()) {
			$html = "";
			$courseId = array();
			$input = $request->all();
		    $searchdata  = $input['search'];
			$id = Auth::user()->id;
			$usersData = DB::table('orders')
            ->join('items', 'items.order_id', '=', 'orders.id')
			->join('courses', 'courses.id', '=', 'items.item_id')
            ->select('courses.*')
			->where([['orders.user_id', $id],['orders.status','Complete']])	
			->orderBy('courses.id','asc')
            ->get();
			$result1 = array();
			$result2 = array();
			if ( count($usersData) > 0 ) {
				foreach($usersData as $key => $data){
					$courseId[] = $data->id;
				}
				$UserChapterData = DB::table('chapters')->where('title','LIKE',"%$searchdata%")->orderBy('id','desc')->take(15)->get();	
				if ( count($UserChapterData) > 0 ){
					foreach($UserChapterData as $chapter){
						if(in_array( $chapter->course_id,$courseId)){
							$coursegetsect = DB::table('courses')->where('id',$courseId)->first();	
							$chapter->course_name=$coursegetsect->slug;
							$result1[] = $chapter;
						}
					}
				}
				$UserTopicData = DB::table('topics')->where('title','LIKE',"%{$searchdata}%")->orderBy('id','desc')->take(15)->get();	
				if ( count($UserTopicData) > 0 ){
					foreach($UserTopicData as $topic){
						if(in_array( $topic->course_id,$courseId)){
							$chaptersselect = DB::table('courses')->leftjoin('chapters', 'chapters.course_id', '=', 'courses.id')->select('chapters.slug as chapter_slug','courses.slug as course_slug')->where('courses.id',$courseId)->first();	
							$topic->course_name=$chaptersselect->course_slug;							 
							$topic->chapter_name=$chaptersselect->chapter_slug;							 
							$result2[] = $topic;
						}
					}
				}
				if( (count($result1) > '0') && (count($result2) > '0')){
					$result = array_merge($result1,$result2);
					return json_encode($result);
				}elseif((count($result1) > 0) && (count($result2) <= 0)){
					$result = $result1;
					return json_encode($result);
					
				}elseif((count($result1) <= 0) && (count($result2) > 0)){
					$result = $result2;
					//dump($result);
					//die;
					//print_r($result);
					return json_encode($result);
					
				}else{
					return '[{"title":"Record not Found" }]';
				}
			}else{
				return '[{"title":"Record not Found" }]';
			}
			
		}else{
			return response()->json(['status'=>0 , 'message'=> 'permission not granted']);
		}
	}
	
	public function profile(){
		if(empty(Auth::user()->id)){
			return redirect('/');
		}		 
		$id = Auth::user()->id;
		$userArray = DB::table('users')->where('id', $id)->get();
		$userprofileData = $userArray->toArray();
		$usersData = DB::table('orders')
            ->join('items', 'items.order_id', '=', 'orders.id')
			->join('courses', 'courses.id', '=', 'items.item_id')
            ->select('courses.*')
			->where([['orders.user_id', $id],['orders.status','Complete']])	
            ->get();
		 return view('user.user-profile',['userData' => $usersData,'title'=>'User Profile','profiledata' =>$userprofileData]);
	}

	public function updateProfile(Request $request){
		
		$id = Auth::id();
		$input = $request->all();
        $validator =  Validator::make($input, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'userimg' => 'image|mimes:jpeg,jpg,png|max:10000',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();

        }else{
           

            $user = User::findOrFail($id);

             if($request->hasFile('userimg') && $request->file('userimg')->isValid()){
                $file = $request->file('userimg');
                $file_name = $id.'_'.str_random(20) . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . '/public/images/avatar', $file_name);
                $user->avtar =  $file_name ;
            }
            
                $user->first_name = $input['first_name'];
                $user->last_name = $input['last_name'];
                $user->name = $input['first_name'].' '. $input['last_name'];
                $user->save();
               
            $usersuccessmsg= trans('User Successfully Updated');
            $request->session()->flash('status', $usersuccessmsg);

            return redirect('/user-dashboard');

        }	
	}
	
	public function changePassword(){

		if(empty(Auth::user()->id)){
			return redirect('/');
		}	
		$id = Auth::user()->id;
		$userArray = DB::table('users')->where('id', $id)->get();
		$userprofileData = $userArray->toArray();
		$usersData = DB::table('orders')
            ->join('items', 'items.order_id', '=', 'orders.id')
			->join('courses', 'courses.id', '=', 'items.item_id')
            ->select('courses.*')
			->where([['orders.user_id', $id],['orders.status','Complete']])	
            ->get();
		return view('user.change-password',['userData' => $usersData,'title'=>'Change Password','profiledata' =>$userprofileData]);

		
	}
	
	public function updatePassword(Request $request){
		if(empty(Auth::user()->id)){
			return redirect('/');
		}
		$id = Auth::user()->id;
		$input = $request->all();
		  $validator = Validator::make($input, [
            'old_password' => array(
                          'required',
                          'min:6',
                          'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
                         ),
			'password_confirmation' => array(
                          'required',
                          'min:6',
                          'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
                         ),			 
            'password' => array(
                          'required',
						  'confirmed',
                          'min:6',
                          'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
                         ),
						 
            //'password' => 'required|string|min:6|confirmed',
        ]);
		 if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
			
			$userArray = DB::table('users')->where([['id', '=', $id]])->get();
			$userp = $userArray->toArray();
			$user_pass = $userArray[0]->password;
			if (Hash::check($input['old_password'], $user_pass)) {
   				User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($input['password']),
            ]);
            
            $passwordchangedmsg = trans('password_changed_msg');
            $request->session()->flash('status', $passwordchangedmsg);

            return redirect()->back();
			}else{
				$passwordmsg = trans('incorrect_password');
				$request->session()->flash('status', $passwordmsg);
				return redirect()->back();
			} 	 
        }
	}	
	public function playVideo(){
		
		$id = Auth::user()->id;
		$usersData = DB::table('orders')
				->join('items', 'items.order_id', '=', 'orders.id')
				->join('courses', 'courses.id', '=', 'items.item_id')
				->select('courses.*')
				->where([['orders.user_id', $id],['orders.status','Complete']])	
				->get();
		
		foreach($usersData as $key => $data){
				$UserChapter = DB::table('chapters')->where([['course_id', '=', $data->id]])->get();
		}		
		return view('user.play-video',['userData' => $userData,'chapterData' => $UserChapter ]);
	}


	public function showChapters($name){

		$getcourse_id_by_slug_dashboard = DB::table('courses')->where('slug',$name)->first();
		//print_r($getcourse_id_by_slug_dashboard);
		if(!$getcourse_id_by_slug_dashboard){
			 	return redirect('/page_not_found');
		}

		//$paymentvarify = DB::table('orders')->where('user_id',Auth::user()->id)->count();
		$order_id = DB::table('orders')->where('user_id',Auth::user()->id)->first();
        
		$paymentvarify = DB::table('chapters')
			->join('items','items.item_id','=','chapters.course_id')
			->join('orders','orders.id','=','items.order_id')
			->select('*')
			->where([['chapters.id',$getcourse_id_by_slug_dashboard->id],['orders.user_id',Auth::user()->id]])	
			->count();
       	if($paymentvarify>0){	
			//print_r($getcourse_id_by_slug_dashboard->id);			
			$usersData = array();
			$userid = Auth::user()->id;	
			$chapterId = $getcourse_id_by_slug_dashboard->id;
			$usersData = DB::table('orders')
            	->join('items', 'items.order_id', '=', 'orders.id')
				->join('courses', 'courses.id', '=', 'items.item_id')
            	->select('courses.*')
				->where([['orders.user_id', $userid],['orders.status','Complete']])	
            	->get();  
            	//echo 'test'.$chapterId;
			$UserChapterData = DB::table('chapters')->where('course_id','=' ,$chapterId)->paginate(4);			
			$ratingarycount=array();
			foreach($UserChapterData as $chapters){
				$topics = DB::table('topics')->where([['chapter_id', '=', $chapters->id]])->get();
				$totalTopics = count($topics);
				$chapters->totalTopics = $totalTopics; 

				/*Rating sql qeruy*/
                $ratingdata=DB::table('topics')->leftjoin('user_testimonial', 'user_testimonial.item_id', '=', 'topics.id')->select(DB::raw('AVG(user_testimonial.rating) as ratings_average'))->where('topics.chapter_id',$chapters->id)->first();
                $chapters->average=$ratingdata->ratings_average;
                /*Rating sql qeruy*/
			}	
			
			   $getcoursedetails = DB::table('courses')->where('slug', $name)->first();
			   			
       		return view('user.dashboard',['userData' => $usersData,'title'=>ucfirst($name),'UserChapterData' => $UserChapterData ,'exist'=>$paymentvarify, 'coursetitle'=>$getcoursedetails->course_name,'coursedescription'=>$getcoursedetails->course_description]);	
       }else{
       	   return redirect('/course');
       }	
	}
	



	public function showChapter($slug,$chapter){
		
		$chapter = Chapter::join('courses' , 'courses.id','=','chapters.course_id')
									   ->join('items' , 'items.item_id','=','courses.id')
									   ->join('orders' , 'orders.id','=','items.order_id')
									   ->select('chapters.*')
									   ->where([
									   	['chapters.slug',$chapter],
									   	['courses.slug',$slug],
									   	['orders.user_id',Auth::id()]
									   ]
									   )->first();

		if(!$chapter){
			return redirect('/page_not_found');
		}

	    return view('user.chapterDetail',compact('chapter'));
	}
	

	public function showTopic($slug,$chapter,$topic_slug){

		$topic = Topic::join('courses' , 'courses.id','=','topics.course_id')
					   ->join('chapters' , 'chapters.id','=','topics.chapter_id')
					   ->join('items' , 'items.item_id','=','courses.id')
					   ->join('orders' , 'orders.id','=','items.order_id')
					   ->select('topics.*')
					   ->where([
					   	['chapters.slug',$chapter],
					   	['courses.slug',$slug],
					   	['topics.slug',$topic_slug],
					   	['orders.user_id',Auth::id()]
					   ]
					)->first();
	
		if(!$topic){
			return redirect('/page_not_found');
		}	

		return view('user.topicDetail',compact('topic'));

	}




	public function download(Request $request){
		if ($request->isMethod('post')) {		
		$input = $request->all();	
		$doclist = DB::table('documents')->where([['parent_id', $input['product_id']]])->first();		
		$file = public_path('/uploads/documents/').$doclist->document_url;
		$headers = array('Content-Type' => 'image/jpeg','image/png','video/mp4','application/pdf');
		return Response::download($file,$doclist->document_url,$headers);
	}else{
		return redirect('/');
	}
		
	}


	public function admin_dashboard()
	{

		$today_orders = Order::where([ 
			                          [ 'created_at' ,'>=' ,Carbon::today()->toDateString()]
			                         ])->count();
		$all_users    = User::where([
									 ['user_type','=','user']
							     	])->count();

		$orders_amount=Order::where('status','complete')->sum('amount');

		return view('admin.dashboard',compact('all_users','today_orders','orders_amount'));
		
        }	

	

}
