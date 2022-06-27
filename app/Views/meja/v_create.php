<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2 class="my-3">Form Tambah Data Meja</h2>
                    <form action="/meja/save" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="meja" class="col-sm-2 col-form-label">Meja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('meja')) ? 'is-invalid' : ''; ?>" id="meja" name="meja" autofocus value="<?= old('meja'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('meja'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>