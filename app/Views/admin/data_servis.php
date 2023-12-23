<?= $this->extend('layout_admin/template'); ?>
<?= $this->section('content'); ?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('/frontend/img/logo2.png') ?>" alt="Selater">
</div>
<!-- Button trigger modal -->

<div class="flash" data-flash="<?= session()->getFlashdata('pesan'); ?>"></div>


<div class="container-fluid">

    <div class="card-header">
        <h3 class="card-title">
            <button type="button" class="btn btn-warning btn-sm"
                onclick="window.location='<?= site_url('/admin') ?>'">&laquo;
                Kembali</button>
        </h3>
    </div>

    <!-- Data Profile -->
    <h1 class="h3 mb-0 text-gray-800"> Tambah Data Servis</h1>
</div>
<div class="text-right">
    <a class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>
        Tambah Data</a>
</div>
<br>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa fa-"></i> Data Servis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Data Servis</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- /.card -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Servis</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Garansi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($servis as $value) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->nama_barang?></td>
                    <td><?= $value->harga ?></td>
                    <td><?= $value->tgl ?></td>
                    <td><?= $value->garansi ?></td>
                    <td><?= $value->status ?></td>


                </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="m-0 font-weight-bold text-light" id="modalTambah"><i
                        class="fa fa-pencil-square-o "></i>Tambah
                    Data Servis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/servis/simpan" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select class="form-control <?= validation_show_error('id_barang') ? 'is-invalid' : ''; ?>"
                            id="id_barang" name="id_barang" autofocus value="<?= old('id_barang'); ?>">
                            <option>- Pilih -</option>
                            <?php foreach ($barang as $key => $value) : ?>
                            <option value="<?=$value->id_barang; ?>"><?=$value->nama_barang;?> <?=$value->merk;?>
                                <?=$value->proc;?> - Seri :
                                <?=$value->seri;?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="username">Nama Teknisi</label>
                        <select class="form-control <?= validation_show_error('id_user') ? 'is-invalid' : ''; ?>"
                            id="id_user" name="id_user" autofocus value="<?= old('id_user'); ?>">
                            <option>- Pilih -</option>
                            <?php foreach ($servis as $key => $value) : ?>
                            <option value="<?=$value->id_user; ?>"><?=$value->username;?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('harga') ? 'is-invalid' : ''; ?>" id="harga"
                            name="harga" autofocus value="<?= old('harga'); ?>" value=0>
                        <div class="invalid-feedback">
                            <?= validation_show_error('harga'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="tgl">Tanggal</label>
                        <input type="date" class="form-control <?= validation_show_error('tgl') ? 'is-invalid' : ''; ?>"
                            id="tgl" name="tgl" autofocus value="<?= old('tgl'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('tgl'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="garansi">Garansi</label>
                        <input type="date"
                            class="form-control <?= validation_show_error('garansi') ? 'is-invalid' : ''; ?>"
                            id="garansi" name="garansi" autofocus value="<?= old('garansi'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('garansi'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control <?= validation_show_error('status') ? 'is-invalid' : ''; ?>"
                            id="status" name="status" autofocus value="<?= old('status'); ?>">
                            <option value="">- Pilih -</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>

                <button type="reset" class="btn btn-success"><i class="fas fa-undo"></i> Reset</a>
            </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>