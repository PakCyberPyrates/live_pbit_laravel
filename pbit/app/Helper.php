<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use CloudFrontUrlSigner;
use App\TrailerVideo;
use VideoThumbnail;
use Carbon\Carbon;
use App\Document;
use App\Video;
use App\User;
use Auth;
use Cart;
use DB;

class Helper extends Model
{
    //

    public static function getAllUsers(){
    	return User::select('id','name')->where([
    		['status','=','active'],
    		['user_type','!=','admin'],
    	])->get();
    }


     public static function get_header()
    {
        $coursesData = DB::table('courses')->get();
    	$topics = array();
    	foreach($coursesData as $key => $course){
			//$topicsData = DB::select('select * from topics where course_id = :course_id', ['course_id' => $course->id]);
            $topicsData = DB::table('topics')->where([['course_id', $course->id],['publish','=' , true]])->get(); 
			$topics[$key]['id'] = $course->id;
			$topics[$key]['name'] = $course->course_name;
			$topics[$key]['topics'][] = $topicsData;
		}

        $user = DB::table('users')->get();
        return $topics;
    }


    public static function get_topic(){
    
        return  DB::table('topics')->where([
    	                                     ['publish','=' , true]
    	                                    ])
                                    ->inRandomOrder()
                                    ->limit(16)
                                    ->get()
                                    ->toArray();
    }


    public static function get_usertopic(){
    	$id = Auth::user()->id;
    	return $userData = DB::table('topics')->where('user_id', $id)->paginate(10);
    	//return $userData = $userData->toArray();
     }
 
    public static function get_testimonial(){
		$testimonialData = DB::table('user_testimonial')
            ->join('users', 'users.id', '=', 'user_testimonial.user_id')
            ->select('users.first_name', 'users.last_name','users.avtar','user_testimonial.text', 'user_testimonial.rating')
            ->groupBy('users.id')
            ->groupBy('user_testimonial.item_id')
            ->get();
        //print_r($testimonialData);
    	return $testimonialData;
	}


    public static function get_cart_number()
    {
        $cart = Cart::content();
        return  count($cart);
    }

    
    public static function upload_video($id,$file,$type)
    {
        
        $video = $id.'_'.str_random(20) . '.' . $file->getClientOriginalExtension();
        $disk = Storage::disk('s3');
        $file_name = '/'.$type.'/'.$video;
        $disk->put($file_name, file_get_contents($file));
        Storage::disk('s3')->setVisibility($file_name, 'public');
        $video_thumb = null; 
        //\VideoThumbnail::createThumbnail($videoUrl, $storageUrl, $video_thumb , 2 , $width = 640, $height = 480);
        Video::create([
            'parent_id' => $id, 
            'parent_type' => $type, 
            'url' => $video,
            'thumb_url' => $video_thumb
        ]);
            
    }

    public static function upload_trail_video($id,$file,$type)
    {
        
        $video = $id.'_'.str_random(20) . '.' . $file->getClientOriginalExtension();
        $disk = Storage::disk('s3');
        $file_name = '/'.$type.'/'.$video;
        $disk->put($file_name, file_get_contents($file));
        Storage::disk('s3')->setVisibility($file_name, 'public');
        $video_thumb = null; 
        //\VideoThumbnail::createThumbnail($videoUrl, $storageUrl, $video_thumb , 2 , $width = 640, $height = 480);
        TrailerVideo::create([
            'parent_id' => $id, 
            'parent_type' => $type, 
            'trailer_url' => $video,
            'trailer_thumb_url' => $video_thumb
        ]);
            
    }

    public static function get_link($video_name,$folder_name)
    {
        $links_exist = DB::table('temp_video_links')->where([
            ['video_name' , '='  , $video_name ],
            ['expired_on' , '>=' , date('Y-m-d')],
            ['video_type' , '='  , $folder_name]
        ])->first();
        

        if(!$links_exist){
            
            $cloudfront_domain_name = 'https://d3gpe1urc8fnib.cloudfront.net/'.$folder_name.'/'.$video_name;

            $cloudfront_link =   CloudFrontUrlSigner::sign($cloudfront_domain_name, 31 );

            DB::table('temp_video_links')->insert([
                'video_name'  =>  $video_name ,
                'video_link' => $cloudfront_link ,
                'expired_on' => date('Y-m-d',strtotime( "+1 month")),
                'video_type' => $folder_name,
            ]);           
            
        }else{
            $cloudfront_link = $links_exist->video_link;
        }

        return $cloudfront_link;
    }


public static function get_paid_video_link($video_name,$folder_name)
{
    $links_exist = DB::table('temp_video_links')->where([
            ['video_name' , '='  , $video_name ],
            ['expired_on' , '>=' , date('Y-m-d')],
            ['video_type' , '='  , $folder_name]
        ])->first();

        if(!$links_exist){
            
            $cloudfront_domain_name = 'https://d3gpe1urc8fnib.cloudfront.net/'.$folder_name.'/'.$video_name;

            $cloudfront_link =   CloudFrontUrlSigner::sign($cloudfront_domain_name, Carbon\Carbon::now()->addMinutes(5) );

            DB::table('temp_video_links')->insert([
                'video_name'  =>  $video_name ,
                'video_link' => $cloudfront_link ,
                'expired_on' => date('Y-m-d',strtotime( "+1 month")),
                'video_type' => $folder_name,
            ]);           
            
        }else{
            $cloudfront_link = $links_exist->video_link;
        }

        return $cloudfront_link;
}
    
    public static function get_users($ids)
    {
        # code...
        $ids_array = explode(',', $ids);
        return  User::whereIn('id',$ids_array)->pluck('name')->toArray();

    }




   public static function delete_video($id,$type)
    {
       $videos = Video::where([
                      ['parent_type','=',$type],
                      ['parent_id','=',$id],
                    ])->get();

        if($videos){

            foreach ($videos as $video) {
                  Storage::disk('s3')->delete($type.'/' . $video->url);
                  DB::table('temp_video_links')->where('video_name',$video->url)->delete();
                  $video->delete();
            }
        }
    }

    public static function delete_trailer_video($id,$type)
    {
       $trailer_videos = TrailerVideo::where([
                      ['parent_type','=',$type],
                      ['parent_id','=',$id],
                    ])->get();

        if($trailer_videos){

            foreach ($trailer_videos as $trail_v) {
              Storage::disk('s3')->delete($type.'/' . $trail_v->trailer_url);
              DB::table('temp_video_links')->where('video_name',$trail_v->trailer_url)->delete();
              $trail_v->delete();
            }
        }
    }



    public static function get_user_byed_course($want_only_ids = false,$user_id = null)
    {
        
        $usersData = [] ;
        $id = false; 

        if($user_id){
            $id = $user_id;
        }elseif(Auth::check()) {
            $id = Auth::id();
        }

        if($id){

            $usersData = Order::join('items', 'items.order_id', '=', 'orders.id')
                                  ->join('courses', 'courses.id', '=', 'items.item_id')
                                  ->select('courses.*')
                                  ->where([['orders.user_id', $id],['orders.status','complete']]) 
                                  ->orderBy('courses.id','asc')
                                  ->groupBy('items.item_id')
                                  ->pluck('courses.id');

            if($want_only_ids){  // used on welcome.blade.php
                return $usersData;
            }

            if(count($usersData)){
                $data = Course::where('publish',true)->whereIn('id',$usersData)->get();
                return $data;
            } 
       }

        return $usersData ;
    }


    public static function calculate_discount($amount,$coupon_code)
    {
        $data = [] ;
        $coupon = Coupon::where('promotion_code',$coupon_code)->first();
        if($coupon){
            
              if($coupon->type == 'percentage'){
                  $data['discount'] = ($coupon->value / 100)*$amount;
                  $data['after_discount'] = $amount - $data['discount'] ;
                  $data['title'] = $coupon->value.'%';
                  $data['type'] = $coupon->type;
              }else{
                  $data['discount'] = $coupon->value;
                  $data['after_discount'] = $amount - $coupon->value ;
                  $data['title'] = '$'.$coupon->value;
                  $data['type'] = $coupon->type;
              }
        }
        return $data; 
    }



    public  static function dashboard_getchapter_list($slug){
 
        return Course::where('slug',$slug)->first();

    }





}
