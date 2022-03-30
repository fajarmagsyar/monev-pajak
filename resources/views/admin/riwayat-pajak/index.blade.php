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
                                        {{-- <a class="btn btn-sm btn-outline-success" href="/admin/riwayat-pajak/tambah">+
                                            TAMBAH</a> --}}

                                        <a href="/admin/cetak-pajak/pdf" class="btn btn-sm btn-outline-info"><i
                                                class="mdi mdi-printer"></i> Cetak
                                            Laporan</a>
                                    </div>
                                @endcanany
                                <h4 class="mt-0 header-title">Data Riwayat Pajak</h4>


                                <p class="text-muted font-14 mb-3">
                                    Riwayat transaksi pajak yang telah dibayarkan.
                                </p>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Usaha</th>
                                                <th>Total Pajak</th>
                                                <th>Dibayar Pada</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($transaksiRows) < 1)
                                                <tr>
                                                    <td colspan="7" class="text-center">Data belum ada, silahkan tambah
                                                        data</td>
                                                </tr>
                                            @else
                                                @foreach ($transaksiRows as $key => $r)
                                                    <tr>
                                                        <th scope="row">{{ $key = $key + 1 }}</th>
                                                        <td>{{ $r->nama_usaha }}</td>
                                                        </td>
                                                        <td class="text-end">Rp.{{ number_format($r->total_pajak) }}
                                                        </td>
                                                        <td>{{ $r->created_at }}</td>
                                                        <td class="text-center">
                                                            <a href="/admin/riwayat-pajak/detail/{{ $r->transaksi_id }}/{{ $r->usaha_id }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="mdi mdi-eye"></i> Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
