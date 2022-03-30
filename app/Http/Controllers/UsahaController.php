<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;
use App\Models\JenisUsaha;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usaha.index', [
            'page' => 'Usaha | Monev Pajak',
            'pageTitle' => 'Usaha',
            'UsahaRows' => Usaha::orderBy('created_at', 'DESC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //  Tambah Data
    public function create()
    {
        return view('admin.usaha.create', [
            'page' => 'Tambah Usaha | Monev Pajak',
            'pageTitle' => 'Tambah Usaha',
            'JenisUsaha' => JenisUsaha::get(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = [
            'jenis_usaha_id' => $request->input('jenis_usaha_id'),
            'nama_usaha' => $request->input('nama_usaha'),
            'npwp_usaha' => $request->input('npwp_usaha'),
            'surat_ijin_usaha' => $request->input('surat_ijin_usaha'),
            'surat_ijin_bpom' => $request->input('surat_ijin_bpom'),
            'sertifikat_halal' => $request->input('sertifikat_halal'),
        ];

        Usaha::create($data);

        return redirect('/admin/usaha')->with('success', 'Data Berhasil Ditambahkan!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     return view('admin.jenis-usaha.edit', [
    //         'page' => 'Edit Jenis Usaha | Monev Pajak',
    //         'pageTitle' => 'Edit Jenis Usaha',
    //         'jenisUsahaRow' => Usaha::find($id)->first(),
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $data = [
    //         'nama_jenis_usaha' => $request->input('nama_jenis_usaha'),
    //     ];

    //     Usaha::find($id)
    //         ->update($data);

    //     return redirect('/admin/jenis-usaha')->with('success', 'Data Berhasil Diubah!');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     Usaha::find($id)
    //         ->delete();

    //     return redirect('/admin/jenis-usaha')->with('success', 'Data Berhasil Dihapus!');
    // }

    public function tambah()
    {
        
    }
}
