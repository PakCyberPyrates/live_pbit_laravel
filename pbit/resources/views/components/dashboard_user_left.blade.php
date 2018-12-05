<div class="dashboard_header_left">
		<a href="{{url('/')}}"><img src="{{ asset('public/frontview/images/logo.png') }}"  class="dashbord-logo" alt="logo"></a>
</div>
<div class="dashboard_mid_left">
	<div class="user-profile">
		<div class="inner-circle"></div>
		@php
			$image = '' ;
			if(file_exists('public/images/avatar/'.Auth::user()->avtar.'') && (Auth::user()->avtar !='')){ 
				 $image = asset('public/images/avatar/'.Auth::user()->avtar.'');
					}else{ 
					 $image = asset('public/frontview/images/NoPicture.jpg');
			}				
		@endphp
		<img src="{{ $image }}" alt="img" class="dashbord-user" alt="img-here" />
		<h4 class="dash-text">Hello,</h4>
		<h3 class="user_namee"> {{Auth::user()->first_name}}</h3>
		<ul class="navbar-nav dashboard_nav dash_list">		
		<?php 

		if(isset($course)){
			$slug = $course->slug;
		}elseif(isset($chapter)){
			$slug = $chapter->course->slug;
		}elseif(isset($topic)){
			$slug = $topic->course->slug;
		}
		$course_chapters =  App\Helper::dashboard_getchapter_list($slug);
		//print_r($course_chapters->slug);
		 ?>	
		 @if(($course_chapters))              
				@foreach($course_chapters->chapters as $chap)
					<li class="nav-item ">
						<div class="left-dash">							 
							 <a href="{{url('/')}}/user/cource/{{$course_chapters->slug}}/{{$chap->slug}}"><span class="spn_number">1</span><p>{{ucfirst($chap->title)}}</p></a>							
						</div>
						<div class="right-dash">
								<span><span class="time "></span>
								<b href="#" class="float-right checks"><img src="{{ asset('public/frontview/images/checks.png') }}"/></b></span>
						</div>
					</li>
					@endforeach	
		@endif

		</ul>
	</div>
</div>