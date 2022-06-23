<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Beranda</h1>
                    </div><!-- /.col -->
                    <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Beranda</li>
            </ol>
          </div>/.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row d-flex justify-content-center">


                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">

                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->


                </div>
                <!-- /.row -->

                <div class="col-4 d-flex justify-content-center">
                    <div class="card position-relative" style="width: 18rem;">
                        <img src="/assets/img/" class="card-img-top" alt="...">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-success text-md">
                                Baru
                            </div>
                        </div>
                        <div class="card-body text-center">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>