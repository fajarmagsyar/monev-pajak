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
                                <form action="/admin/omset" class="parsley-examples" id="form-valid-parsley" method="post">
                                    @method('post')
                                    @csrf
                                    @if (count($usahaRows) < 1)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-danger">
                                                    <center>
                                                        <span>
                                                            <span style="font-size: 50px">
                                                                <i class="mdi mdi-alert"></i>
                                                            </span>
                                                            <br>
                                                            Anda belum mendaftarkan usaha. <br>
                                                            Segera <a href="/admin/usaha/create"><u>daftarkan</u></a>
                                                            usaha anda !
                                                        </span>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nama Usaha
                                                        <span class="text-danger">*</span></label>
                                                    <select name="usaha_id" class="form-select" id="usaha">
                                                        @foreach ($usahaRows as $r)
                                                            <option value="{{ $r->usaha_id }}"
                                                                data-ppn="{{ $r->ppn1 }}"
                                                                data-ppnn="{{ $r->ppn2 }}">
                                                                {{ $r->nama_usaha }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Total Pajak</label>
                                                    <input type="number" name="pajak" parsley-trigger="change"
                                                        placeholder="" class="form-control" id="pajak" readonly />
                                                    <p class="text-muted">*Total Pajak dihitung dari: (nominal omset x
                                                        ppn omset%) x ppn pajak%</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="userName" class="form-label">Nominal</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="number" name="nominal" parsley-trigger="change" required
                                                        placeholder="Masukkan Nominal Penghasilan" class="form-control"
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
                            @endif

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
                let pajak1 = nominal * $('#usaha option:selected').attr('data-ppn') / 100;
                let pajak2 = pajak1 * $('#usaha option:selected').attr('data-ppnn') / 100;
                // console.log($('#usaha option:selected').attr('data-ppn'));
                $('#pajak').val(pajak2);
            });
        });
    </script>
@endsection
