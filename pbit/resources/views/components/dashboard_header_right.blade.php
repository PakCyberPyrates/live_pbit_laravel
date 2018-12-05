<div class="dashboard_header_right">	
	<div class="row no-gutters">
		<div class="col-sm-12">
		<div class="col-sm-6">
			<div class="dashboard_header_left mob_header_logo">
				<a href="{{url('/')}}"><img src="{{ asset('public/frontview/images/logo.png') }}"  class="dashbord-logo mob_logo_dash" alt="logo"></a>
				|<!-- <img src="{{ asset('public/frontview/images/mob_togg_iconn.png') }}"  class="mob_togg_iconn" alt="mob_togg_iconn"> -->
				
			</div>
			@csrf  
			<div class="input-group mob_view">
				<i class="fas fa-search search_i"></i>
				<input class="form-control search-dashbord" id="DashboardSearch" placeholder="Type in to Search Course..." name="q" type="text">
			</div>
			<div id="dashboardResponse">
				<ul class="responseData" id="responseData">
				</ul>		
			</div>	
		</div>
			<div class="col-sm-6 dashbord_mob_col">
				<div class="user-dsh-board-responsive-section">
					            <!--  Responsive menu code by s -->              
                <nav id="main-nav">
                     
                        <ul class="first-nav">
                            <li class="searchtest">
                                <div class="form-container">                                             
                                        <?php 
                                            $image = Auth::user()->avtar ;
                                            if($image){                                            	
   													$image = Auth::user()->avtar ;
   													$image=asset('public/images/avatar/'.$image.'');
                                            }else{
                                            		$image = asset('public/frontview/images/NoPicture.jpg');
                                            }                                               
                                                 
                                        ?>
                                          <div class="user-img-res-section"><img  class="mob-res-user-image" src="{{$image}}" alt="{{Auth::user()->avtar}}" class="dashbord-user"></div>                                          
                                          <span class="mob-res-user-image">{{Auth::user()->first_name}}</span>
                                </div>
                            </li>                       
                        </ul>
                                      
                    <ul class="second-nav">
                         <div class="topsection-res-menu">Top section </div>
                      <li class="collectionstets"><a href="{{url('/')}}">Home</a></li>
                      <?php  $userData =  App\Helper::get_user_byed_course();  ?>
                      @if(count($userData)>0)	
                      <li class="magazinestes">
                        <a href="#">Chapter</a>
                        <ul>
                        	@foreach($userData as $course)
								@php
									$item_slug = str_slug($course->course_name, "-");
								@endphp
								<li><a href="{{url('/')}}/user/cource/{{$item_slug}}">{{$course->course_name}}</a></li>
                            @endforeach                       
                        </ul>
                      </li>
                      @endif
                         <li class="magazinestes">
                        <a href="#">Settings</a>
                        <ul>  <li><a href="{{url('user-profile')}}">Update Profile</a></li>                   
                               <li><a href="{{url('user-changePassword')}}">Change Password</a></li>           
                               <li><a href="{{url('myorder')}}">MyOrder</a></li>                     
                        </ul>
                      </li>                   
                       <li class="creditstes"><a href="{{url('/user-dashboard')}}">Dashboard</a></li>                     
                       <li class="creditstes"><a href="{{url('/logout')}}">Logout</a></li>                     
                    </ul>
                </nav> 
                <a class="toggle">
                    <span></span>            
                </a>
            </div><!-- Responsive menu code by s--> 			
				<form class="form-inline right_nav  mob_navs_show float-right">
					<li class="nav-item search_mob" >
						<a class="nav-link" href="#"><i class="fas fa-search"></i></a>
					</li>
					<li class="nav-item  search_mob">
					<span class="number">{{count(Cart::content())}}</span>
						<a class="nav-link" href="{{url('/cart')}}"><i class="fas fa-shopping-cart"></i></a>
					</li>
					<li class="nav-item  search_mob">
						<a class="nav-link" href="#"><i class="far fa-bell"></i></a>
					</li>	 
						 <li class="nav-item search_mob">
						<a class="nav-link margin_rght_mob" href="#"><i class="fas fa-user"></i></a>
					</li>	 

					@php
					$image = '' ;
					if(file_exists('public/images/avatar/'.Auth::user()->avtar.'') && (Auth::user()->avtar !='')){ 
						 $image = asset('public/images/avatar/'.Auth::user()->avtar.'');
							}else{ 
							 $image = asset('public/frontview/images/NoPicture.jpg');
					}				
					@endphp
					<span class="users">			
					<img src="{{$image}}" alt="img" class="user_name">
					<a href="#" class="username dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
					<div class="dropdown-menu pbit-cust-logout" aria-labelledby="navbarDropdown">          
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="logout();">
							{{ __('Logout') }}
						</a>
					</div>
					</span>								
				</form>
			</div>
		</div>
	</div>
</div>