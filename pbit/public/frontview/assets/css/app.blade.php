<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon -->
   <!--  <link rel="icon" href="frontview/images/favi.png" type=""> -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="{{asset('public/uploads/fav/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="{{ asset('public/js/fakeLoader/fakeLoader.css')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/uploads/fav/favicon-32x32.png')}}">
    <!-- Bootstrap CSS -->      
    <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/bootstrap.min.css') }}">        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>             
    <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontview/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery-confirm --> 
    <link rel="stylesheet" href="{{ asset('public/css/jquery-confirm/jquery-confirm.css')}}" />
	<style>
	.fl.spinner6 {
	position: absolute !important;
	left: 0 !important;
	top: 0px !important;
	height: 45px !important;
	width: 45px !important;
	right: 0 !important;
	bottom: 0 !important;
	margin: auto !important;
}
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

    <div id="fakeloader"></div>

    @include('includes.header')
    <div class="main-container">
            @yield('content')
    </div>
    @include('includes.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- fakeLoader -->
    <script  src="{{ asset('public/js/fakeLoader/fakeLoader.min.js')}}"></script>
    <script type="text/javascript">
       $("#fakeloader").fakeLoader({
                timeToHide:1200,
                bgColor:"#1abc9c",
                spinner:"spinner6"
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontview/assets/js/custom-script.js') }}"></script>
    <script src="{{ asset('public/frontview/assets/js/custom-script-ajax.js') }}"></script>
    <!-- jquery-confirm -->
    <script  src="{{ asset('public/js/jquery-confirm/jquery-confirm.js')}}"></script>
    <!-- Jwplayer -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jwplayer/7/jwplayer.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
     @yield('script')
    <script type="text/javascript">

        $(document).ready(function(){
			
            if(!checkCookie()){

            $.confirm({
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
             $.alert('<b>Opps!..  This links is under construction</b>');
        });

        //// 
        $('.view_video').on('click',function(e){
            e.preventDefault();
            that = $(this); 

            if(that.attr('v-url') ==  ''){
                $.alert('<b>Sorry video not fount.</b>');
                return ;
            }

           $.confirm({
                title: '',
                content: '<div class="modal-body" id="jwplayersection"></div>',
                animation: 'scale',
                animationClose: 'top',
                columnClass:'col-md-12',
                buttons: {
                  close: function() {
                    // lets the user close the modal.
                  }
                },
                onContentReady: function () {
                    // bind to events
                    var jc = this;
               /*     jwplayer("jwplayersection").setup({
                        file: that.attr('v-url'),
                        image: that.attr('src'),
                        height: 550,
                        width:  1080,
                        //stretching: "exactfit",
                        flashplayer:"https://cdn.jsdelivr.net/jwplayer/5.10/player.swf"
                    });*/
                   // alert(that.attr('v-url'));

                    var playerInstance = jwplayer("jwplayersection");
					playerInstance.setup({
						file: that.attr('v-url'),
						height: 550,
                        width:  1080,                        
						image: that.attr('src'),
						skin: {
							name: "bekle",
							active: "red",
							inactive: "white",
							background: "black"
						}
					});


                }
            }); 

              //alert("ello");
        });

          /*$url =  'https://s3.us-east-1.amazonaws.com/pbi-static-video';*/
          /*$('.view_video').on('click',function(e){
                        e.preventDefault();
                        that = $(this); 
                        if(that.attr('v-url') ==  ''){
                                 $.alert('<b>Sorry video not fount.</b>');
                                 return ;
                            }
                    var getitemname=that.attr('getitem');
                    jwplayer("jwplayersection"+getitemname).setup({
                        file: that.attr('v-url'),
                        //image: "http://powerbitraining.com/public/frontview/images/advanced.png",
                        height: "100%",
                        width: "100%",
                        stretching: "exactfit",
                        flashplayer:"//cdn.jsdelivr.net/jwplayer/5.10/player.swf"
                    });               
           
                 }); 
*/

	  $(".container .navz_toggle").click(function(){
	//	$("#navbarSupportedContent1" ).css('width', '320px');
		$("#navbarSupportedContent1").animate( { "width": "70%"} , 1000 );
		$(".closebtn").animate( { "width": "0%"} , 1000 );
	  });
        });


	
    </script>


<body>
</html>


