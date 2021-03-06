@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('public/vendor/jquery-ui/jquery-ui.css')}}" />
  <link rel="stylesheet" href="{{ asset('public/vendor/jquery-ui/jquery-ui.theme.css')}}" />
  <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
  <link rel="stylesheet" href="{{ asset('public/vendor/morris/morris.css')}}" />
  <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
   <style type="text/css">
        .invalid-feedback{
            display: block !important;
        }
    </style>
@endsection

@section('content')
<section role="main" class="content-body">
          <header class="page-header">
            <h2> 
              <a href="{{url()->previous()}}" class=""> 
            <i class="fa fa-chevron-left"></i>Back
          </a></h2>
          
            <div class="right-wrapper text-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('/admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>
                <li><span>Pages</span></li>
                <li><span>User Profile</span></li>
              </ol>
          
              <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>

          <!-- start: page -->
           <?php 
            $img = (!empty($user->avtar)) ? 'avatar/'.$user->avtar :'!logged-user.jpg';
            ?>


          <div class="row">
            <!-- section one -->
            <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">

              <section class="card">
                <div class="card-body">
                  <div class="thumb-info mb-3">
                    <img src="{{url('public/images/'.$img)}}" class="rounded img-fluid" alt="John Doe">
                    <div class="thumb-info-title">
                      <span class="thumb-info-inner">{{$user->name}}</span>
                    </div>
                  </div>

                  <!--<div class="widget-toggle-expand mb-3">
                    <div class="widget-header">
                      <h5 class="mb-2">Profile Completion</h5>
                      <div class="widget-toggle">+</div>
                    </div>
                    <div class="widget-content-collapsed">
                      <div class="progress progress-xs light">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                          60%
                        </div>
                      </div>
                    </div>
                    <div class="widget-content-expanded">
                      <ul class="simple-todo-list mt-3">
                        <li class="completed">Update Profile Picture</li>
                        <li class="completed">Change Personal Information</li>
                        <li>Update Social Media</li>
                        <li>Follow Someone</li>
                      </ul>
                    </div>
                  </div>
                  -->
                  <hr class="dotted short">

                  <h5 class="mb-2 mt-3">Email</h5>
                  <p class="text-2">{{ $user->email }}</p>
                  <div class="clearfix">
                 <!--    <a class="text-uppercase text-muted float-right" href="#">(View All)</a> -->
                  </div>

                  <hr class="dotted short">

                </div>
              </section>
            </div>
            <!-- section one -->

            <!-- section two -->
            <div class="col-lg-8 col-xl-6">

              <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                  <li class="nav-item active">
                    <a class="nav-link" href="#overview" data-toggle="tab">Overview</a>
                  </li>
                 <!-- <li class="nav-item">
                    <a class="nav-link" href="#edit" data-toggle="tab">Edit</a>
                  </li> -->
                </ul>
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">

                    <form class="p-3" method="POST" action="{{ action('UserController@update',['id'=>$user->id]) }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                      <h4 class="mb-3">Personal Information</h4>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">First Name</label>
                          <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First Name" name="first_name" value="{{$user->first_name}}"   autofocus>
                          @if ($errors->has('first_name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('first_name') }}</strong>
                              </span>
                          @endif

                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Last Name</label>
                          <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"  placeholder="Last Name" name="last_name" value="{{$user->last_name}}"   >
                          @if ($errors->has('last_name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('last_name') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputPassword4">Email</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email"name="email" value="{{$user->email}}"  >
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>
                      
                      <div class="form-group">
                          <label>Profile Image</label>
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="input-append">
                                      <div class="uneditable-input">
                                          <i class="fa fa-file fileupload-exists"></i>
                                          <span class="fileupload-preview"></span>
                                      </div>
                                      <span class="btn btn-default btn-file">
                                          <span class="fileupload-exists">Change</span>
                                          <span class="fileupload-new">Select file</span>
                                          <input type="file" name="image" />
                                      </span>
                                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                  </div>
                              </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-12 text-right mt-3">
                          <input type="submit" value="Update" class="btn btn-primary modal-confirm">
                        </div>
                      </div>
                      <input type="hidden" name="old_image" value="{{$user->image}}">
                       @method('PUT')
                       @csrf
                    </form>
                    <!-- end form -->
                      <hr class="dotted">

                    <form class="p-3" method="POST" action="{{ action('UserController@change_password') }}" id="change-password" >
                      @csrf
                      <h4 class="mb-3">Change Password</h4>

                      <div class="form-row">

                        <div class="form-group col-md-6">
                          <label for="inputPassword4">New Password</label>
                          <input id="password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>

                          @if ($errors->has('new_password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('new_password') }}</strong>
                              </span>
                          @endif

                        </div>


                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Confirm New Password</label>
                           <input id="password-confirm" type="password" class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" name="confirm_password" required>
                        </div>
                        @if ($errors->has('confirm_password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('confirm_password') }}</strong>
                              </span>
                          @endif
                      </div>

                      
                         

                      <input type="hidden" name="user_id" value="{{$user->id}}">

                      <div class="form-row">
                        <div class="col-md-12 text-right mt-3">
                          <button class="btn btn-primary modal-confirm">Change</button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
            <!-- section two -->

            <!-- section three -->
            <div class="col-xl-3">

              <h4 class="mb-3 mt-0">Active Plan(s) Stats</h4>

              <?php
               $buyed_plans = App\Helper::get_user_byed_course(false,$user->id);
               ?>

              <ul class="simple-card-list mb-3">
                @if(count($buyed_plans))
                  @foreach($buyed_plans as $plan)
                  <li class="primary">
                    <h3>{{$plan->course_name}}</h3>
                    <p class="text-light">{{ $plan->course_title }}</p>
                  </li>
                  @endforeach
                @else
                <li class="danger">
                    <h3>No Plan Buy Yet</h3>
                </li>
                @endif
              </ul>

            </div>
            <!-- section three -->
        
          </div>
          <!-- end: page -->
        </section>
@endsection

@section('script')
 <!-- Specific Page Vendor -->
 <script src="{{ asset('public/vendor/autosize/autosize.js')}}"></script>
        <script src="{{ asset('public/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
@endsection