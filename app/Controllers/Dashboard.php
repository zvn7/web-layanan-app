<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $helpers = ['custom_helpers'];

    public function index()
    {
        return view('dashboard/index');
    }

}
