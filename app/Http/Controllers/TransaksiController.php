<?php

namespace App\Http\Controllers;

use App\Models\Omset;
use App\Models\Transaksi;
use App\Models\Usaha;
use App\Models\Users;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function riwayatPajak(Users $users)
    {
        // dd(Transaksi::join('omset', 'omset.omset_id', '=', 'transaksi.transaksi_id')->get());

        if ($users->hasRole('Owner')) {
            $transaksi = Transaksi::select(['transaksi.*', 'usaha.nama_usaha', 'usaha.usaha_id', 'usaha.user_id'])->join('omset', 'omset.transaksi_id', '=', 'transaksi.transaksi_id')->join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')->where('usaha.user_id', auth()->user()->user_id)->groupBy('transaksi.transaksi_id')->groupBy('usaha.usaha_id')->paginate(10);
        } else {
            $transaksi = Transaksi::select(['transaksi.*', 'usaha.nama_usaha', 'usaha.usaha_id'])->join('omset', 'omset.transaksi_id', '=', 'transaksi.transaksi_id')->join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')->groupBy('transaksi.transaksi_id')->groupBy('usaha.usaha_id')->paginate(10);
        }
        return view('admin.riwayat-pajak.index', [
            'page' => 'Riwayat Pajak | Monev Pajak',
            'pageTitle' => 'Riwayat Pajak',
            'transaksiRows' => $transaksi,
        ]);
    }
    public function paidPajakForm($id)
    {
        // dd(Transaksi::join('omset', 'omset.omset_id', '=', 'transaksi.transaksi_id')->get());
        return view('admin.riwayat-pajak.create', [
            'page' => 'Riwayat Pajak | Monev Pajak',
            'pageTitle' => 'Riwayat Pajak',
            'transaksiRows' => Transaksi::join('omset', 'omset.transaksi_id', '=', 'transaksi.transaksi_id')
                ->join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')
                ->paginate(10),
            'usahaRow' => Usaha::where('usaha_id', $id)->first(),
            'omsetRows' => Omset::where('usaha_id', $id)->whereNull('paid_at')->whereNull('transaksi_id')->get(),
        ]);
    }

    public function detailPajak($id, $usaha_id)
    {
        return view('admin.riwayat-pajak.detail', [
            'page' => 'Riwayat Pajak | Monev Pajak',
            'pageTitle' => 'Riwayat Pajak',
            'transaksiRows' => Transaksi::join('omset', 'omset.transaksi_id', '=', 'transaksi.transaksi_id')
                ->join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')
                ->paginate(10),
            'usahaRow' => Usaha::where('usaha_id', $usaha_id)->first(),
            'omsetRows' => Omset::where('transaksi_id', $id)->whereNotNull('paid_at')->whereNotNull('transaksi_id')->get(),
        ]);
    }
    public function paidPajak(Request $request)
    {
        $dataTransaksi = [
            'total_pajak' => $request->input('total_pajak'),
            'user_id' => auth()->user()->user_id,
        ];
        $transaksi = Transaksi::create($dataTransaksi)->getAttributes();
        $dataOmset = [
            'paid_at' => date('Y-m-d'),
            'transaksi_id' => $transaksi['transaksi_id'],
        ];

        Omset::whereNull('transaksi_id')->whereNull('paid_at')->where('usaha_id', $request->input('usaha_id'))->update($dataOmset);

        return redirect('/admin/riwayat-pajak')->with('success', 'Data Berhasil Ditambahkan!');
    }
}
