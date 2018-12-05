<!doctype html>
<html class="fixed sidebar-light">
    <head>
        <!-- Basic -->
        <meta charset="UTF-8">
        <title>PBIT</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css')}}">
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap.css')}}" />

        <link rel="stylesheet" href="{{ asset('public/vendor/font-awesome/css/font-awesome.css')}}" />

        <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />
        <!-- Specific Page Vendor CSS -->
        @yield('style')
        
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('public/css/theme.css')}}" />
        <!-- jquery-confirm --> 
        <link rel="stylesheet" href="{{ asset('public/css/jquery-confirm/jquery-confirm.css')}}" />
        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('public/css/skins/default.css')}}" />
         <!-- validator-js--> 
        <link rel="stylesheet" href="{{ asset('public/vendor/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" />
        <link rel="stylesheet" href="{{ asset('public/vendor/animate/animate.css')}}">
        <!-- Theme Custom CSS --> 
        <link rel="stylesheet" href="{{ asset('public/css/custom.css')}}">
        <!-- Head Libs -->
        <link href="{{ asset('public/js/videojs/videojs/video-js.css')}}" rel="stylesheet">
        <link href="{{ asset('public/js/videojs/plugins/videojs-seek-buttons/videojs-seek-buttons.css')}}" rel="stylesheet">
        <link href="{{ asset('public/js/videojs/plugins/videojs-settings-menu/videojs-settings-menu.css')}}" rel="stylesheet">

        <style type="text/css">
            
            .video-js .vjs-time-control{display:block !important;}
            .video-js .jconfirm-buttons{display: none !important;}
            .vjs-icon-cog::before { font-size: medium; }

        </style>
        <script src="{{ asset('public/vendor/modernizr/modernizr.js')}}"></script>
    </head>
<body class="loading-overlay-showing show-lock-screen" data-loading-overlay>
        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

    <section class="body">
<?php $user = Auth::user(); ?>
        <!-- Header-->
        @include('admin.includes.header')
        <!-- Header-->
        <div class="inner-wrapper">
            <!-- Left Panel -->
             @include('admin.includes.left_sidebar')
            <!-- Header-->
            <!-- Body-->
             @yield('content')
             <!-- Body-->

             
        <section role="main" class="content-body">

            <div class="row">
                <div class="col-lg-12">
                        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017 - {{date('Y')}} | Privacy | Powered by  <a href="http://powerbitraining.com" > powerbitraining.com </a> | All Rights Reserved.</p>
                </div>
            </div>
         </section>
        </div>
        <!-- /#right-panel -->
         {{--@include('admin.includes.right_sidebar')--}}
        <!-- Right Panel -->
   </section>

    <!-- Vendor -->
        <script type="text/javascript">
            var BASE_URL =  "{{url('/')}}";
        </script>
        <script src="{{ asset('public/vendor/jquery/jquery.js')}}"></script>
        <script src="{{ asset('public/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{ asset('public/vendor/popper/umd/popper.min.js')}}"></script>
        <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.js')}}"></script>
         <!-- validator-js--> 
        <script src="{{ asset('public/vendor/bootstrapvalidator/dist/js/bootstrapValidator.js')}}"></script>
        <!-- <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script> -->
        <script src="{{ asset('public/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{ asset('public/vendor/common/common.js')}}"></script>
        <script src="{{ asset('public/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{ asset('public/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
        <!-- jquery-confirm -->
        <script  src="{{ asset('public/js/jquery-confirm/jquery-confirm.js')}}"></script>
        ​<!-- video Player -->
        <script src="{{ asset('public/js/jwplayer.js')}}" ></script>
        <!-- Theme Custom -->
        <script src="{{ asset('public/js/custom.js')}}"></script>
        <?php
            if(session('status')){
                echo '<script type="text/javascript">success_msg("'.session('status').'");</script>';
            }
            if(session('error')){
                echo '<script type="text/javascript">error_msg("'.session('error').'");</script>';
            }
        ?>
        @yield('script')
        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('public/js/theme.js')}}"></script>
        
        <!-- Theme Initialization Files -->
        <script src="{{ asset('public/js/theme.init.js')}}"></script>
        <script src="{{ asset('public/js/examples/examples.loading.overlay.js')}}"></script>
        <!-- Videojs Files -->
        <script src="{{ asset('public/js/videojs/videojs/video.min.js')}}"></script>
        <script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
        <script src="{{ asset('public/js/videojs/plugins/videojs-seek-buttons/videojs-seek-buttons.min.js')}}"></script>
        <script src="{{ asset('public/js/videojs/plugins/videojs-settings-menu/videojs-settings-menu.js')}}"></script>
        <script type="text/javascript">
        $(document).ready(function(){
         $('input').blur(function(){
            $('input[type=submit]').removeAttr('disabled');
         });
         get_unread_orders();
         get_notifications();
        setInterval(function(){
            get_unread_orders();
            get_notifications();
        },30000);

                     //// 
        $('.view_video').on('click',function(e){

            e.preventDefault();
            that = $(this); 

            if(that.attr('v-url') ==  ''){
                $.alert('<b>Sorry video not fount.</b>');
                return ;
            }
            video_popup($(this).attr('v-url')).open();
        });


         function video_popup(video_link){
            return  $.confirm({
                        theme: 'black,my-video-popup',
                        title: '',
                        content: '<video id="my-video" class="video-js vjs-big-play-centered" controls preload="auto" width="640" height="564"  poster="" data-setup="{}"><source src="'+video_link+'" type="video/mp4"><source src="'+video_link+'" type="video/webm"><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that<a href="https://videojs.com/html5-video-support/" ="_blank">supports HTML5 video</a></p></video>',
                        animation: 'scale',
                        animationClose: 'top',
                        closeIcon : true,
                        columnClass:'col-md-12',
                        buttons:{ 
                            close :{

                            }
                        },
                        onClose : function() {
                             var oldPlayer = document.getElementById('my-video');
                             videojs(oldPlayer).dispose();
                          },
                        onContentReady: function () {

                            if(typeof video == 'undefined'){

                                var video =   videojs("my-video",{
                                      controls: true,
                                      autoplay: false,
                                      preload: 'auto',
                                      fluid : true,
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
                                    this.hotkeys({
                                      seekStep: 10
                                    });
                                    this.seekButtons({
                                        forward: 30,
                                        back: 10
                                    });
                                  });
                            }
                        }                    
                   }); 
        }

// ready end 
});
        </script>
        
</body>
</html>
