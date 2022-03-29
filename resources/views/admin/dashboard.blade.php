@extends('layouts.main')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-1">Total Juru Pajak</h4>

                                <div class="widget-chart-1">
                                    <div class="float-start">
                                        <span style="font-size: 50px" class="text-primary"><i
                                                class="mdi mdi-badge-account"></i></span>
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{ $juruPajakCount }} </h2>
                                        <p class="text-muted mb-1">Akun</p>
                                    </div>

                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="77"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <span class="visually-hidden"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-1">Total Toko</h4>

                                <div class="widget-chart-1">
                                    <div class="float-start">
                                        <span style="font-size: 50px" class="text-success"><i
                                                class="mdi mdi-shopping"></i></span>
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{ $tokoCount }} </h2>
                                        <p class="text-muted mb-1">Toko</p>
                                    </div>

                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <span class="visually-hidden"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-1">Total Pemilik Usaha</h4>

                                <div class="widget-chart-1">
                                    <div class="float-start">
                                        <span style="font-size: 50px" class="text-warning"><i
                                                class="mdi mdi-account"></i></span>
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{ $usahaCount }} </h2>
                                        <p class="text-muted mb-1">Orang Pemilik Usaha</p>
                                    </div>

                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 100%;">
                                            <span class="visually-hidden"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-1">Total Pajak Terbayar</h4>

                                <div class="widget-chart-1">
                                    <div class="float-start">
                                        <span style="font-size: 50px" class="text-info"><i
                                                class="mdi mdi-cash"></i></span>
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{ $pajakTerbayarCount }} </h2>
                                        <p class="text-muted mb-1">Tagihan Pajak</p>
                                    </div>

                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 100%;">
                                            <span class="visually-hidden"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mb-3">Juru Pajak</h4>

                                <div class="inbox-widget">

                                    <div class="inbox-item">
                                        <a href="#">
                                            <div class="inbox-item-img"><img src="/assets/images/users/user-1.jpg"
                                                    class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author mt-0 mb-1">Yerobeam Kadja</h5>
                                            <p class="inbox-item-text">yerobeam@gmail.com</p>
                                            <p class="inbox-item-date">08213729232</p>
                                        </a>
                                    </div>

                                    <div class="inbox-item">
                                        <a href="#">
                                            <div class="inbox-item-img"><img src="/assets/images/users/user-2.jpg"
                                                    class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author mt-0 mb-1">Robertus Nahas</h5>
                                            <p class="inbox-item-text">bobetrjm@proton.com</p>
                                            <p class="inbox-item-date">08213729232</p>
                                        </a>
                                    </div>

                                    <div class="inbox-item">
                                        <a href="#">
                                            <div class="inbox-item-img"><img src="/assets/images/users/user-3.jpg"
                                                    class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author mt-0 mb-1">H. Intan Tameon</h5>
                                            <p class="inbox-item-text">intan@mail.com</p>
                                            <p class="inbox-item-date">08123081923</p>
                                        </a>
                                    </div>

                                    <div class="inbox-item">
                                        <a href="#">
                                            <div class="inbox-item-img"><img src="/assets/images/users/user-4.jpg"
                                                    class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author mt-0 mb-1">Fajar Magsyar</h5>
                                            <p class="inbox-item-text">magsyar@gmail.com</p>
                                            <p class="inbox-item-date">08123012323</p>
                                        </a>
                                    </div>

                                    <div class="inbox-item">
                                        <a href="#">
                                            <div class="inbox-item-img"><img src="/assets/images/users/user-5.jpg"
                                                    class="rounded-circle" alt=""></div>
                                            <h5 class="inbox-item-author mt-0 mb-1">Rahmatilah</h5>
                                            <p class="inbox-item-text">yesbruh@mail.com</p>
                                            <p class="inbox-item-date">081203129323</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- end col -->

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title mt-0 mb-3">Aktivitas Terbaru</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Usaha</th>
                                                <th>Total Pajak</th>
                                                <th>Dibayar Pada</th>
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
                                                        <td class="text-end">
                                                            Rp.{{ number_format($r->total_pajak) }}
                                                        </td>
                                                        <td><span class="badge bg-primary">{{ $r->created_at }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div><!-- end col -->

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->
    @endsection
