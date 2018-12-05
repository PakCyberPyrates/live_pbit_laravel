<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use DB;

class WelcomeController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
        $courses = Course::limit(3)->get();
		foreach($courses as $value){
			
			$courserating = DB::table('courses')
						->leftjoin('topics', 'topics.course_id', '=','courses.id')
						->leftjoin('user_testimonial', 'topics.id', '=','user_testimonial.item_id')
						->where([['topics.course_id', $value->id]])
						->first();                    

						$courseratingd = DB::table('courses')
						->leftjoin('topics', 'topics.course_id', '=','courses.id')
						->leftjoin('user_testimonial', 'topics.id', '=','user_testimonial.item_id')
						->select(DB::raw('AVG(user_testimonial.rating) as ratings_average'))
						->where([['topics.course_id', $value->id]])
						->first(); 
						//print_r($courseratingd);
						$value->rating=$courseratingd->ratings_average;



				 
		}
        return view('welcome',['class'=> "home",'type'=>'home','courses'=>$courses]);
    }

}
