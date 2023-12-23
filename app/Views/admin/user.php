<?= $this->extend('layout_admin/template'); ?>
<?= $this->section('content'); ?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('/frontend/img/logo2.png') ?>" alt="Selater">
</div>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa fa-"></i> Data Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Data Karyawan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- /.card -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Alamat Karyawan</th>
                    <th>No HP Karyawan</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($user as $value) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value->nama_user ?></td>
                    <td><?= $value->jabatan ?></td>
                    <td><?= $value->alamat?></td>
                    <td><?= $value->no_hp ?></td>
                    <td><?= $value->picture ?></td>


                </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<?= $this->endSection(); ?>