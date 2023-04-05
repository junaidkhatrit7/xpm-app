@extends('Auth.layouts.app')

@section('title')

Email Verification | XPM
    
@endsection

@section('pagecss')
<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/authentication.css')}}">
<!-- END: Page CSS-->

@endsection

@section('content')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
						<!--<a class="brand-logo" href="javascript:void(0);">
                            <img src="app-assets/images/logo/xpm-logo.png" width="150px">
                        </a>-->
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img style="width: 700px;" class="img-fluid login-img" 
                                src="{{ asset ('/app-assets/images/svg/undraw_two_factor_authentication_namy.svg')}}" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex w-px-400 col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
								<div class="mb-2 d-lg-flex align-items-center  justify-content-center">
									<img src="{{ asset ('/app-assets/images/logo/xpm-logo.png')}}" width="150px">
								</div>

								<h3 class="mb-1 mt-4 text-center fw-bold">Two Step Verification</h3>
                                <p class="text-center ">
                                    We sent a verification code to your email. Enter the code from the email in the field below.
                                    <span class="fw-bold d-block">ja*********com</span>
                                </p>
                                <p class="mb-0 fw-semibold text-center">Type your 6 digit security code</p>
                                <form class="mt-2" action="index.html" method="POST">
                                    
                                    <div class="auth-input-wrapper d-flex align-items-center justify-content-between">
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autofocus="" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" />
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit" tabindex="4">Verify my account</button>
                                </form>
                                <p class="text-center mt-2"><span>Didn&rsquo;t get the code?</span><a href="Javascript:void(0)"><span>&nbsp;Resend</span></a></p>
								
                                <!--<div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>-->
                            </div>
							
                        </div>
						
					<!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @endsection

    @section('pagejs')

    <!-- BEGIN: Page JS-->
    
    <script src="{{asset ('./app-assets/js/scripts/pages/auth-two-steps.js')}}"></script>
    <!-- END: Page JS-->

    @endsection