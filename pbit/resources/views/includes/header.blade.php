<!-- header -->
<div class="header {{$class}} {{$type}} {{ $type === "innerpage" ? "header-1" : "" }}">
        <div class="container">
            <!-- navbar --> 
            <!--  Responsive menu code by s --> 
             <div class="wrapper cf responsive_custom_s">
                <nav id="main-nav">
                    @if (Auth::check())
                        <ul class="first-nav">
                            <li class="searchtest">
                                <div class="form-container">                                             
                                           @php                                                       
                                                $image = Auth::user()->avtar ;
                                                if(file_exists('public/uploads/thumnail/'.$image.'') && ($image !='')){
                                                $image = asset('public/uploads/thumnail/'.$image.'');
                                                }else{
                                                $image = asset('public/frontview/images/NoPicture.jpg');
                                                }
                                           @endphp
                                          <div class="user-img-res-section"><img  class="mob-res-user-image" src="{{$image}}" alt="{{Auth::user()->avtar}}" class="dashbord-user"></div>                                          
                                          <span class="mob-res-user-image">{{Auth::user()->name}}</span>
                                </div>
                            </li>                       
                        </ul>
                    @endif                   
                    <ul class="second-nav">
                         <div class="topsection-res-menu">Top section </div>
                      <li class="collectionstets"><a href="{{url('/')}}">Home</a></li>

                      <li class="devicestest">
                        <a>Course</a>
                        <ul>
                        <?php
                         $courses = App\Course::get();
                        ?>
                        @foreach ($courses as $key => $course)                             
                              <li class="mobiletest">
                                <a href="#">{{$course->course_name}}</a>
                                @if(count($course->chapters))             
                                <ul>
                                    @foreach ($course->topics as $key => $topic)      
                                      <li><a href="{{ url('/topic')}}/{{str_slug($topic->title, '-')}}">{{$topic->title}}</a></li>

                                    @endforeach
                                </ul>
                                @endif
                              </li>
                          @endforeach                
                        </ul>
                      </li>
                      <li class="magazinestes">
                        <a href="#">Chapter</a>
                        <ul>
                         <?php $topicsData = App\Topic::where([['publish','=' , true]])->limit(10)->get(); 
                            foreach ($topicsData as $key => $value) { ?>                               
                               <li><a href="{{ url('/topic')}}/{{str_slug($value->title, '-')}}">{{ $value->title }}</a></li>                       
                            <?php } ?>
                        </ul>
                      </li>                   
                      <li class="credittes"><a href="{{url('/about')}}">About Us</a></li>
                      @if (Auth::check())
                       <li class="creditstes"><a href="{{url('/logout')}}">Logout</a></li>
                      @endif
                    </ul>
                </nav> 
                <a class="toggle">
                    <span></span>            
                </a>
            </div>

        <!-- Responsive menu code by s--> 

            <nav class="navbar navbar-expand-lg navbar-light navi">                 
               
               <img src="{{ url('public/frontview/images/logo.png')}}"  class="logo mob_logo"  style="display:none;"alt="logo"  /> 
                 @if (!Auth::check())       
                <li class="nav-item mob_icon" id="myBtnres" style="display:none;">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
                </li>
                @endif
                
                <li class="nav-item mob_icon" style="display:none;">
                    <span class="number"><?php echo App\Helper::get_cart_number(); ?></span>
                    <a class="nav-link" href="{{url('/cart')}}"><i class="fas fa-shopping-cart"></i></a>
                </li>
                        
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav mr-auto navs">
					<!-- <a href="#" class="closebtn">×</a> -->
                        <li class="nav-item first_link active">                      
                            <a class="nav-link" href="{{url('/')}}">{{__('messages.home_menu')}}<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown coursemeu" id="courseDrop">
                            <a class="nav-link " href="{{url('/')}}/course" id="navbarDropdownCourse" role="button"  aria-haspopup="true" aria-expanded="false">
                              {{__('messages.course_menu')}} <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu drops" aria-labelledby="navbarDropdown">
                        </li>
                        <li class="nav-item dropdown" id="topicsDrop">
                            <a class="nav-link " id="navbarDropdownTopics" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{__('messages.topic_menu')}}  <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu drops" aria-labelledby="navbarDropdown">
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about')}}">{{__('messages.about_menu')}}</a>
                        </li>
                        <li class="nav-item logo_li">
                            <a class="nav-link" href="{{url('/')}}"><img src="{{ url('public//frontview/images/logo.png')}}"  class="logo" alt="logo" /></a>
                        </li>
                    </ul>
                    <div class="form-inline right_nav">
                        <li class="nav-item">
                            <a class="nav-link" id="opensearchh" data-target="#hsearch"href="#"><i class="fas fa-search"></i></a>
                                @csrf 
                                  <input type="search" name="hsearch" id="hsearch" class="search-header">                            
                        </li>
                        <li class="nav-item">
                            <span class="number"><?php echo App\Helper::get_cart_number(); ?></span>
                            <a class="nav-link" href="{{url('/cart')}}"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                        <div id="searchResponsetop">

                            <ul class="searchul top_header_serarch" id="searchultop"></ul>         
                        </div>
                    </div>
                @if (Auth::guest())

                  <button class="btn login_btnn" id="myBtn" type="submit">{{ __('messages.login_btn') }}</button>
                  <button class="btn sign_btn" id="register" type="submit">{{ __('messages.signup_btn') }}</button>

                @else
                <!--<span class="users"><img src="../frontview/images/download.png" alt="img" class="user_name">{{Auth::user()->name}} <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>-->  

                <li class="nav-item dropdown users">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu pbit-cust-logout" aria-labelledby="navbarDropdown">          
                        <a class="dropdown-item" href="{{ url('/user-dashboard') }}" >
                            Dashboard
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>            
                @endif                     
                            </div>
                    <div class="dropdown-menu drops" id="navbarDropdowncoursediv" aria-labelledby="navbarDropdown">
                        <div class="vertcal_list">
                            <ul>
                                @php
                                    $i = 1;
                                    $courses= App\Helper::get_header();
                                @endphp
                                @foreach($courses as $course)
                                    <li class="li_tb tb-{{ $i }}" id="{{ strtolower($course['name']) }}course"><span>
                                        <a href="{{ url('/course').'/'.strtolower($course['name']) }}">{{ ucfirst($course['name']) }}</a></span>
                                        <ul class="tab-link commonclass" id="{{ strtolower($course['name']) }}">
                                        <li>
                                        @foreach($course['topics'] as $value)
                                            @foreach($value as $val)
                                                <ul class="tab-link-2">
                                                    <li><a href="{{ url('/topic')}}/{{str_slug($val->title, '-')}}"><i class="far fa-address-book"></i>{{ ucfirst(substr($val->title, 0, 10)."...") }}</a></li>
                                                </ul>
                                            @endforeach
                                        @endforeach
                                    </li>
                                    </ul>
                                    </li>
                                    @php
                                        $i++
                                    @endphp
                                @endforeach 
                                @if($i >=14)
                                    <a href="{{url('/')}}/course" class="view-btn-all">View All</a>
                                @endif
                                
                            </ul>
                        </div>                  
                    </div>

                    <?php $courses = App\Chapter::get();?>
                 <div class="drops-2sect" id="navbarDropdownTopicsdiv" style="display: none;">         
                        <ul class="tab-link">
                            <li>
                            @php
                                $i=0;
                                
                            @endphp                            
                            @foreach($courses as $course)
                            @php $topiccount=1; @endphp
                                     <li class="chapter-section">{{ucfirst(substr($course->title, 0, 60)."...")}}</li>       
                                    @foreach($course->topics as $topic)                                        
                                           @php $title = str_slug($topic->title, '-'); @endphp

                                <ul class="tab-link-2">
                                    <li><a href="{{url('/topic').'/'.$title}}"><i class="far fa-address-book"></i> {{ ucfirst(substr($title, 0, 10)."...") }}
                                    </a></li>                                    
                                </ul>
                                 @php
                                   if($topiccount>=4){
                                   break;
                               }
                                  $topiccount++; @endphp
                                 @endforeach 
                                @php
                                    $i++;
                                @endphp
                            @endforeach 
                            </li>
                            @if($i >=14)
                                <a href="#" class="view-btn-all">View All</a>
                            @endif
                        </ul>               
                    </div>  
            </nav>
            <!-- nav end -->
            

            @if($class =='home')         
          <div class="banner">
                <h2>{{ __('messages.expert_txt_home') }} <span> {{ __('messages.expert_txt_home2') }} </span></h2>
                <p>{{ __('messages.Industry_txt_home') }} <span> {{ __('messages.power_txt_home') }} </span>{{ __('messages.course_txt_home') }}</p>
                <div id="custom-search-input">
                    <div class="input-group">
                     @csrf  
                        <input class="form-control input-lg search userSearch" id="userSearch" placeholder="{{ __('messages.placeholder_search_home')}}" type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg btns-serch" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>                     
                    </div>                  
                </div> 
                <div id="searchResponse">
                    <ul class="searchul" id="searchul"></ul>            
                </div>
            </div> 
        @else
        <div class="banner">       
            <h2 >{{ucfirst($class)}}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb nav-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/')}}/{{strtolower($breadcrum)}}">{{ucfirst($class)}}</a></li>           
                </ol>
            </nav>
        </div>              
        @endif
        
        </div><!-- nav -->
    </div><!-- header -->

<div class="modal fade" id="modal-edit-homepop" role="dialog">
    <div class="modal-dialog">    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
</div>

 
 