<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Selater</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/adminlte/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Selater</b>SLT</a>
        </div>

        <div class="card">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Periksa From!</h4>
                <?php echo session()->getFlashdata('error'); ?>
            </div>

            <?php endif; ?>
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register akun baru</p>

                <form action="/register/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group has-feedback">
                        <input type="text"
                            class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                            id="username" name="username" autofocus value="<?= old('username'); ?>"
                            placeholder="Username">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <select type="text"
                            class="form-control form-control-user <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>"
                            id="level" placeholder="Sebagai...." name="level" value="<?= old('level') ?>" required>
                            <option value="">-Sebagai-</option>
                            <option value="admin">Admin</option>
                            <option value="dokter">Dokter</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('level'); ?>
                        </div>

                    </div>

                    <div class="form-group has-feedback">
                        <input type="password"
                            class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                            id="pasword" name="password" autofocus value="<?= old('password'); ?>"
                            placeholder="password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control form-control-user" id="repassword"
                            placeholder="Repeat Password" name="repassword" required>

                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text"
                            class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                            id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>" placeholder="alamat">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text"
                            class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp"
                            name="no_hp" autofocus value="<?= old('no_hp'); ?>" placeholder="no_hp">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_hp'); ?>
                        </div>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">

                        <label for="exampleFormControlFile1">Pilih gambar untuk profil</label>
                        <input type="file"
                            class="form-control-file <?= ($validation->hasError('picture')) ? 'is-invalid' : ''; ?>"
                            id="exampleFormControlFile1" style="color : blue" id="picture" placeholder="picture"
                            name="picture" value="<?= old('picture') ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('picture'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <a href="/login" class="btn btn-danger btn-block">Kembali</a>
                        </div>
                        <div class="col-4"></div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>