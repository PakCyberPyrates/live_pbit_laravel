<div class="beginner-course">
    <div class="container">
        <div class="row ">
            <div class="col-md-7">
                <div class="beginner-left-section">
                            @php
                              $video = App\Helper::get_link($current_course->video->url,'course');  
                            @endphp
                          <img src="{{ url('public/frontview/images/beginers_course_img.jpg')}}" alt="img"/>
                          <div class="view_video btn btn-info btn-lg"  getitem="d" v-url="{{$video}}"><img style="width:12%" src="{{url('/public/frontview/images/play_btnn.png')}}" alt="img" class="play-btn"/></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="beginner-right-section">
                    <h3 class="main_text1">{{ ucfirst($class) }} Course </h3>
                    <p class="demi_text margin-tp">{{ $current_course->course_title }} </p> 
                     @php
                         $new_date = date('F d,  Y', strtotime($current_course->course_title));
                     @endphp
                     <p class="student_name name_text11"><span>Created by</span> {{ $current_course->user->first_name }}</p>
                     @php  $new_date = date('F d,  Y', strtotime($current_course->updated_at)); @endphp
                      <p class="student_name name_text21"><span>{{ Lang::get('messages.last_update') }} </span> {{$new_date}}</p>
                     <span class="rates">
                        <h3 class="rates1"><span>$</span> {{ $current_course->course_price != "" ? $current_course->course_price : "" }}</h3>

                    </span>
                    <p class="pargh margin-topp">{{ $current_course->course_description != "" ? substr($current_course->course_description, 0, 330)."....!": "Soon..." }} </p>
                    <form  class="formcart courselistingpage" method="POST" action="{{url('cart')}}">
                        <input type="hidden" name="product_id" value="{{$current_course->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-fefault add-to-cart course-buy-now">
                            <i class="fa fa-shopping-cart"></i>                                         
                            {{ __('messages.bye_now') }}
                        </button>
                    </form>                          
                </div>
            </div>
        </div>
    </div>
</div>