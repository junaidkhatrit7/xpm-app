@extends('Auth.layouts.app')

@section('title')

Login | XPM
    
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
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img style="width: 700px;" class="img-fluid login-img" src="./app-assets/images/gif/expense-img.png" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex w-px-400 col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
								<div class="mb-2 d-lg-flex align-items-center  justify-content-center">
									<img src="app-assets/images/logo/xpm-logo.png" width="150px">
								</div>
								
                                <p class="card-text text-center mb-2">sign-in</p>
                                <form class="auth-login-form mt-2" action="index.html" method="POST">
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">Email</label>
                                        <input class="form-control" id="login-email" type="text" name="login-email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Password</label><a href="page-auth-forgot-password-v2.html"><small>Forgot Password?</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="login-password" type="password" name="login-password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                                </form>
								<div class="my-5 small-footer small-font d-flex justify-content-center text-center">
										<span>
											<a href="#">Privacy Notice</a> 
										</span>
										<div class="bg-slate-200 w-px mx-3"></div>
										<span>
											<a href="#">Term of service</a>
										</span>
								</div>
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