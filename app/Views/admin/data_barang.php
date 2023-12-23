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
    <h1 class="h3 mb-0 text-gray-800"> Tambah Data Barang</h1>
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
                <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa fa-"></i> Data Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Data Barang</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- /.card -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Processor</th>
                    <th>VGA</th>
                    <th>Seri</th>
                    <th>Warna</th>
                    <th>Hardisk</th>
                    <th>Memori</th>
                    <th>Kelengkapan</th>
                    <th>Kerusakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($barang as $value) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value->nama_barang ?></td>
                    <td><?= $value->merk?></td>
                    <td><?= $value->proc ?></td>
                    <td><?= $value->vga ?></td>
                    <td><?= $value->seri ?></td>
                    <td><?= $value->warna ?></td>
                    <td><?= $value->hardisk ?></td>
                    <td><?= $value->memori ?></td>
                    <td><?= $value->kelengkapan ?></td>
                    <td><?= $value->kerusakan ?></td>


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
                    Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/barang/simpan" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select class="form-control <?= validation_show_error('nama_barang') ? 'is-invalid' : ''; ?>"
                            id="nama_barang" name="nama_barang" autofocus value="<?= old('nama_barang'); ?>" required>
                            <option value="">- Pilih -</option>
                            <option value="Laptop">Laptop
                            </option>
                            <option value="Komputer">Komputer
                            </option>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for="merk">Merk</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('merk') ? 'is-invalid' : ''; ?>" id="merk"
                            name="merk" autofocus value="<?= old('merk'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('merk'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="proc">Processor</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('proc') ? 'is-invalid' : ''; ?>" id="proc"
                            name="proc" autofocus value="<?= old('proc'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('proc'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="vga">VGA</label>
                        <input type="text" class="form-control <?= validation_show_error('vga') ? 'is-invalid' : ''; ?>"
                            id="vga" name="vga" autofocus value="<?= old('vga'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('vga'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="seri">Seri</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('seri') ? 'is-invalid' : ''; ?>" id="seri"
                            name="seri" autofocus value="<?= old('seri'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('seri'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="warna">Warna</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('warna') ? 'is-invalid' : ''; ?>" id="warna"
                            name="warna" autofocus value="<?= old('warna'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('warna'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="hardisk">Hardisk</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('hardisk') ? 'is-invalid' : ''; ?>"
                            id="hardisk" name="hardisk" autofocus value="<?= old('hardisk'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('hardisk'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="memori">Memori</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('memori') ? 'is-invalid' : ''; ?>" id="memori"
                            name="memori" autofocus value="<?= old('memori'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('memori'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="kelengkapan">Kelengkapan</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('kelengkapan') ? 'is-invalid' : ''; ?>"
                            id="kelengkapan" name="kelengkapan" autofocus value="<?= old('kelengkapan'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('kelengkapan'); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="kerusakan">Kerusakan</label>
                        <input type="text"
                            class="form-control <?= validation_show_error('kerusakan') ? 'is-invalid' : ''; ?>"
                            id="kerusakan" name="kerusakan" autofocus value="<?= old('kerusakan'); ?>" required>
                        <div class="invalid-feedback">
                            <?= validation_show_error('kerusakan'); ?>
                        </div>
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