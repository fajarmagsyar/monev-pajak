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
                                <h4 class="header-title">Tambah Data Owner</h4>
                                <p class="text-muted font-14">
                                    Pastikan data yang telah anda input benar dan sesuai dengan format yang tertera.
                                </p>

                                <form action="/admin/owner" class="parsley-examples" id="form-valid-parsley" method="post">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" value="{{ $role }}" name="role">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">NIK
                                            <span class="text-danger">*</span></label>
                                        <input type="text" id="phone" onkeypress='return harusAngka(event)' maxlength="16"
                                            minlength="16" name="no_identitas" required placeholder="Masukkan NIK"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Nama Owner
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" parsley-trigger="change" required
                                            placeholder="Masukkan Nama" class="form-control" id="userName" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Jenis Kelamin
                                            <span class="text-danger">*</span></label>
                                        <select name="jk" id="" class="form-select">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Nomor Handphone
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="no_hp" onkeypress='return harusAngka(event)' maxlength="12"
                                            parsley-trigger="change" required placeholder="Masukkan Nomor Handphone"
                                            class="form-control" id="userName" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Alamat
                                            <span class="text-danger">*</span></label>
                                        <textarea placeholder="Masukan Alamat" name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">NPWP
                                            <span class="text-danger">*</span></label>
                                        <input type="text" onkeypress='return harusAngka(event)' maxlength="16" name="npwp"
                                            parsley-trigger="change" required placeholder="Masukkan NPWP"
                                            class="form-control" id="userName" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Email
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="email" parsley-trigger="change" required
                                            placeholder="Masukkan Email" class="form-control" id="userName" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Password
                                            <span class="text-danger">*</span></label>
                                        <input type="password" name="password" parsley-trigger="change" required
                                            placeholder="Masukkan Password" class="form-control" id="userName" />
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                                                class="mdi mdi-pencil-box"></i> Simpan</button>
                                        <button type="reset" class="btn btn-secondary waves-effect"><i
                                                class="mdi mdi-repeat"></i> Reset</button>
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
        $('form-valid-parsley').parsley();
    </script>
    <script>
        function harusAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 48 || charCode > 57) && charCode > 32)
                return false;
            return true;
        }
    </script>
@endsection
