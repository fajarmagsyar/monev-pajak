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

                <div class="row">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <a class="btn btn-sm btn-outline-success" href="/admin/omset/tambah/data">+
                                        TAMBAH</a>

                                    <a href="/admin/cetak-omset/pdf" class="btn btn-sm btn-outline-info"><i
                                            class="mdi mdi-printer"></i> Cetak
                                        Laporan</a>
                                </div>

                                <h4 class="mt-0 header-title">Data Omset</h4>
                                <p class="text-muted font-14 mb-3">
                                    Olah data omset untuk melihat harga pajak.
                                </p>

                                @canany(['owner'])
                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <span>Filter :</span> <br>
                                        <select id="filterUsaha">
                                            <option value="semua">Semua</option>
                                            @foreach ($usahaRows as $r)
                                            <option value="{{ $r->usaha_id }}">{{ $r->nama_usaha }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endcanany
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Usaha</th>
                                                <th>Nominal</th>
                                                <th>Pajak</th>
                                                <th>Status</th>
                                                @canany(['owner'])
                                                <th></th>
                                                @endcanany
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($omsetRows) < 1) <tr>
                                                <td colspan="7" class="text-center">Data belum ada, silahkan tambah
                                                    data</td>
                                                </tr>
                                                @else
                                                @foreach ($omsetRows as $key => $r)
                                                <tr>
                                                    <th scope="row">{{ $key = $key + 1 }}</th>
                                                    <td>{{ $r->nama_usaha }}</td>
                                                    <td class="text-end">Rp.{{ number_format($r->nominal) }}
                                                    </td>
                                                    <td class="text-end">Rp.{{ number_format($r->pajak) }}</td>
                                                    <td>
                                                        <span class="badge bg-secondary">
                                                            {{ $r->created_at }}
                                                        </span>
                                                        <br>
                                                        @if ($r->transaksi_id != null)
                                                        <span class="badge bg-success">
                                                            Terbayar
                                                        </span>
                                                        @else
                                                        <span class="badge bg-danger">
                                                            Belum Terbayar
                                                        </span>
                                                        @endif
                                                    </td>
                                                    @canany(['owner'])
                                                    <td class="text-center">
                                                        @if ($r->transaksi_id == null)
                                                        <form action="/admin/omset/{{ $r->omset_id }}" method="post">
                                                            <a href="/admin/omset/{{ $r->omset_id }}/edit"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="mdi mdi-pencil"></i>
                                                            </a>
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" href="/admin/omset/{{ $r->omset_id }}"
                                                                class="btn btn-sm btn-danger" class="d-inline">
                                                                <i class="mdi mdi-delete"></i>
                                                            </button>
                                                        </form>
                                                        @endif
                                                    </td>
                                                    @endcanany
                                                </tr>
                                                @endforeach
                                                @endif
                                        </tbody>
                                    </table>
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