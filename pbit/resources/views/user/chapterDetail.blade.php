@extends('layouts.app-user')

@section('title',$chapter->title)  

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
				<!-- <h2 class="begin_text">{{$chapter->title}} </h2> -->
                <?php $video =  App\Helper::get_link($chapter->video->url,'chapter'); ?>
				<div style="width: 100%; height: 580px" class="video-wepper">
					<video id="course-video" class="video-js vjs-big-play-centered vide" preload="auto" poster="{{url('public/uploads/thumnail')}}/{{$chapter->image}}" data-setup="{}" >
						<source src="{{$video}}" type="video/mp4">
						<source src="{{$video}}" type="video/webm">
						<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
					</video>
				</div> 
                                                  
				<div class="row">
					<div class="col-md-8">
						<p class="demi_text margin-tp">{{ $chapter->title }}</p>
						<p class="student_name name_text11"><span>Created by</span> {{$user->name}}</p>
			
						<p class="student_name name_text2"><span>Last updated </span> 
						 		{{date('F jS, Y', strtotime($chapter->updated_at))}}
						</p>
						<div class="col-sm-12 col-sm-clas">
							<p class="pargh margin-topp"><?php echo $chapter->description; ?> </p>
						</div>
				   </div>

				   <div class="col-md-4">
						<div class="categories-section-1">
								<h3 class="text-center heading_text2">  Documentation Downloads </h3>
								<hr>
								@if(isset($chapter->document))
								   @foreach($chapter->document as $key =>  $document)
								    <a href="{{url('/public/uploads/documents')}}/{{$document->document_url}}" target="_blank">
									    <div class="categories-bx activee in_progress">
											<img class="image_effect1" src="http://powerbitraining.com/public/frontview/images/icon-d.png" alt="img">
											<img class="image_effect" src="http://powerbitraining.com/public/frontview/images/icon-d_h.png" alt="img">
											<h4>Download {{$chapter->title}}'s Document {{ ($key+1) }} </h4>
										</div>
									</a>
								   @endforeach
								@endif
	                    </div>
				    </div>
				</div>
				
			</div>
			
			@if(isset($chapter->topics))
				<div class="related_video user-related-video-sect">
					<h3 class="rel-heading">Chapter's Topics</h3>
					<div class="row">
						@foreach($chapter->topics as $key => $topic)
						@php
							$image = asset('public/frontview/images/NoPicture.jpg') ;

							if(file_exists('public/uploads/thumnail/'.$topic->image.'') && ($topic->image != '')){
								 $image = asset('public/uploads/thumnail/'.$topic->image.'');
							}
						@endphp
						<div class="col-lg-3 col-12 col-sm-6">
							<div class="video-rel">
								<a href="{{$chapter->slug}}/{{$topic->slug}}"><img src="{{$image}}" alt="img" class="img-fluid "></a>
								<div class="captions">
									<p class="username"><i class="fas fa-user"></i>{{$topic->title}}</p>
									<p class="name-time text-right"><i class="far fa-clock"></i>02 Hours</p>
									<p style="float:right;">
										<a href="{{$chapter->slug}}/{{$topic->slug}}" class="btn btn-info btn-sm related_readmore">Read More</a>
									</p>
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
	
jQuery(document).ready(function(){

var getheight=jQuery(".dashboard_mid-right").height(); 
	jQuery(".dashboard_mid_left").height(getheight);

jQuery('.mob_togg_iconn').click(function(){
jQuery(".dashboard_mid_left").animate( { "width": "0px"} , 500 );
});

});



var video =   videojs("course-video",{
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

        video.ready(function() {
            this.hotkeys({  seekStep: 10      });
            this.seekButtons({   forward: 10,  back: 10  });
         });

</script>
 @endsection 
 
 
		
																																												