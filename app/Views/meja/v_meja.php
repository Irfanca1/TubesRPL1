<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Meja</h1>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Daftar Meja</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php if (is_pelayan()) : ?>
                    <a href="/Meja/create" class="btn btn-primary mt-3">Tambah Data Meja</a>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%">No</th>
                                            <th class="text-center" style="width: 40%">Nomor Meja</th>
                                            <th class="text-center" style="width: 40%">Status</th>
                                            <?php if (is_pelayan()) : ?>
                                                <th colspan="2" class="text-center" style="width: 40%">Aksi</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($meja as $i => $mj) : ?>
                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td class="text-center"><?= $mj['meja']; ?></td>
                                                <td class="text-center"><span class="badge bg-<?= ($mj['status_meja'] == 'Kosong') ? 'success' : 'danger'; ?>"><?= $mj['status_meja']; ?></span></td>
                                                <?php if (is_pelayan()) : ?>
                                                    <td>
                                                        <a href="<?= site_url('meja/delete/' . $mj['no_meja']); ?>" class=" btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>

<?= $this->endSection(); ?>