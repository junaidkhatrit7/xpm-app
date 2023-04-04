@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
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
                        @include('layouts.sidebar')
                        <div class="d-flex flex-column col-lg-9 align-items-center auth-bg px-2 p-lg-5">
                            @if (session()->has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="btn-container mb-2">
                                <a href="/expense/create" class="btn btn-primary ">
                                    Add Expense
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content-->
    @endsection
