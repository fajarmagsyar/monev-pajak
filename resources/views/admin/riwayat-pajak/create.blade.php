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
                                <h3 class="header-title">Tambah Data Pajak - <span
                                        class="badge bg-primary">{{ $usahaRow->nama_usaha }}</span></h3>
                                <p class="text-muted font-14 mb-3">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>

                                <form action="/admin/riwayat-pajak/store" class="parsley-examples" id="form-valid-parsley"
                                    method="post">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" value="{{ $usahaRow->usaha_id }}" name="usaha_id">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="accordion" class="mb-3">
                                                    <div class="card mb-1">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="m-0">
                                                                <a class="text-dark" data-bs-toggle="collapse"
                                                                    href="#collapseOne" aria-expanded="true">
                                                                    <i class="mdi mdi-help-circle me-1 text-primary"></i>
                                                                    Klik untuk melihat detail pembayaran
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseOne" class="collapse"
                                                            aria-labelledby="headingOne" data-bs-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="table-dark">
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Nominal</th>
                                                                                <th>Pajak</th>
                                                                                <th>Dibuat</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $pajakTotal = 0;
                                                                            @endphp
                                                                            @foreach ($omsetRows as $key => $r)
                                                                                @php
                                                                                    $pajakTotal = $pajakTotal + $r->pajak;
                                                                                @endphp
                                                                                <tr>
                                                                                    <th scope="row">{{ $key = $key + 1 }}
                                                                                    </th>
                                                                                    <td>Rp.{{ number_format($r->nominal) }}
                                                                                    </td>
                                                                                    <td>Rp.{{ number_format($r->pajak) }}
                                                                                    </td>
                                                                                    <td>{{ $r->created_at }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <th scope="row" class="text-end"
                                                                                    colspan="2">Total Pajak
                                                                                </th>
                                                                                <th>Rp.{{ number_format($pajakTotal) }}
                                                                                </th>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end #accordions-->
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{ $pajakTotal }}" name="total_pajak">
                                        <div class="col-12 text-center">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Total Pajak</label>
                                                <h1>Rp.{{ number_format($pajakTotal) }}</h1>
                                                <p class="text-muted">*Pajak adalah 10% dari total omset atau
                                                    penghasilan bersih</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-success waves-effect waves-light" type="submit"
                                            onclick="return confirm('Apakah anda yakin data pajak tersebut telah benar?')"><i
                                                class="mdi mdi-cash"></i>
                                            Bayarkan Pajak</button>
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
