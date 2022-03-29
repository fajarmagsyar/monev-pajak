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
                                <h4 class="header-title">Ubah Data Usaha</h4>
                                <p class="text-muted font-14">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>

                                <form action="/admin/usaha/{{ $UsahaRow->usaha_id }}"
                                    class="parsley-examples" id="form-valid-parsley" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_usaha" class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_usaha" class="form-control"
                                            value="{{old('nama_usaha',$UsahaRow->nama_usaha)}}" id="nama_usaha" aria-describedby="nama_usaha" name="nama_usaha">
                                    </div>
                                    <div class="mb-3">
                                        <label for="npwp_usaha" class="form-label">NPWP Usaha <span class="text-danger">*</span></label>
                                        <input type="text" name="npwp_usaha" class="form-control"
                                            value="{{old('npwp_usaha',$UsahaRow->npwp_usaha)}}" id="npwp_usaha" aria-describedby="npwp_usaha" name="nama_usaha">
                                    </div>
                                    <label for="surat_ijin_usaha" class="form-label">Surat Ijin Usaha (Format PDF, Maksimal 1 MB) <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control"
                                            value="{{old('surat_ijin_usaha')}}" id="surat_ijin_usaha" name="surat_ijin_usaha">
                                        <label class="input-group-text" for="surat_ijin_usaha">Upload</label>
                                    </div>
                                        <label for="surat_ijin_bpom" class="form-label">Surat Ijin BPOM (Format PDF, Maksimal 1 MB) <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control"
                                            value="{{old('surat_ijin_bpom')}}" id="surat_ijin_bpom" name="surat_ijin_bpom">
                                        <label class="input-group-text" for="surat_ijin_bpom">Upload</label>
                                    </div>
                                        <label for="sertifikat_halal" class="form-label">Sertifikat Halal (Format PDF, Maksimal 1 MB) <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control"
                                            value="{{old('sertifikat_halal')}}" id="sertifikat_halal" name="sertifikat_halal">
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
