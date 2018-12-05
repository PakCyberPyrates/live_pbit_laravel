<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
        <title>PBIT - Login </title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{ asset('public/vendor/animate/animate.css')}}">

		<link rel="stylesheet" href="{{ asset('public/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{ asset('public/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('public/css/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('public/css/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('public/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{ asset('public/vendor/modernizr/modernizr.js')}}"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<img src="{{ asset('public/img/logo.png')}}" height="75" alt="Porto Admin" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fa fa-user mr-1"></i> Sign In</h2>
					</div>
					<div class="card-body">
						<form action="{{ route('login') }}" method="post">
							@csrf
							<div class="form-group mb-3">
								<label>{{ __('E-Mail Address') }}</label>
								<div class="input-group input-group-icon">
									<input name="email" type="text" class="form-control form-control-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
								@if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group mb-3">
								<div class="clearfix">
									<label class="float-left">{{ __('Password') }}</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="pwd" type="password" class="form-control form-control-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
										<label for="RememberMe"> {{ __('Remember Me') }}</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary mt-2">Sign In</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright {{date('Y')}}. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{ asset('public/vendor/jquery/jquery.js')}}"></script>
		<script src="{{ asset('public/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{ asset('public/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{ asset('public/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{ asset('public/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{ asset('public/vendor/common/common.js')}}"></script>
		<script src="{{ asset('public/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{ asset('public/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
		<script src="{{ asset('public/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('public/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="{{ asset('public/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ asset('public/js/theme.init.js"></script>

	</body>
</html>