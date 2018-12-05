@extends('admin.layouts.main')


@section('style')
<link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
<link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
<style type="text/css">
	.text-lg-right{
		text-align: left !important;
	}
	.invalid-feedback{
		display: block !important;
	}
	ul.thumd-list {
    margin: 0;
    padding: 0;
}
ul.thumd-list li {
    margin: 0 4px;
    padding: 0;
    float: left;
    list-style: none;
    position: relative;
    font-size : 16px;
}

ul.thumd-list li i{
	display: inline-block;
	padding-right: 0px;
	vertical-align: top;
	top: -8px;
	position: absolute;
	right: 0px;
	color: #d2312d;
	text-shadow: 0px 0px 2px #0009;
}

</style>
@endsection

<?php  
  $url =  'https://s3.us-east-1.amazonaws.com/pbi-static-video';  
?>
							 
@section('content')
<section role="main" class="content-body card-margin">


	<header class="page-header">
        <h2 style="width: 27%">
          <a href="{{url()->previous()}}" class=""> 
          	<i class="fa fa-chevron-left"></i>Back
          </a>
        </h2>
      
        <div class="right-wrapper text-right">
          <ol class="breadcrumbs">
            <li>
              <a href="{{url('/admin/dashboard')}}">
                <i class="fa fa-home"></i>
              </a>
            </li>
            <li><span>Dashboard</span></li>
            <li><span>Edit Course</span></li>
          </ol>
          
          <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
				</div>
				<h2 class="card-title">Edit {{ $course->course_title}}</h2>
			</header>
			<div class="card-body">
				<form class="form-horizontal form-bordered" id="edit-course-form" action="{{ action('CourseController@update',[$course->id])}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Course Name</label>
						<div class="col-lg-6">
							<input type="text" class="form-control{{ $errors->has('course_name') ? ' is-invalid' : '' }}" name="course_name" value="{{ $course->course_name}}">
							@if ($errors->has('course_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('course_name') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Course Title</label>
						<div class="col-lg-6">
							<input type="text" class="form-control{{ $errors->has('course_title') ? ' is-invalid' : '' }}" name="course_title" value="{{ $course->course_title}}">
							@if ($errors->has('course_title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('course_title') }}</strong>
                                </span>
                            @endif
						</div>
					</div>


					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText"><span style="text-decoration: line-through;"> Price</span> / Actual Price</label>
						<div class="col-lg-3">
							<input type="number" class="form-control{{ $errors->has('course_price') ? ' is-invalid' : '' }}" name="course_price" value="{{$course->course_price}}" step="0.01" >
							@if ($errors->has('course_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('course_price') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col-lg-3">
							<input type="number" class="form-control{{ $errors->has('actual_price') ? ' is-invalid' : '' }}" name="actual_price" value="{{$course->actual_price}}" step="0.01" >
							@if ($errors->has('actual_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('actual_price') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Description</label>
						<div class="col-lg-10">
							<textarea name="course_description" data-plugin-markdown-editor rows="10">{{ $course->course_description}}</textarea>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Upload Thumnail</label>
						<div class="col-lg-5">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fa fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="image" accept="image/png, image/jpeg,image/jpg" >
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
								@if ($errors->has('image'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $errors->first('image') }}</strong>
	                                </span>
	                            @endif
						</div>
						<div class="col-lg-5">
							<ul class="thumd-list">
								@if($course->image)
								<li>
									<i class="fa fa-remove remove_file" file-type="thumnail_id" file-id="{{$course->image}}"  aria-hidden="true"></i>
									<img src="{{ url('public/uploads/thumnail').'/'.$course->image}}" width="50" height="50" class="view_image" >
								</li>
								@endif
							</ul>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Upload Video</label>
						<div class="col-lg-5">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fa fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="video" accept="video/mp4, video/ogg,video/wmv,video/avi" >
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
									
								</div>
							</div>
							@if($errors->has('video'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('video') }}</strong>
                                </span>
		                    @endif
						</div>
						<div class="col-lg-5">
							<ul class="thumd-list">
						 
								@if(isset($course->video))

								<?php
									$thumb = url('public/img/videos-default.jpg');
									if(!empty($course->video->thumb_url)){
									  	$thumb = url('public/uploads/videos/thumb').'/'.$course->video->thumb_url;
									}
									$video_link = App\Helper::get_link($course->video->url,'course'); // get a link that expire in 1 hour
								?>

									<li>
										<i class="fa fa-remove remove_file" file-type="video_ids" file-id="{{$course->video->id}}" aria-hidden="true"></i>
										<img src="{{$thumb}}" v-url="{{ $video_link }}" class="view_video" width="50" height="50">
									</li>
								@endif
							</ul>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Upload Document
							<small>(optional)</small></label>
						<div class="col-lg-5">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fa fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="document[]"  multiple="multiple" >
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								
								</div>
							</div>
								@if ($errors->has('document'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $errors->first('document') }}</strong>
	                                </span>
	                            @endif
						</div>

						<div class="col-lg-5">
								<ul class="thumd-list">
									@if(($course->document))
										@foreach($course->document as $doc)
										<li>
											<i class="fa fa-remove remove_file" file-type="document_ids"  file-id="{{$doc->id}}" aria-hidden="true"></i>
											<img src="{{url('public/img/pdf.png')}}" pdf-src="{{url('public/uploads/documents').'/'.$doc->document_url}}" class="view_pdf" width="50" height="50">
										</li>
										@endforeach
									@endif
								</ul>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Publish</label>
						<div class="col-lg-6">
							<?php 
						    $options = ['0' => 'Unpublish' , '1' => 'published'] ;
						     ?>
							{!! Form::select('publish', $options, $course->publish ,  ['class' => 'form-control', ]) !!}
						</div>
					</div>

					<input type="hidden" name="thum_id" >
					<input type="hidden" name="video_ids" >
					<input type="hidden" name="document_ids" >
					
					<div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

				</form>
			</div>
		</section>
	</div>
</div>
</section>
@endsection


@section('script')
<script src="{{ asset('public/vendor/autosize/autosize.js')}}"></script>
<script src="{{ asset('public/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
<script src="{{ asset('public/vendor/bootstrap-markdown/js/markdown.js')}}"></script>
<script src="{{ asset('public/vendor/bootstrap-markdown/js/to-markdown.js')}}"></script>
<script src="{{ asset('public/vendor/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){

 var active_link = 0;
 active_nav_links(2,active_link);


	$('#edit-course-form').bootstrapValidator({

        message: 'This course name is not valid',
        fields: {
            course_name: {
                validators: {
                    notEmpty: {
                        message: 'The course name is required and cannot be empty'
                    }
                }
            },
            course_title: {
                validators: {
                    notEmpty: {
                        message: 'The course title is required and cannot be empty'
                    }
                }
            },
            course_price: {
                message: 'The course price is not valid',
                validators: {
                    notEmpty: {
                        message: 'The course price is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^\d*(\.\d{0,2})?$/,
                        message: 'The price can only consist of numeric and float value.'
                    }
                }
            },
            actual_price: {
                message: 'The actual price is not valid',
                validators: {
                    notEmpty: {
                        message: 'The actual price is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^\d*(\.\d{0,2})?$/,
                        message: 'The actual price can only consist of numeric and float value.'
                    }
                }
            },
            course_description:{
            	validators: {
                    notEmpty: {
                        message: 'The course description is required and cannot be empty'
                    }
                }
            }
        }
    });



var that = null;

$("#edit-course-form input[type='hidden']").not( $( "#edit-course-form input[type='hidden']" )[ 0 ]).not( $( "#edit-course-form input[type='hidden']" )[ 1 ] ).val('');

	$('.view_image').on('click',function(){
        
         that = $(this); 

		$.confirm({
		    title: '',
		    content: '<img src="'+that.attr('src')+'">',
		    animation: 'scale',
		    animationClose: 'top',
		    columnClass:'col-md-6 col-md-offset-3',
		    buttons: {
		      
		      close: function() {
		        // lets the user close the modal.
		      }
		    },
		  });
	});
 

var that = null;
	$('.view_pdf').on('click',function(){
        that = $(this); 
		
		$.confirm({
		    title: '',
		    content: '<embed src="'+that.attr('pdf-src')+'" type="application/pdf" width="100%" height="600px"  />',
		    animation: 'scale',
		    animationClose: 'top',
		    columnClass:'col-md-10 col-md-offset-3',
		    buttons: {
		      close: function() {
		        // lets the user close the modal.
		      }
		    },
		  });
	});

var thumnail_id = 0 ;
var video_ids = [] ;
var document_ids = [] ;
var trailer_id = 0 ;

$('.remove_file').on('click',function(){
	var image_id  =  $(this).attr('file-id');
	var image_type=  $(this).attr('file-type');

switch (image_type) {

    case 'thumnail_id':
        thumnail_id = image_id ;   
        $("input[name='thum_id']").val(thumnail_id);
        break;
    case 'video_ids':
        video_ids.push(image_id) ;   
        $("input[name='video_ids']").val(video_ids);
        break;
    case 'document_ids':
        document_ids.push(image_id) ;   
        $("input[name='document_ids']").val(document_ids);
        break;
    case 6:
        return false;
}
$(this).parent().remove();

});

});

</script>
@endsection