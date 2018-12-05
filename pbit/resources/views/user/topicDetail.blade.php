@extends('layouts.app-user')

@section('title',$topic->title)  

<?php $user = Auth::user(); ?>

@section('right-content')
		@if(Session::has('status'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
		@endif

		<style type="text/css">
		.course-video-dimensions {
		    width: 100%;
		    height: 100%;
		}
		</style>

		<div class="dashboard_mid-right">	
			<div class="bx-right">
				<!-- <h2 class="begin_text">{{$topic->title}} </h2> -->

                <?php 

                 $video =  App\Helper::get_link($topic->video[0]->url,'topic');
                $all_vedios = [];

                foreach ($topic->video as $key => $video) {
                	$all_vedios[] =  array(
                		                    'sources'=>[array('src' => App\Helper::get_link($video->url,'topic'))],
                		                    'poster' =>'',
                                         );
                }

                 ?>

				<div style="width: 100%; height: 580px"  class="video-wepper" >
					<video id="course-video" class="video-js vjs-big-play-centered vide" controls preload="auto" data-setup="{}" >
					</video>
				</div>

                <div class="row">
					<div class="col-md-8">
						<p class="demi_text margin-tp">{{ $topic->title }}</p>
						<p class="student_name name_text11"><span>Created by</span> {{$user->name}}</p>
			
						<p class="student_name name_text2"><span>Last updated </span> 
						 		{{date('F jS, Y', strtotime($topic->updated_at))}}
						</p>
						<div class="col-sm-12 col-sm-clas">
							<p class="pargh margin-topp"><?php echo $topic->description; ?> </p>
						</div>
				    </div>

				     <div class="col-md-4">
						<div class="categories-section-1">
								<h3 class="text-center heading_text2">  Documentation Downloads </h3>
								<hr>
								@if(isset($topic->document))
								   @foreach($topic->document as $key =>  $document)
								    <a href="{{url('/public/uploads/documents')}}/{{$document->document_url}}" target="_blank">
									    <div class="categories-bx activee in_progress">
											<img class="image_effect1" src="http://powerbitraining.com/public/frontview/images/icon-d.png" alt="img">
											<img class="image_effect" src="http://powerbitraining.com/public/frontview/images/icon-d_h.png" alt="img">
											<h4>Download {{$topic->title}}'s Document {{ ($key+1) }} </h4>
										</div>
									</a>
								   @endforeach
								@endif
	                    </div>
				</div>

			    </div>

			   

			</div>

			<?php

			 // $related_topic =  App\Topic::where([
				// 				  	['id' ,'!=' ,$topic->id],
				// 				  	['chapter_id' ,'!=', $topic->chapter_id],
				// 				  	['publish','=' ,true],
				// 				  ])->get();
			
			

			 // dump($related_topic);
			 ?>
			
			@if(isset($related_topic))
				<div class="related_video">
					<h3 class="rel-heading">Related Videos</h3>
					<div class="row">
						@foreach($related_topic as $key => $topic)
						@php
							$image = asset('public/frontview/images/NoPicture.jpg') ;

							if(file_exists('public/uploads/thumnail/'.$topic->image.'') && ($topic->image != '')){
								 $image = asset('public/uploads/thumnail/'.$topic->image.'');
							}
						@endphp
						<div class="col-lg-3 col-12 col-sm-6">
							<div class="video-rel">
								<a href="{{$topic->slug}}"><img src="{{$image}}" alt="img" class="img-fluid "></a>
								<div class="captions">
									<p class="name-time"><i class="fas fa-user"></i>{{$topic->name}}</p>
									<p class="name-time text-right"><i class="far fa-clock"></i>02 Hours</p>
									<p><a href="#" class="username">						 
									     {{ str_limit(strip_tags($topic->title), 40) }}
									     <a href="{{$topic->slug}}" class="btn btn-info btn-sm related_readmore">Read More</a>
									</a></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			@endif

		</div>
					
@endsection
 
@section('script')
<script>
	

var ALL_VIDEOS =   @json($all_vedios);

console.log(ALL_VIDEOS);



jQuery(document).ready(function(){

var getheight=jQuery(".dashboard_mid-right").height(); 
	jQuery(".dashboard_mid_left").height(getheight);

jQuery('.mob_togg_iconn').click(function(){
jQuery(".dashboard_mid_left").animate( { "width": "0px"} , 500 );
});


});

var video =  videojs("course-video",{
                     controls: true,
                     autoplay: false,
                     preload: 'auto',
                     //fluid : true,
                     playbackRates: [0.7, 1.0, 1.5, 2.0],
                     controlBar: {
                        children: {
                            'playToggle':{},
                            'playbackRateMenuButton': {},
                            'volumePanel': {inline: false , horizontal : false},
                            'currentTimeDisplay':{},
                            'timeDivider':{},
                            'durationDisplay':{},
                            'flexibleWidthSpacer':{},
                            'progressControl':{},
                            'settingsMenuButton': {
                                  entries : [
                                      'subtitlesButton',
                                      'captionsButton',
                                  ]
                            },
                            'fullscreenToggle':{}
                        }
                    }
                });
    video.playlist(ALL_VIDEOS);
    video.playlist.autoadvance(0);


     /* ADD PREVIOUS */
	var Button = videojs.getComponent('Button');
	// Extend default
	var PrevButton = videojs.extend(Button, {
	  //constructor: function(player, options) {
	  constructor: function() {
	    Button.apply(this, arguments);
	    //this.addClass('vjs-chapters-button');
	    this.addClass('vjs-icon-previous-item');
	    this.controlText("Previous Video");
	  },

	  handleClick: function() {
	    video.playlist.previous();
	  }
	});

/* ADD BUTTON */

// Extend default
var NextButton = videojs.extend(Button, {
  //constructor: function(player, options) {
  constructor: function() {
    Button.apply(this, arguments);
    //this.addClass('vjs-chapters-button');
    this.addClass('vjs-icon-next-item');
    this.controlText("Next Video");
  },

  handleClick: function() {
    video.playlist.next();
  }
});

// Register the new component

videojs.registerComponent('NextButton', NextButton);
videojs.registerComponent('PrevButton', PrevButton);
video.getChild('controlBar').addChild('PrevButton', {},2);
video.getChild('controlBar').addChild('NextButton', {},3);

video.ready(function() {
    this.hotkeys({  seekStep: 10  });
    this.seekButtons({ forward: 10, back: 10 });
 });

</script>
 @endsection 
 
 
		
																																												