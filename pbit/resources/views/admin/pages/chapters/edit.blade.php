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
        <h2>Edit Chapter</h2>
      
        <div class="right-wrapper text-right">
          <ol class="breadcrumbs">
            <li>
              <a href="{{url('/admin/dashboard')}}">
                <i class="fa fa-home"></i>
              </a>
            </li>
            <li><span>Dashboard</span></li>
            <li><span>Edit Chapter</span></li>
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
				<h2 class="card-title">Edit :-  {{ $chapter->title}}</h2>
			</header>
			<div class="card-body">
				<form class="form-horizontal form-bordered" id="edit-chapter-form" action="{{ action('ChapterController@update',[$chapter->id])}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Title</label>
						<div class="col-lg-6">
							<input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $chapter->title}}" required>
							@if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Description</label>
						<div class="col-lg-10">
							<textarea name="description" data-plugin-markdown-editor rows="10" required>{{ $chapter->description}}</textarea>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Select Course</label>
						<div class="col-lg-6">
							<select  class="form-control populate" name="course_id" required>
								@foreach($courses as $course)
								<?php $selected = ($course->id == $chapter->course_id)?'selected=selected':'';?>
									<option value="{{$course->id}}" {{$selected}}>{{$course->course_name}}</option>
								@endforeach
							</select>
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
										<input type="file" name="thumnail" accept="image/png, image/jpeg,image/jpg"  >
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
								@if($chapter->image)
								<li>
									<i class="fa fa-remove remove_file" file-type="thumnail_id" file-id="{{$chapter->image}}"  aria-hidden="true"></i>
									<img src="{{ url('public/uploads/thumnail').'/'.$chapter->image}}" width="50" height="50" class="view_image" >
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
									@if(isset($chapter->video))
										<?php
												$thumb = url('public/img/videos-default.jpg');
												if(!empty($chapter->video->thumb_url)){
												  	$thumb = url('public/uploads/videos/thumb').'/'.$chapter->video->thumb_url;
												}
								            	$trailer_url = App\Helper::get_link($chapter->video->url,'chapter'); // get a link that expire in 1 hour
										?>
										<li>
											<i class="fa fa-remove remove_file" file-type="video_ids" file-id="{{$chapter->video->id}}" aria-hidden="true"></i>
											<img src="{{$thumb}}" v-url="{{$trailer_url}}" class="view_video" width="50" height="50">
										</li>
									@endif
								</ul>
							</div>
					</div>


					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Upload Document
							<small></small></label>
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
										<input type="file" name="document[]"  multiple="multiple">
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
									@if(count($chapter->document))
										@foreach($chapter->document as $doc)
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
							{!! Form::select('publish', $options, $chapter->publish ,  ['class' => 'form-control', ]) !!}
						</div>
					</div>

					<input type="hidden" name="thum_id" >
					<input type="hidden" name="video_ids" >
					<input type="hidden" name="document_ids" >
					<input type="hidden" name="trailer_id" >
					 <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
  active_nav_links(3,active_link);

  	$('#edit-chapter-form').bootstrapValidator({

        message: 'This filed is not valid',
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            description:{
            	validators: {
                    notEmpty: {
                        message: 'The course description is required and cannot be empty'
                    }
                }
            }
        }
    });
  
var that = null;

$("#edit-chapter-form input[type='hidden']").not( $( "#edit-chapter-form input[type='hidden']" )[ 0 ]).not( $( "#edit-chapter-form input[type='hidden']" )[ 1 ] ).val('');

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
    case 'trailer_id':
        trailer_id = image_id ;   
        $("input[name='trailer_id']").val(trailer_id);
        break;
    case 6:
        return false;
}
$(this).parent().remove();

});

});

</script>
@endsection