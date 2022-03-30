<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;
use App\Models\JenisUsaha;
use App\Models\Users;
use File;
use PDF;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Users $users)
    {
        if ($users->hasRole('Owner')) {
            $usaha = Usaha::join('users', 'users.user_id', '=', 'usaha.user_id')->join('jenis_usaha', 'usaha.jenis_usaha_id', '=', 'jenis_usaha.jenis_usaha_id')->where('users.user_id', '=', auth()->user()->user_id)->orderBy('usaha.created_at', 'DESC')->paginate(10);
        } else {
            $usaha = Usaha::join('users', 'users.user_id', '=', 'usaha.user_id')->join('jenis_usaha', 'usaha.jenis_usaha_id', '=', 'jenis_usaha.jenis_usaha_id')->orderBy('usaha.created_at', 'DESC')->paginate(10);
        }
        return view('admin.usaha.index', [
            'page' => 'Usaha | Monev Pajak',
            'pageTitle' => 'Usaha',
            'UsahaRows' => $usaha,
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
        // Upload Ijin Usaha
        $temp_ijin_usaha = $request->file('surat_ijin_usaha')->getPathName();
        $file_ijin_usaha = $request->input('nama_usaha') . "-Surat-Ijin-Usaha" . time();
        $folder_ijin_usaha = "unggah/ijin-usaha/" . $file_ijin_usaha . ".pdf";
        move_uploaded_file($temp_ijin_usaha, $folder_ijin_usaha);
        $name_ijin_usaha = '/unggah/ijin-usaha/' . $file_ijin_usaha . '.pdf';

        // Upload Ijin BPOM
        $temp_ijin_bpom = $request->file('surat_ijin_bpom')->getPathName();
        $file_ijin_bpom = $request->input('nama_usaha') . "-Surat-Ijin-BPOM" . time();
        $folder_ijin_bpom = "unggah/ijin-bpom/" . $file_ijin_bpom . ".pdf";
        move_uploaded_file($temp_ijin_bpom, $folder_ijin_bpom);
        $name_ijin_bpom = '/unggah/ijin-bpom/' . $file_ijin_bpom . '.pdf';

        // Upload Sertifikat Halal
        $name_sertifikat_halal = null;
        if ($request->file('sertifikat_halal')) {
            $temp_sertifikat_halal = $request->file('sertifikat_halal')->getPathName();
            $file_sertifikat_halal = $request->input('nama_usaha') . "-Sertifikat-Halal" . time();
            $folder_sertifikat_halal = "unggah/sertifikat-halal/" . $file_sertifikat_halal . ".pdf";
            move_uploaded_file($temp_sertifikat_halal, $folder_sertifikat_halal);
            $name_sertifikat_halal = '/unggah/sertifikat-halal/' . $file_sertifikat_halal . '.pdf';
        }

        $data = [
            'jenis_usaha_id' => $request->input('jenis_usaha_id'),
            'user_id' => $request->input('user_id'),
            'nama_usaha' => $request->input('nama_usaha'),
            'npwp_usaha' => $request->input('npwp_usaha'),
            'surat_ijin_usaha' => $name_ijin_usaha,
            'surat_ijin_bpom' => $name_ijin_bpom,
            'sertifikat_halal' => $name_sertifikat_halal,
        ];

        Usaha::create($data);

        return redirect('/admin/usaha')->with('success', 'Data Berhasil Ditambahkan!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Ubah
    public function edit($id)
    {
        // dd(Usaha::where('usaha_id',$id)->first());
        // dd(JenisUsaha::get());
        return view('admin.usaha.edit', [
            'page' => 'Edit Usaha | Monev Pajak',
            'pageTitle' => 'Edit Usaha',
            'UsahaRow' => Usaha::where('usaha_id', $id)->first(),
            'jenisUsahaRows' => JenisUsaha::get(),
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
        // $ijin_usaha = Usaha::find($request->input('usaha_id'));
        // $ijin_bpom = Usaha::find($request->input('usaha_id'));
        // $sertifikat_halal = Usaha::find($request->input('usaha_id'));
        $usaha = Usaha::where('usaha_id', $request->input('usaha_id'))->first();

        // dd($ijin_usaha);

        $path_ijin_usaha = $usaha['surat_ijin_usaha'];
        if ($request->file('surat_ijin_usaha')) {
            File::delete(public_path($path_ijin_usaha));
            $ext_ijin_usaha = $request->file('surat_ijin_usaha')->getClientOriginalExtension();
            $next_ijin_usaha = explode("/", $path_ijin_usaha);
            $newFile_ijin_usaha = end($next_ijin_usaha);
            $temp_ijin_usaha = $request->file('surat_ijin_usaha')->getPathName();
            $folder_ijin_usaha = "unggah/ijin-usaha/" . $newFile_ijin_usaha;
            move_uploaded_file($temp_ijin_usaha, $folder_ijin_usaha);
            $path_ijin_usaha = "/unggah/ijin-usaha/" . $newFile_ijin_usaha;
        }

        $path_ijin_bpom = $usaha['surat_ijin_bpom'];
        if ($request->file('surat_ijin_bpom')) {
            File::delete(public_path($path_ijin_bpom));
            $ext_ijin_bpom = $request->file('surat_ijin_bpom')->getClientOriginalExtension();
            $next_ijin_bpom = explode("/", $path_ijin_bpom);
            $newFile_ijin_bpom = end($next_ijin_bpom);
            $temp_ijin_bpom = $request->file('surat_ijin_bpom')->getPathName();
            $folder_ijin_bpom = "unggah/ijin-bpom/" . $newFile_ijin_bpom;
            move_uploaded_file($temp_ijin_bpom, $folder_ijin_bpom);
            $path_ijin_bpom = "/unggah/ijin-bpom/" . $newFile_ijin_bpom;
            // dd($path_ijin_bpom);
        }

        $path_sertifikat_halal = $usaha['sertifikat_halal'];
        if ($request->file('sertifikat_halal')) {
            File::delete(public_path($path_sertifikat_halal));
            $ext_sertifikat_halal = $request->file('sertifikat_halal')->getClientOriginalExtension();
            $next_sertifikat_halal = explode("/", $path_sertifikat_halal);
            $newFile_sertifikat_halal = end($next_sertifikat_halal);
            $temp_sertifikat_halal = $request->file('sertifikat_halal')->getPathName();
            $folder_sertifikat_halal = "unggah/sertifikat-halal/" . $newFile_sertifikat_halal;
            move_uploaded_file($temp_sertifikat_halal, $folder_sertifikat_halal);
            $path_sertifikat_halal = "/unggah/sertifikat-halal/" . $newFile_sertifikat_halal;
        }

        $data = [
            'jenis_usaha_id' => $request->input('jenis_usaha_id'),
            'nama_usaha' => $request->input('nama_usaha'),
            'npwp_usaha' => $request->input('npwp_usaha'),
            'surat_ijin_usaha' => $path_ijin_usaha,
            'surat_ijin_bpom' => $path_ijin_bpom,
            'sertifikat_halal' => $path_sertifikat_halal,
        ];

        Usaha::find($id)->update($data);

        return redirect('/admin/usaha')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Hapus
    public function destroy($id)
    {
        Usaha::find($id)
            ->delete();

        return redirect('/admin/usaha')->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetakPDFUsaha()
    {

        $rowsUsaha = Usaha::join('jenis_usaha', 'usaha.jenis_usaha_id', '=', 'jenis_usaha.jenis_usaha_id')->join('users', 'usaha.user_id', '=', 'users.user_id')->orderBy('usaha.created_at', 'DESC')->get();
        $pdf = PDF::loadview('template.pdf.usaha', ['rowsUsaha' => $rowsUsaha]);
        // return $pdf->download('riwayat-pendidikan-' . auth()->user()->nip . '-' . time() . '.pdf');
        return $pdf->stream('-usaha-' . '-' . time() . '.pdf', array('Attachment' => 0));
    }
}
