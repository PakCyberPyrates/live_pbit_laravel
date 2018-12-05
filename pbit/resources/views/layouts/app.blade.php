<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <!-- favicon -->
   <!--  <link rel="icon" href="frontview/images/favi.png" type=""> -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="{{asset('public/uploads/fav/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">    
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <!-- Bootstrap CSS -->      
    <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/bootstrap.min.css') }}">        
    <!--Video js csss-->
    <link href="{{ asset('public/js/videojs/videojs/video-js.css')}}" rel="stylesheet">
    <link href="{{ asset('public/js/videojs/plugins/videojs-seek-buttons/videojs-seek-buttons.css')}}" rel="stylesheet">
    <link href="{{ asset('public/js/videojs/plugins/videojs-settings-menu/videojs-settings-menu.css')}}" rel="stylesheet">
     <!--Video js csss-->
    <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery-confirm --> 
    <link rel="stylesheet" href="{{ asset('public/css/jquery-confirm/jquery-confirm.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/demo.css') }}">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,600,700">
	  <style>
	
      /*Site loader css*/
	  </style>
    <!-- jquery-confirm --> 
    @yield('style') 
    <script type="text/javascript">
    var  BASE_URL = '{{ url("/")}}';
    </script> 
    <title>@yield('title') | Powerbitraining  </title> 
</head>
<?php //$base_url=rtrim($app['url']->to('/'),'public'); ?>  
<body>
    <!-- <div id="fakeloader"></div> -->
      <div class ="loader-wrapper">
        <div class="loader-img">
              <img src="{{ asset('public/frontview/images') }}/loader-pb-2.png" alt="loader-pb-2">
        </div> 
      </div>
    @include('includes.header')
    <div class="main-container">
            @yield('content')
    </div>
    @include('includes.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- fakeLoader -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontview/assets/js/custom-script.js') }}"></script>
    <script src="{{ asset('public/frontview/assets/js/custom-script-ajax.js') }}"></script>
    <!-- jquery-confirm -->
    <script  src="{{ asset('public/js/jquery-confirm/jquery-confirm.js')}}"></script>
    <!-- Video js -->   
    <script src="{{ asset('public/js/videojs/videojs/video.min.js')}}"></script>
    <script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
    <script src="{{ asset('public/js/videojs/plugins/videojs-seek-buttons/videojs-seek-buttons.min.js')}}"></script>
    <script src="{{ asset('public/js/videojs/plugins/videojs-settings-menu/videojs-settings-menu.js')}}"></script> 
    <script src="{{ asset('public/js/videojs/plugins/fw-videojs-playlist/dist/videojs-playlist.min.js')}}"></script> 


     <!-- Video js -->  
    <script src="{{ asset('public/frontview/assets/js/api.js')}}"></script>
    <script src="{{ asset('public/frontview/assets/js/hc-offcanvas-nav.js')}}"></script>
     @yield('script')
    <script type="text/javascript">
        $(document).ready(function(){
              $('.loader-wrapper').fadeOut();       			
            if(!checkCookie()){
            $.confirm({
                        theme: 'black,my-terms-popup',
                        title : false,
                        columnClass: 'col-md-12',
                        containerFluid: true, // this will add 'container-fluid' instead of 'container'
                        content: 'We use cookies to help our site work, to understand how it is used, and to tailor the adverts presented on our site. By clicking “Accept” below, you agree to us doing so. You can read more in our cookie notice. Or, if you do not agree, you can click Manage below to access other choices.',
                        offsetTop: '38%',
                        buttons: {
                                Accept: {
                                text: 'Accept', // text for button
                                btnClass: 'btn-blue', // class for the button
                                keys: ['enter', 'a'], // keyboard event for button
                                isHidden: false, // initially not hidden
                                isDisabled: false, // initially not disabled
                                action: function(heyThereButton){
                                    setCookie("accept", 'true', 30);
                                }
                            },
                            close:{

                            }
                        }
                    });
            }

        $('.in_progress').on('click',function(){
             $.alert('<b>Opps!.. You can not download this document. You should buy it first.</b>');
        });

      $('.view_video').on('click',function(e){
            //alert("Hello Iphone")
            e.preventDefault();
            that = $(this); 

            if(that.attr('v-url') ==  ''){
                $.alert('<b>Sorry video not found.</b>');
                return ;
            }
            video_popup($(this).attr('v-url')).open();
        });    

        }); //document element end

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
	
    </script>
<body>
</html>


