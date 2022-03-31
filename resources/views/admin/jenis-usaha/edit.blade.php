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
                                <h4 class="header-title">Ubah Data Jenis Usaha</h4>
                                <p class="text-muted font-14">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>

                                <form action="/admin/jenis-usaha/{{ $jenisUsahaRow->jenis_usaha_id }}"
                                    class="parsley-examples" id="form-valid-parsley" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Nama Jenis Usaha
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_jenis_usaha" parsley-trigger="change" required
                                            placeholder="Masukkan jenis usaha"
                                            value="{{ $jenisUsahaRow->nama_jenis_usaha }}" class="form-control"
                                            id="userName" />
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="userName" class="form-label">PPN (Omset)
                                                <span class="text-danger">*</span></label>

                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control"
                                                    placeholder="Masukkan jumlah potongan PPN (Omset)" aria-label="ppn1"
                                                    name="ppn1" aria-describedby="basic-addon1"
                                                    value="{{ $jenisUsahaRow->ppn1 }}">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="userName" class="form-label">PPN (Pajak Akhir)
                                                <span class="text-danger">*</span></label>

                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control"
                                                    placeholder="Masukkan jumlah potongan PPN (Pajak Akhir)"
                                                    aria-label="ppn2" aria-describedby="basic-addon1" name="ppn2"
                                                    value="{{ $jenisUsahaRow->ppn2 }}">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                            </div>
                                        </div>
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
