@extends('layouts.app-user')
@section('title',$title)
@section('right-content')
@if(Session::has('status'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
@endif
@if(isset($courses))
<div class="container mt-40 ">
    <div class="bx_section">
            <div class="row">                 
                    @if(count($courses)===0)
                    <div class="outer-no-order">
                        <div class="dont-have-any-order1">
                            <div class="dont-have-any-order">
                                <p class="no-order_pargh">{{ __('messages.ordernotfound') }}</p>
                                <a class="buy_now1" href="{{url('course')}}">{{ __('messages.buy') }}</a>
                            </div>
                            <div class="dont-have-any-order-right">
                                <img class="order_right_imgg" src="{{asset('public/frontview/images/empty_order.png')}}" alt="img">
                            </div>
                        </div>
                    </div> 
                    @endif
                    @foreach($courses as $course)          
                          <!-- @php dump($course); @endphp   --> 
                    <div class="row margin-tp">
                          <div class="col-md-3">
                             <a href="{{url('/user/cource')}}/{{ strtolower($course->course_name) }}"><img src="{{asset('public/uploads/thumnail')}}/{{$course->image}}" alt="img" class="rounded img-fluid img-chapter"></a>
                         </div> 

                        <div class="col-md-9 video_section">
                            <?php 
							        $video = App\Helper::get_link($course->video->url,'course');
                                    $img = (!empty($course->image))?url('public/uploads/thumnail/'.$course->image):url('/public/frontview/images/video_1.png');

                            ?>                                             
                            <div class="col-md-9 student_view">
                                <div class="chapter_right user-buy-chapter-sect">                                 
                                <a href="{{url('/user/cource')}}/{{ strtolower($course->course_name) }}"><h5 class="demi_text ">{{ $course->course_name }}</h5></a> 
                                <p class="mid-pargh">{{ ucfirst(substr($course->course_description,0,170)) }}...</p>
                                <h5 class="demi_text "><a class="dashboard_start_course" href="{{url('/user/cource')}}/{{ strtolower($course->course_name) }}">Start Course</a></h5>                               
                                <!-- <p class="student_name name_text1"><span>   {{ __('messages.created_by') }}</span> {{ $course->user->name }}</p>
                                <p class="student_name name_text2"><span>  {{ __('messages.last_update') }} </span>{{  date('M d,  Y', strtotime($course->updated_at)) }} </p> -->
									<div class="ration-sectiondash" style="clear:both">	                                        
									<!-- <div class="ratingdash selected" method="POST" action="{{url('download')}}">
										<input type="radio" id="star5" name="rating{{$course->slug}}10" value="5" {{ ceil($course->rating) == 5 ? "checked" : "" }} disabled=""=""><label  ratingact="5" class = "full" for="star5" title="Awesome - 5 stars"></label>
										<input type="radio" id="star4half" name="rating{{$course->slug}}9" value="4 and a half" {{ ceil($course->rating)  == 4.5 ? "checked" : "" }} disabled=""=""><label ratingact="4.5" class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
										<input type="radio" id="star4" name="rating{{$course->slug}}8" value="4" {{ ceil($course->rating) == 4 ? "checked" : "" }} disabled=""=""><label ratingact="4" class = "full" for="star4" title="Pretty good - 4 stars"></label>
										<input type="radio" id="star3half" name="rating{{$course->slug}}7" value="3 and a half" {{ ceil($course->rating)  == 3.5 ? "checked" : "" }} disabled=""=""><label  ratingact="3.5" class="half" for="star3half" title="Meh - 3.5 stars"></label>
										<input type="radio" id="star3" name="rating{{$course->slug}}6" value="3" {{ ceil($course->rating) == 3 ? "checked" : "" }} disabled=""=""><label  ratingact="3" class = "full" for="star3" title="Meh - 3 stars"></label>
										<input type="radio" id="star2half" name="rating{{$course->slug}}5" value="2 and a half" {{ ceil($course->rating)  == 2.5 ? "checked" : "" }} disabled=""=""><label ratingact="2.5" class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
										<input type="radio" id="star2" name="rating{{$course->slug}}4" value="2" {{ ceil($course->rating)  == 2 ? "checked" : "" }} disabled=""=""><label ratingact="2" class = "full" for="star2" title="Kinda bad - 2 stars" ></label>
										<input type="radio" id="star1half" name="rating{{$course->slug}}3" value="1 and a half" {{ ceil($course->rating) == 1.5 ? "checked" : "" }} disabled=""=""><label ratingact="1.5" class="half" for="star1half" title="Meh - 1.5 stars"></label>
										<input type="radio" id="star1" name="rating{{$course->slug}}2" value="1" {{ $course->rating == 1 ? "checked" : "" }} disabled=""=""><label ratingact="1" class = "full" for="star1" title="Sucks big time - 1 star"></label>
										<input type="radio" id="starhalf" name="rating{{$course->slug}}1" value="half" {{ ceil($course->rating) == 0.5 ? "checked" : "" }} disabled=""=""><label  ratingact="0.5" class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
									</div> -->
								</div>
                            </div>
                           </div>
                        </div>
                    </div>
                    @endforeach
            </div>
    </div>
</div>

@else
<div class="cpater_is_not_exist">
	<h2>Chapter is not exist please contact with customer support</h2>
		<div class="chapter-not-available-image"> <img src="{{asset('public/uploads/thumnail/Not_available_chapter.jpg')}}" alt="Not_available_chapter" /> </div>
</div>
@endif				

@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection																																												