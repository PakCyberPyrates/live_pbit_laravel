$(document).ready(function(){
$('html').click(function(e){
	if (e.target.id == 'hsearch') {
	} else {
		$("#hsearch").hide('slow');	
		$(".searchul").hide('slow');	
	}	
});

$( "#navbarDropdownCourse,#navbarDropdowncoursediv" ).mouseover(function() {
 $('#navbarDropdowncoursediv').show();
}).mouseout(function() {
 $('#navbarDropdowncoursediv').hide();
});

$( "#navbarDropdownTopics,#navbarDropdownTopicsdiv" ).mouseover(function() {
 $('#navbarDropdownTopicsdiv').show();
}).mouseout(function() {
 $('#navbarDropdownTopicsdiv').hide();
});

/*course package  page popup*/
$(".coursepackage").click(function(){ 
	$('#coursesection').modal('show');
});

$(".cross_img_package").click(function(){
	$('#coursesection').modal('hide');
});

/*course package  page popup*/
  $("#myBtn").click(function(){
      $("#pbit-forget-pass-sect").hide();
      $(".signup-section").hide();
      $("#myModal").modal();
      $(".login-section").show();

  });

  $("#myBtnres").click(function(){
  	//alert("dfsdf");
      $("#pbit-forget-pass-sect").hide();
      $(".signup-section").hide();
      $("#myModal").modal();
      $(".login-section").show();

  });
$("#pbit-opn-signup").click(function(){ 
      $(".login-section").hide();
      $(".signup-section").show();    
  });

  $("#pbit-opn-login").click(function(){       
      $(".signup-section").hide();
      $(".login-section").show(); 
  });

   $("#pbit-fgt-pass").click(function(){
      $(".login-section").hide();
      $("#pbit-forget-pass-sect").show();   
  });
  $("#pbit-forget-login").click(function(){
      $("#pbit-forget-pass-sect").hide();
      $(".login-section").show();        
  });
  $("#register").click(function(){
      $(".login-section").hide();
      $("#pbit-forget-pass-sect").hide();  
      $("#myModal").modal();        
      $(".signup-section").show();        
  });
/* COURSES MENU DYNAMICALLY SHOW HIDE CODE BY S*/
  $( "#navbarDropdownCourse" ).hover(
      function() {       
        $("#navbarDropdowncoursediv").css("display","block"); 
                var idvar=$( this ).attr('id');
                $( "#navbarDropdowncoursediv li" ).hover(
            function() {               
                var innerids = $( this ).attr('id');                       
                var getinnerids = innerids.replace("course", "");
                $('#navbarDropdowncoursediv .commonclass').css("display","none");          
                document.getElementById(getinnerids).style.display = "block";                    
            }
          ); 
      }, function() {
          $("#navbarDropdowncoursediv").css("display","none");            
    }
  );

/* COURSES MENU DYNAMICALLY SHOW HIDE CODE BY S*/
$('.packagepbit input[type="checkbox"]').click(function(){			
          var totalprice = 0;
          var arrText= new Array();
		$('.packagepbit input[type="checkbox"]:checked').each(function() {				
			    totalprice = totalprice + parseFloat(this.value);
			    
			    arrText.push($( this ).attr('course-id'));
		});
		//console.log( totalprice ); // 15
		if(totalprice){}
		$('.rates-star').html('<span>$</span>'+totalprice);
		$('#add_package_list').val(arrText);		         

})
       var totalprice = 0;
       var arrText= new Array();
     $('.packagepbit input[type="checkbox"]:checked').each(function() {				
			    totalprice = totalprice + parseFloat(this.value);
			     arrText.push($( this ).attr('course-id'));				  
		});
		//console.log( totalprice ); // 15
		if(totalprice){$('.rates-star').html('<span>$</span>'+totalprice);}
		$('#add_package_list').val(arrText);

$("#opensearchh").click(function(event) {    
	$( "#hsearch" ).toggle( "slow", function() { 
    });
	event.stopPropagation();
});


$(".ration-section label").click(function(event) { 
    var currentrating = $(this).attr('ratingact');   
  	$.ajax({
  	              url: BASE_URL+"/rating",
                  method: 'POST',
                  data: {
                     _token: $('input[name="_token"]').attr('value'),
                    rating: currentrating,                                                    
                    productid: $('input[name="productid"]').attr('value')                                  
                  },
                  success: function(result){	                  	
                  }
            }); 
});


}); //document end


/*vIDEO popup*/
function video_popup(video_link){
  return $.confirm({
      theme:'supervan,my-video-wapper',
      title: '',
      content: '<video id="my-video" class="video-js vjs-big-play-centered" controls preload="auto" width="640" height="564"  poster="" data-setup="{}"><source src="'+video_link+'" type="video/mp4"><source src="'+video_link+'" type="video/webm"><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that<a href="https://videojs.com/html5-video-support/" ="_blank">supports HTML5 video</a></p></video>',
      animation: 'scale',
      animationClose: 'top',
      closeIcon : true,
      columnClass:'col-md-12',
      buttons:{ 
          close :{
              btnClass: 'btn-blue my-video-btn',
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

/*vIDEO popup*/