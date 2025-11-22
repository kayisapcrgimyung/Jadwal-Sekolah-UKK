<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function showAdminLogin()
    {
        return view('welcome');
    }

    public function showUserLogin()
    {
        return view('login_user');
    }
}
