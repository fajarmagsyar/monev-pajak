<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.owner.index', [
            'page' => 'Owner | Monev Pajak',
            'pageTitle' => 'Owner',
            'userRows' => Users::orderBy('created_at', 'DESC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owner.create', [
            'page' => 'Owner | Monev Pajak',
            'pageTitle' => 'Tambah Owner',
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
            'no_identitas' => $request->input('no_identitas'),
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            'alamat' => $request->input('alamat'),
            'npwp' => $request->input('npwp'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'password' => Hash::make($request->input('password')),
        ];

        Users::create($data);

        return redirect('/admin/owner')->with('success', 'Data Berhasil Ditambahkan!');
    
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
        // dd(Users::find($id)->first());
        
        return view('admin.owner.edit', [
            'page' => 'Owner | Monev Pajak',
            'pageTitle' => 'Edit Owner',
            'userRow' => Users::where('user_id', $id)->first(),
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
            'no_identitas' => $request->input('no_identitas'),
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            'alamat' => $request->input('alamat'),
            'npwp' => $request->input('npwp'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'password' => Hash::make($request->input('password')),

        ];

        Users::find($id)
            ->update($data);

        return redirect('/admin/owner')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::find($id)
            ->delete();

        return redirect('/admin/owner')->with('success', 'Data Berhasil Dihapus!');
    }
}
