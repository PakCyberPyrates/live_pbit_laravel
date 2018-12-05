<div class="beginner-course" id="topic_detail_section_top">
    <div class="container">
        <div class="row ">
                       @if(count($topicDetail) > 0)
                    @foreach($topicDetail as $topicData)
                    @php
                    // print_r($topicData);
                     
                    @endphp
                    <?php 
                      $video = App\Helper::get_link($trialVideo[0]->trailer_url,'topic');                                                
                    ?> 
                    <div class="col-md-7">
                        <div class="beginner-left-section">                        
                            <div class="single_topic_image_details"><img src="{{ url('public/uploads/thumnail')}}/{{$topicData->image}}" alt="img"/>
                            </div>
                             <div class="view_video btn btn-info btn-lg"  getitem="d" v-url="{{$video}}"><img style="width:12%" src="{{url('/public/frontview/images/play_btnn.png')}}" alt="img" class="play-btn"/></div>                         
                            <!-- <div class="topic_tril_video"> 
                                <div id="jwpplayertril"></div>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="beginner-right-section">
                            <h3 class="main_text1">{{ ucfirst($class) }} Course </h3>
                            <p class="demi_text margin-tp">{{ $topicData->title }} </p>                
                                @php
                                    $new_date = date('F d,  Y', strtotime($topicData->title));
                                @endphp
                                <p class="student_name name_text11"><span>Created by</span> {{ $lists[0]->user->name }}</p>
                                 @php  $new_date = date('F d,  Y', strtotime($topicData->updated_at)); @endphp
                                <p class="student_name name_text21"><span>{{ Lang::get('messages.last_update') }} </span> {{$new_date}}</p>
                                    <span class="rates">   
                                    <h3 class="rates1"><span>$</span> {{ $lists[0]->course->course_price != "" ? $lists[0]->course->course_price : "" }}</h3>
                                    </span>
                                <p class="pargh margin-topp">{{ $topicData->description != "" ? substr($topicData->description, 0, 200)."....!": "Soon..." }} </p>

                                    <form  class="formcart" method="POST" action="{{url('cart')}}">
                                    <input type="hidden" name="product_id" value="{{$lists[0]->course->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-fefault add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ __('messages.bye_now') }}
                                    </button>
                                </form>                                
                        </div>                      
                    </div>
                      @endforeach
                    @endif
        </div>
    </div>
</div>
@section('script') 
@endsection