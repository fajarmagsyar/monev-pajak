<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Users;
use App\Models\Usaha;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard()
    {
        return view('admin.dashboard', [
            'page' => 'Dashboard | Monev Pajak',
            'pageTitle' => 'Dashboard',
            'juruPajakCount' => Users::join('role', 'role.role_id', '=', 'users.role_id')->where('role.nama_role', 'Juru Pajak')->count(),
            'tokoCount' => Usaha::count(),
            'usahaCount' => Users::join('role', 'role.role_id', '=', 'users.role_id')->where('role.nama_role', 'Owner')->count(),
            'pajakTerbayarCount' => Transaksi::count(),
            'transaksiRows' => Transaksi::select(['transaksi.*', 'usaha.nama_usaha', 'usaha.usaha_id'])
                ->join('omset', 'omset.transaksi_id', '=', 'transaksi.transaksi_id')
                ->join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')
                ->groupBy('transaksi.transaksi_id')
                ->groupBy('usaha.usaha_id')
                ->orderBy('transaksi.created_at', 'DESC')
                ->paginate(10),
        ]);
    }
    function ownerDash()
    {
        return view('admin.owner-dash', [
            'page' => 'Dashboard | Monev Pajak',
            'pageTitle' => 'Dashboard',
            'juruPajakCount' => Users::join('role', 'role.role_id', '=', 'users.role_id')->where('role.nama_role', 'Juru Pajak')->count(),
            'tokoCount' => Usaha::count(),
            'usahaCount' => Users::join('role', 'role.role_id', '=', 'users.role_id')->where('role.nama_role', 'Owner')->count(),
            'transaksiRows' => Transaksi::select(['transaksi.*', 'usaha.nama_usaha', 'usaha.usaha_id', 'usaha.user_id'])
                ->join('omset', 'omset.transaksi_id', '=', 'transaksi.transaksi_id')
                ->join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')
                ->where('usaha.user_id', auth()->user()->user_id)
                ->groupBy('transaksi.transaksi_id')
                ->groupBy('usaha.usaha_id')
                ->orderBy('transaksi.created_at', 'DESC')
                ->get(),
        ]);
    }
    function loginForm()
    {
        return view('auth-login');
    }
}
