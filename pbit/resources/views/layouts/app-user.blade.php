<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">	
	<link rel="icon" href="{{ asset('public/frontview/assets/images/favi.png') }}" type="">
  <!-- Bootstrap CSS -->      
  <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/bootstrap.min.css') }}">
    <!--Videojs css-->
  <link href="{{ asset('public/js/videojs/videojs/video-js.css')}}" rel="stylesheet">
  <link href="{{ asset('public/js/videojs/plugins/videojs-seek-buttons/videojs-seek-buttons.css')}}" rel="stylesheet">
  <link href="{{ asset('public/js/videojs/plugins/videojs-settings-menu/videojs-settings-menu.css')}}" rel="stylesheet">
   <!--Videojs css-->
  <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/responsive.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Responsive menu css--> 
 <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/demo.css') }}">
  <!-- Responsive menu css--> 
  <script type="text/javascript">
    var  BASE_URL = '{{ url("/")}}';
  </script>  
  <title>@yield('title') | Powerbitraining</title>
</head>   
<body>
  <div class ="loader-wrapper">
        <div class="loader-img">
              <img src="{{ asset('public/frontview/images') }}/loader-pb-2.png" alt="loader-pb-2">
        </div> 
      </div>
    <div class="main-container">
    	<div class="dashboard_header">
            <div class="row no-gutters">

                <div class="left-dashbord">                    
                @if (Request::is('user/cource/*'))
                
                    @include('components.dashboard_user_left')
                @else                
                    @include('components.dashboard_header_left')
                @endif
                </div>
                            
                <div class="right-dashbord">
                    @include('components.dashboard_header_right')

                    <div class="dashboard_mid-right app-user-page">
					  @if (Request::is('user-dashboard'))
						  @else
                        <a href="{{ url('/') }}/user-dashboard" class="back_link"><i class="fas fa-arrow-left"></i>Back</a>
              @endif
						 @yield('right-content')
                    </div>

                </div>
            </div>
        </div>
    </div>    
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="{{ asset('public/frontview/assets/js/jquery.min.js') }}"></script>
             <script src="{{ asset('public/frontview/assets/js/custom-script-ajax.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    <script src="{{ asset('public/frontview/assets/js/api.js') }}"></script>
    <!-- Responsive menu js-->
    <script src="{{ asset('public/frontview/assets/js/hc-offcanvas-nav.js')}}"></script>
    <!-- Responsive menu js-->
      <script src="{{ asset('public/frontview/assets/js/custom-script.js') }}"></script>  
      <!-- Video js -->   
    <script src="{{ asset('public/js/videojs/videojs/video.min.js')}}"></script>
    <script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
    <script src="{{ asset('public/js/videojs/plugins/videojs-seek-buttons/videojs-seek-buttons.min.js')}}"></script>
    <script src="{{ asset('public/js/videojs/plugins/videojs-settings-menu/videojs-settings-menu.js')}}"></script>
    <script src="{{ asset('public/js/videojs/plugins/fw-videojs-playlist/dist/videojs-playlist.min.js')}}" rel="stylesheet" ></script>
 <!--    <script src="{{ asset('public/js/videojs/plugins/fw-videojs-playlist/videojs-playlist.min.js')}}"></script> -->
    
     <!-- Video js -->  
        @yield('script')
            <script type="text/javascript">
        $(document).ready(function () {
          $('.loader-wrapper').fadeOut();  
          //alert("dsfsdfsd");
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('.left-dashbord').toggleClass('toggled');
        
  });  



});

/*Responsive memnu js by S*/

 (function($) { 
          var $main_nav = $('#main-nav');
          var $toggle = $('.toggle');
          var defaultData = {
            maxWidth: false,
            customToggle: $toggle,
            navTitle: '',
            levelTitles: true,
            pushContent: '#container',
            insertClose: 2
          };

          // add new items to original nav
          $main_nav.find('li.add').children('a').on('click', function() {             
            var $this = $(this);
            var $li = $this.parent();
            var items = eval('(' + $this.attr('data-add') + ')');

            $li.before('<li class="new"><a>'+items[0]+'</a></li>');

            items.shift();

            if (!items.length) {
              $li.remove();
            }
            else {
              $this.attr('data-add', JSON.stringify(items));
            }

            Nav.update(true);
          });

          // call our plugin
          var Nav = $main_nav.hcOffcanvasNav(defaultData);

          // demo settings update

          const update = (settings) => {
            if (Nav.isOpen()) {
              Nav.on('close.once', function() {
                Nav.update(settings);
                Nav.open();
              });

              Nav.close();
            }
            else {
              Nav.update(settings);
            }
          };

          $('.actions').find('a').on('click', function(e) {
            e.preventDefault();

            var $this = $(this).addClass('active');
            var $siblings = $this.parent().siblings().children('a').removeClass('active');
            var settings = eval('(' + $this.data('demo') + ')');

            update(settings);
          });

          $('.actions').find('input').on('change', function() {
            var $this = $(this);
            var settings = eval('(' + $this.data('demo') + ')');

            if ($this.is(':checked')) {
              update(settings);
            }
            else {
              var removeData = {};
              $.each(settings, function(index, value) {
                removeData[index] = false;
              });

              update(removeData);
            }
          });
        })(jQuery);
/*Responsive memnu js by S*/
   
</script>
<body>
</html>


 