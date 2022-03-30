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
                                    @canany(['owner'])
                                        <div class="float-end">
                                            <a class="btn btn-sm btn-outline-success" href="/admin/usaha/create">+
                                                TAMBAH</a>
                                            <a href="/admin/cetak-usaha/pdf" class="btn btn-sm btn-outline-info"><i
                                                    class="mdi mdi-printer"></i> Cetak
                                                Laporan</a>
                                        </div>
                                    @endcanany

                                    <h4 class="mt-0 header-title">Data Usaha</h4>
                                    <p class="text-muted font-14 mb-3">
                                        Olah data usaha Anda.
                                    </p>

                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    @canany(['admin', 'juruPajak'])
                                                        <th>Pemilik</th>
                                                    @endcanany
                                                    <th>Nama Usaha</th>
                                                    <th>Dokumen</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($UsahaRows) < 1)
                                                    <tr>
                                                        <td colspan="10" class="text-center">Data belum ada, silahkan
                                                            tambah
                                                            data</td>
                                                    </tr>
                                                @else
                                                    @foreach ($UsahaRows as $key => $r)
                                                        <tr>
                                                            <th class="align-middle" scope="row">{{ $key = $key + 1 }}
                                                            </th>
                                                            @canany(['admin', 'juruPajak'])
                                                                <td class="align-middle">{{ $r->nama }}</td>
                                                            @endcanany
                                                            <td class="align-middle">{{ $r->nama_usaha }}
                                                                <br>
                                                                <span class="badge bg-primary">
                                                                    Jenis Usaha: {{ $r->nama_jenis_usaha }}
                                                                </span>
                                                                <br>
                                                                <span class="badge bg-primary">
                                                                    NPWP: {{ $r->npwp }}
                                                                </span>
                                                                <br>
                                                                <span class="badge bg-secondary">
                                                                    Diinput: {{ $r->updated_at }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span style="font-size: 10px">
                                                                    <a href="{{ $r->surat_ijin_usaha }}">
                                                                        <i class="mdi mdi-file-pdf-outline"
                                                                            style="font-size: 25px;"></i> Ijin Usaha
                                                                    </a><br>
                                                                    <a href="{{ $r->surat_ijin_bpom }}">
                                                                        <i class="mdi mdi-file-pdf-outline"
                                                                            style="font-size: 25px;"></i> BPOM
                                                                    </a><br>
                                                                    @if ($r->sertifikat_halal != null)
                                                                        <a href="{{ $r->sertifikat_halal }}">
                                                                            <i class="mdi mdi-file-pdf-outline"
                                                                                style="font-size: 25px;"></i> Sert. Halal
                                                                        </a>
                                                                </span>
                                                    @endif
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <form action="/admin/usaha/{{ $r->usaha_id }}" method="post">
                                                            @canany(['owner', 'admin'])
                                                                <a href="/admin/usaha/{{ $r->usaha_id }}/edit"
                                                                    class="btn btn-sm btn-warning mb-2">
                                                                    <i class="mdi mdi-pencil"></i>
                                                                </a>
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" href="/admin/usaha/{{ $r->usaha_id }}"
                                                                    class="btn btn-sm btn-danger mb-2" class="d-inline">
                                                                    <i class="mdi mdi-delete"></i>
                                                                </button>
                                                                <br \>
                                                            @endcanany
                                                            <a href="/admin/omset/{{ $r->usaha_id }}"
                                                                class="btn btn-sm btn-info mb-2">
                                                                <i class="mdi mdi-chart-areaspline"></i> Omset
                                                            </a>
                                                            <br>
                                                            @canany(['juruPajak'])
                                                                <a href="/admin/riwayat-pajak/tambah/{{ $r->usaha_id }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="mdi mdi-cash"></i>+ Pajak
                                                                </a>
                                                            @endcanany
                                                        </form>
                                                    </td>
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
                    @endsection
