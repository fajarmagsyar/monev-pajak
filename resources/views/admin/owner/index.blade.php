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
                                    <a class="btn btn-sm btn-outline-success"
                                        href="/admin/owner/create/{{ $role }}">+
                                        TAMBAH</a>
                                </div>
                                <h4 class="mt-0 header-title">Data Owner</h4>
                                <p class="text-muted font-14 mb-3">
                                    Olah data Owner yang menjadi pilihan dalam menambahkan usaha baru.
                                </p>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>NIK</th>
                                                <th>Nama Owner</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nomor Handphone</th>
                                                <th>Alamat</th>
                                                <th>NPWP Owner</th>
                                                <th>Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($userRows) < 1)
                                                <tr>
                                                    <td colspan="10" class="text-center">Data belum ada, silahkan tambah
                                                        data</td>
                                                </tr>
                                            @else
                                                @foreach ($userRows as $key => $r)
                                                    <tr>
                                                        <th scope="row">{{ $key = $key + 1 }}</th>
                                                        <td>{{ $r->no_identitas }}</td>
                                                        <td>{{ $r->nama }}</td>
                                                        <td>{{ $r->jk }}</td>
                                                        <td>{{ $r->no_hp }}</td>
                                                        <td>{{ $r->alamat }}</td>
                                                        <td>{{ $r->npwp }}</td>
                                                        <td>{{ $r->email }}</td>
                                                        <td class="text-center">
                                                            <form
                                                                action="/admin/owner/{{ $r->user_id }}/{{ $role }}"
                                                                method="post">
                                                                <a href="/admin/owner/{{ $r->user_id }}/{{ $role }}/edit"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="mdi mdi-pencil"></i>
                                                                </a>
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    class="d-inline">
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
                            <center>
                                {{ $userRows->links() }}
                            </center>
                        </div>

                    </div>


                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->
    @endsection
