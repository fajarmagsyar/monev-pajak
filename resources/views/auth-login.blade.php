<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login - KOMODO | Komoditi Monev Pajak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- App css -->
    <link href="/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled="disabled" />
    <link href="/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled="disabled" />

    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center mb-4">
                        <a href="index.html">
                            <img src="/assets/images/logo-dark.png" alt="" height="80" class="mx-auto">
                        </a>
                    </div>
                    <div class="card shadow" style="border-radius: 25px">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h3 class="text-uppercase mt-0">Login</h3>
                            </div>

                            <form action="/auth" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email"
                                        required="" placeholder="Masukkan Email">
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <input class="form-control" type="password" required="" name="password"
                                        id="password" placeholder="Masukkan Kata Sandi">
                                </div>

                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                </div>
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="#" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Lupa password?</a>
                            </p>
                            <p class="text-muted">Belum ada akun?
                                <a href="#" class="text-dark ms-1"><b>Buat Akun</b></a>
                            </p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>

</body>

</html>
