<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('admin.dashboard', [
            'page' => 'Dashboard | Monev Pajak',
            'pageTitle' => 'Dashboard',
            'juruPajakCount' => Users::join('role', 'role.role_id', '=', 'users.role_id')->where('role.nama_role', 'Juru Pajak')->count(),
        ]);
    }
    function loginForm()
    {
        return view('auth-login');
    }
}
