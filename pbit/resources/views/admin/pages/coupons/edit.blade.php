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
</style>
@endsection


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
            <li><span>Add Topics</span></li>
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
				<h2 class="card-title">Edit Coupon</h2>
			</header>
			<div class="card-body">
				<form class="form-horizontal form-bordered" id="edit-coupon-form" action="{{ action('CouponController@update',['id'=>$coupon->id])}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Promotion Code *</label>
						<div class="col-lg-6">
							<input type="text" class="form-control{{ $errors->has('promotion_code') ? ' is-invalid' : '' }}" name="promotion_code" value="{{ $coupon->promotion_code }}">
							@if ($errors->has('promotion_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('promotion_code') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Type *</label>
						<div class="col-lg-3">
							<?php
							 $type_options = [ 
							 	              'fixed_amount' => 'Fixed Amount',
							 	              'percentage' => 'Percentage'
						                      ];
						    ?>
							{!! Form::select('type', $type_options, $coupon->type, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Value *</label>
						<div class="col-lg-3">
							<input type="number" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="value" min="1" value="{{$coupon->value or '1' }}" >
							@if ($errors->has('value'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('value') }}</strong>
                                </span>
                            @endif
						</div>
					</div>
                    
					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Apply To *</label>
						<div class="col-lg-6">
						    <?php $val = explode(',',$coupon->apply_on); ?>
							{!! Form::select('apply_on[]', $courses, $val, ['class' => 'form-control', 'multiple' => 'multiple' ]) !!}
							@if ($errors->has('apply_on'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apply_on') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Start Date </label>
						<div class="col-lg-3">
							<input type="date" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ ($coupon->start_date)?date('Y-m-d', strtotime($coupon->start_date)):'' }}" >
							@if ($errors->has('start_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Expiry Date </label>
						<div class="col-lg-3">
							<input type="date" class="form-control{{ $errors->has('expiry_date') ? ' is-invalid' : '' }}" name="expiry_date" value="{{ ($coupon->expiry_date)?date('Y-m-d', strtotime($coupon->expiry_date)):'' }}" >
							@if ($errors->has('expiry_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('expiry_date') }}</strong>
                                </span>
                            @endif
						</div>
					</div>


					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Number of User *</label>
						<div class="col-lg-3">
							<input type="number" class="form-control{{ $errors->has('number_of_user') ? ' is-invalid' : '' }}" name="number_of_user" min="0" value="{{$coupon->number_of_user}}" >
							<label> (Enter 0 to allow unlimited uses) </label>
							@if ($errors->has('number_of_user'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('number_of_user') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText"> Max Usage * </label>
						<div class="col-lg-3">
							<input type="number" class="form-control{{ $errors->has('max_usage') ? ' is-invalid' : '' }}" name="max_usage" min="0" value="{{$coupon->max_usage}}" >
							@if ($errors->has('max_usage'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('max_usage') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2">Apply Options</label>
						<div class="col-lg-6">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="apply_once" value="1" {{($coupon->apply_once)?'checked=checked':''}} >
							Apply only once per order (Even if multiple items qualify)
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" n value="1"  name="existing_clients_only" {{($coupon->existing_clients_only)?'checked=checked':''}} > Apply only existing clients only.
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox"  value="1" name="new_signups_only"    {{($coupon->new_signups_only)?'checked=checked':''}}  > Apply to new signups only (must have no previous active orders)
								</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-lg-2 control-label text-lg-right pt-2" for="inputHelpText">Admin Note </label>
						<div class="col-lg-6">
							<textarea  class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note" min="0" >  {{ $coupon->note }}</textarea>
							@if ($errors->has('note'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('note') }}</strong>
                                </span>
                            @endif
						</div>
					</div>

					 <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
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
  var active_link = 0;
  active_nav_links(15,active_link);

  $(document).ready(function(){

  	$('#edit-coupon-form').bootstrapValidator({

        message: 'This filed is not valid',
        fields: {
            promotion_code: {
                validators: {
                    notEmpty: {
                        message: 'The promotion code is required and cannot be empty'
                    }
                }
            },
            value:{
            	validators: {
                    notEmpty: {
                        message: 'The value is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^\d*(\.\d{0,2})?$/,
                        message: 'This filed can only consist of numeric and float value.'
                    }
                }
            },
            'apply_on[]':{
            	validators: {
                    notEmpty: {
                        message: 'This filed is required, you can select multiple'
                    }
                }
            },
            chapter_id:{
            	validators: {
                    notEmpty: {
                        message: 'Please select chapter first'
                    }
                }
            },
            number_of_user: {
                message: 'This filed is not valid',
                validators: {
                    notEmpty: {
                        message: 'This filed is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This filed can only consist of alphabetical, dot and underscore'
                    }
                }
            },
            max_usage: {
                message: 'This filed is not valid',
                validators: {
                    notEmpty: {
                        message: 'This filed is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This filed can only consist of alphabetical, dot and underscore'
                    }
                }
            }
        }
    });

  });

</script>
@endsection