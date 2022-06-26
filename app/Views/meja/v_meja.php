<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Meja</h1>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($meja as $i => $mj) : ?>
                                            <tr>
                                                <td><?= $i + 1; ?></td>
                                                <td class="text-center"><?= $mj['no_meja']; ?></td>
                                                <td class="text-center"><span class="badge bg-<?= ($mj['status_meja'] == 'Kosong') ? 'success' : 'danger'; ?>"><?= $mj['status_meja']; ?></span></td>
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