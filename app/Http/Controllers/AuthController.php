<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function varification(){
        return view('Auth.EmailVerification');
    }
}
