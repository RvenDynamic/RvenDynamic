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
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="<?= base_url("/admin/barang") ?>">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_barang; ?></h3>
                            <p>Data barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="<?= base_url("/admin/servis") ?>">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_servis; ?></h3>
                            <p>Data Servis</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="<?= base_url("/admin/pelanggan") ?>">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah_pelanggan; ?></h3>
                            <p>Data Pelanggan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="<?= base_url("/admin/testimoni") ?>">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_testi; ?></h3>
                            <p>Testimoni</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="<?= base_url("/admin/user") ?>">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jumlah_user; ?></h3>
                            <p>Data Karyawan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection(); ?>