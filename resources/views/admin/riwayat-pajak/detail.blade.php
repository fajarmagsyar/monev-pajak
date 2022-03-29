@extends('layouts.main')
@section('content')
@if (session()->has('success'))
<div class="toast-container" style="position: absolute; bottom: 80px; right: 10px; z-index: 999">
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-toggle="toast">
        <div class="toast-header">
            <img src="../assets/images/logo-sm.png" alt="brand-logo" height="12" class="me-1" />
            <strong class="me-auto">Monev Pajak</strong>
            <small>Sukses</small>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @canany(['juruPajak'])
                            <div class="float-end">
                                <a class="btn btn-sm btn-outline-success" href="/admin/riwayat-pajak/tambah">+
                                    TAMBAH</a>
                            </div>
                            @endcanany
                            <h4 class="mt-0 header-title">Data Riwayat Pajak</h4>
                            <!-- <div class="float-end">
                                <a href="/admin/detail-pajak/pdf" class="btn btn-sm btn-outline-info"><i
                                        class="mdi mdi-printer"></i> Cetak
                                    Laporan</a>
                            </div> -->
                            <p class="text-muted font-14 mb-3">
                                Riwayat transaksi pajak yang telah dibayarkan.
                            </p>

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
                                            <th scope="row" class="text-end" colspan="2">Total Pajak
                                            </th>
                                            <th>Rp.{{ number_format($pajakTotal) }}
                                            </th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <center>
                            {{ $transaksiRows->links() }}
                        </center>
                    </div>

                </div>


            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->
    <script>
    $('document').ready(function() {
        $('#filterUsaha').on('change', function() {
            if ($('#filterUsaha').val() == 'semua') {
                window.location.href = '/admin/omset/';
            } else {
                window.location.href = '/admin/omset/' + $('#filterUsaha').val();
            }
        });
    });
    </script>
    @endsection