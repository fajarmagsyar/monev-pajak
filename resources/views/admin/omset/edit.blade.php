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
                                <h4 class="header-title">Ubah Data Omset</h4>
                                <p class="text-muted font-14">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>

                                <form action="/admin/omset/{{ $omsetRow->omset_id }}" class="parsley-examples"
                                    id="form-valid-parsley" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nama Usaha
                                                    <span class="text-danger">*</span></label>
                                                <select name="usaha_id" class="form-select" id="">
                                                    @foreach ($usahaRows as $r)
                                                        <option value="{{ $r->usaha_id }}">{{ $r->nama_usaha }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Pajak</label>
                                                <input type="number" name="pajak" parsley-trigger="change" placeholder=""
                                                    value="{{ $omsetRow->pajak }}" class="form-control" id="pajak"
                                                    readonly />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">Nominal</label>
                                                <span class="text-danger">*</span>
                                                <input type="number" name="nominal" parsley-trigger="change" required
                                                    placeholder="Masukkan Nominal Penghasilan"
                                                    value="{{ $omsetRow->nominal }}" class="form-control"
                                                    id="nominal" />
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
        $(document).ready(function() {
            // $('form-valid-parsley').parsley();
            $('#nominal').on('keyup', function() {
                let nominal = $('#nominal').val();
                let pajak = nominal * 10 / 100;
                $('#pajak').val(pajak);
            });
        });
    </script>
@endsection
