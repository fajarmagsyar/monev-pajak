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
                            <div class="float-end">
                                <a class="btn btn-sm btn-outline-success" href="/admin/jenis-usaha/tambah/data">+
                                    TAMBAH</a>
                                <a href="/admin/cetak/pdf" class="btn btn-sm btn-outline-info"><i
                                        class="mdi mdi-printer"></i> Cetak
                                    Laporan</a>
                            </div>
                            <h4 class="mt-0 header-title">Data Jenis Usaha</h4>
                            <p class="text-muted font-14 mb-3">
                                Olah data jenis usaha yang menjadi pilihan dalam menambahkan usaha baru.
                            </p>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Jenis Usaha</th>
                                            <th>Dibuat</th>
                                            <th>Terakhir Diubah</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($jenisUsahaRows) < 1) <tr>
                                            <td colspan="5" class="text-center">Data belum ada, silahkan tambah
                                                data</td>
                                            </tr>
                                            @else
                                            @foreach ($jenisUsahaRows as $key => $r)
                                            <tr>
                                                <th scope="row">{{ $key = $key + 1 }}</th>
                                                <td>{{ $r->nama_jenis_usaha }}</td>
                                                <td>{{ $r->created_at }}</td>
                                                <td>{{ $r->updated_at }}</td>
                                                <td class="text-center">
                                                    <form action="/admin/jenis-usaha/{{ $r->jenis_usaha_id }}"
                                                        method="post">
                                                        <a href="/admin/jenis-usaha/{{ $r->jenis_usaha_id }}/edit"
                                                            class="btn btn-sm btn-warning">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </a>
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            href="/admin/jenis-usaha/{{ $r->jenis_usaha_id }}"
                                                            class="btn btn-sm btn-danger" class="d-inline">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>

                <center>
                    {{ $jenisUsahaRows->links() }}
                </center>

            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->
    @endsection