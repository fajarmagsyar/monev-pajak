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
                                <h4 class="header-title">Tambah Data Omset</h4>
                                <p class="text-muted font-14">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>

                                <form action="/admin/omset" class="parsley-examples" id="form-valid-parsley"
                                    method="post">
                                    @method('post')
                                    @csrf
                                    <!-- <div class="mb-3">
                                        <label for="userName" class="form-label">Nama Jenis Usaha
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_jenis_usaha" parsley-trigger="change" required
                                            placeholder="Masukkan jenis usaha" class="form-control" id="userName" />
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                                                class="mdi mdi-pencil-box"></i> Simpan</button>
                                        <button type="reset" class="btn btn-secondary waves-effect"><i
                                                class="mdi mdi-repeat"></i> Reset</button>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nama Usaha
                                                    <span class="text-danger">*</span></label>
                                                    <select name="usaha_id" class="form-select" id="">
                                                        @foreach($usahaRows as $r)
                                                        <option value="{{$r->usaha_id }}">{{$r->nama_usaha}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Nominal</label>
                                                <span class="text-danger">*</span>
                                                <input type="number" name="nominal" parsley-trigger="change" required
                                                placeholder="Masukkan Nominal Penghasilan" class="form-control" id="userName" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Pajak</label>
                                                <input type="number"  name="pajak" parsley-trigger="change"
                                                placeholder="" class="form-control" id=""  />
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
