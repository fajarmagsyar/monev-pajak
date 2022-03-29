<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('admin.dashboard', [
            'page' => 'Dashboard | Monev Pajak',
            'pageTitle' => 'Dashboard'
        ]);
    }
    function loginForm()
    {
        return view('auth-login');
    }
}
