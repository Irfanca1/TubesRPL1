  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link text-center">
          <!-- <img src="/assets/img/resto/cutlery.png" alt="Logo Resto UNIKOM" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
          <span class="brand-text font-weight-bold">Resto UNIKOM</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <?php if (is_koki()) : ?>
                      <img src="/assets/img/resto/koki.png" class="img-circle elevation-2" alt="Foto Koki">
                  <?php elseif (is_pelayan()) : ?>
                      <img src="/assets/img/resto/pelayan.png" class="img-circle elevation-2" alt="Foto Pelayan">
                  <?php elseif (is_kasir()) : ?>
                      <img src="/assets/img/resto/kasir.png" class="img-circle elevation-2" alt="Foto Kasir">
                  <?php endif; ?>
              </div>
              <div class="info">

              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                  <li class="nav-item text-light">
                      <i class="nav-icon fas fa-home text-light"></i>
                      Beranda
                      </a>
                  </li>


              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>