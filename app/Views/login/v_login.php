<!DOCTYPE html>
<html lang="en">

<!-- Manggil Head -->
<?= $this->include('layout/head'); ?>

<body class="hold-transition login-page bg-dark">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1 class="text-dark"><b>Resto</b> Unikom</h1>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('Pesan')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Perhatian!</strong> <?= session()->getFlashdata('Pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <form action="/login/auth" method="POST">
                    <div class="input-group mb-4">
                        <input type="username" class="form-control" placeholder="Nama pengguna" name="username" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" placeholder="Kata sandi" name="password" required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- Manggil Javasript -->
    <?= $this->include('layout/javascript'); ?>

</body>

</html>