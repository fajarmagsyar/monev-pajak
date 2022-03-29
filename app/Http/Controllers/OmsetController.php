<?php

namespace App\Http\Controllers;

use App\Models\Omset;
use Illuminate\Http\Request;
use App\Models\Usaha;

class OmsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.omset.index', [
            'page' => 'Omset | Monev Pajak',
            'pageTitle' => 'Omset',
            'omsetRows' => Omset::join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')->orderBy('usaha.created_at', 'DESC')->paginate(10),
            'usahaRows' => Usaha::where('user_id', auth()->user()->user_id)->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.omset.create', [
            'page' => 'Tambah Omset | Monev Pajak',
            'pageTitle' => 'Tambah Omset',
            'usahaRows' => Usaha::where('user_id', auth()->user()->user_id)->get(),
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
            'usaha_id' => $request->input('usaha_id'),
            'nominal' => $request->input('nominal'),
            'pajak' => $request->input('pajak'),
        ];


        Omset::create($data);

        return redirect('/admin/omset')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('admin.omset.index', [
            'page' => 'Omset | Monev Pajak',
            'pageTitle' => 'Omset',
            'omsetRows' => Omset::join('usaha', 'usaha.usaha_id', '=', 'omset.usaha_id')
                ->where('usaha.usaha_id', $id)
                ->orderBy('usaha.created_at', 'DESC')
                ->paginate(10),
            'usahaRows' => Usaha::get()
                ->where('user_id', auth()->user()->user_id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.omset.edit', [
            'page' => 'Edit Omset | Monev Pajak',
            'pageTitle' => 'Edit Omset',
            'omsetRow' => Omset::where('omset_id', $id)->first(),
            'usahaRows' => Usaha::get()->where('user_id', auth()->user()->user_id),
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
            'usaha_id' => $request->input('usaha_id'),
            'nominal' => $request->input('nominal'),
            'pajak' => $request->input('pajak'),
        ];

        Omset::find($id)
            ->update($data);

        return redirect('/admin/omset')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Omset::find($id)
            ->delete();

        return redirect('/admin/omset')->with('success', 'Data Berhasil Dihapus!');
    }
}
