<?php

namespace App\Http\Controllers;

use App\Models\JenisUsaha;
use Illuminate\Http\Request;
use PDF;

class JenisUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenis-usaha.index', [
            'page' => 'Jenis Usaha | Monev Pajak',
            'pageTitle' => 'Jenis Usaha',
            'jenisUsahaRows' => JenisUsaha::orderBy('created_at', 'DESC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_jenis_usaha' => $request->input('nama_jenis_usaha'),
        ];

        JenisUsaha::create($data);

        return redirect('/admin/jenis-usaha')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.jenis-usaha.edit', [
            'page' => 'Edit Jenis Usaha | Monev Pajak',
            'pageTitle' => 'Edit Jenis Usaha',
            'jenisUsahaRow' => JenisUsaha::find($id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nama_jenis_usaha' => $request->input('nama_jenis_usaha'),
        ];

        JenisUsaha::find($id)
            ->update($data);

        return redirect('/admin/jenis-usaha')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisUsaha::find($id)
            ->delete();

        return redirect('/admin/jenis-usaha')->with('success', 'Data Berhasil Dihapus!');
    }

    public function tambah()
    {
        return view('admin.jenis-usaha.create', [
            'page' => 'Tambah Jenis Usaha | Monev Pajak',
            'pageTitle' => 'Tambah Jenis Usaha',
        ]);
    }
     public function cetakPDF()
    {
      
        $rowsJenisUsaha = JenisUsaha::select(['jenis_usaha.jenis_usaha_id', 'jenis_usaha.nama_jenis_usaha'])->get();
        $pdf = PDF::loadview('template.pdf.jenis-usaha', ['rowsJenisUsaha' => $rowsJenisUsaha]);
        // return $pdf->download('riwayat-pendidikan-' . auth()->user()->nip . '-' . time() . '.pdf');
        return $pdf->stream('jenis-usaha-' . '-' . time() . '.pdf', array('Attachment' => 0));
    }
}