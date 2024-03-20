<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $helpers = ['custom_helpers'];

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }
}
