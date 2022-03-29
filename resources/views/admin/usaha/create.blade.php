@extends('layouts.main')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">

                    <div class="col-sm-12">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Tambah Data Usaha</h4>
                                <p class="text-muted font-14">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>

                                <form action="/admin/usaha" class="parsley-examples" id="form-valid-parsley"
                                    method="post" enctype="multipart/form-data">
                                    @method('post')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Jenis Usaha
                                            <span class="text-danger">*</span></label>
                                        <select name="jenis_usaha_id" class="form-select" id="">
                                            @foreach($JenisUsaha as $r)
                                            <option value="{{$r->jenis_usaha_id}}">{{$r->nama_jenis_usaha}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Nama Usaha
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_usaha" parsley-trigger="change" required
                                            placeholder="Masukkan nama usaha" class="form-control" id="userName" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">NPWP Usaha
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="npwp_usaha" parsley-trigger="change" required
                                            placeholder="Masukkan npwp usaha" class="form-control" id="userName" />
                                    </div>
                                    <label for="surat_ijin_usaha" class="form-label">Surat Ijin Usaha (Format: PDF Maksimal 1Mb) 
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="surat_ijin_usaha" required
                                            class="form-control" value="{{old('surat_ijin_usaha')}}"
                                            id="surat_ijin_usaha" accept=".pdf" name="surat_ijin_usaha">
                                        <label class="input-group-text" for="surat_ijin_usaha">Upload</label>
                                    </div>
                                    <label for="surat_ijin_bpom" class="form-label">Surat Ijin BPOM (Format: PDF Maksimal 1Mb) 
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="surat_ijin_bpom" required
                                            class="form-control" value="{{old('surat_ijin_bpom')}}"
                                            id="surat_ijin_bpom" accept=".pdf" name="surat_ijin_bpom">
                                        <label class="input-group-text" for="surat_ijin_bpom">Upload</label>
                                    </div>
                                    <label for="sertifikat_halal" class="form-label">Sertifikat Halal (Format: PDF Maksimal 1Mb) 
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="sertifikat_halal" required
                                            class="form-control" value="{{old('sertifikat_halal')}}"
                                            id="sertifikat_halal" accept=".pdf" name="sertifikat_halal">
                                        <label class="input-group-text" for="sertifikat_halal">Upload</label>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                                                class="mdi mdi-pencil-box"></i> Simpan</button>
                                        <button type="reset" class="btn btn-secondary waves-effect"><i
                                                class="mdi mdi-repeat"></i> Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end card -->
                    </div>
                    <!-- end col -->

                </div> <!-- end card -->

            </div>

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

    </div> <!-- content -->

    <script>
        $('form-valid-parsley').parsley();
    </script>
@endsection
