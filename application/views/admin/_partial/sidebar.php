  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link  bg-dark">
      <img src="<?= base_url() ?>assets/iconhead-pth.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8;margin-top: 5px">

      <span class="brand-text font-weight text-primary text-bold" style="font-size: 25px">JUSTISIA.NET</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()?>assets/avatar.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Justisia</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url() ?>admin" class="nav-link <?php  if($this->session->flashdata('menu') == "dashboard"){echo "active";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php  if($this->session->flashdata('menu') == "datadesa"){echo "active";} ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Provinsi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/data_provinsi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/import_data_prov') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/export_data_prov') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export Data</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php  if($this->session->flashdata('menu') == "datadesa"){echo "active";} ?>">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Data Kabupaten
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/data_desa') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/import_data') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/export_data') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export Data</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php  if($this->session->flashdata('menu') == "page"){echo "active";} ?>">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/page') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tambah_page') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Baru</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php  if($this->session->flashdata('menu') == "berita"){echo "active";} ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/berita') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tambah_berita') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tipe_post') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Post</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php  if($this->session->flashdata('menu') == "category"){echo "active";} ?>">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Categories & Tags
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/categories') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/tags') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('admin/aspirasi_publik') ?>" class="nav-link <?php if($this->session->flashdata('menu') == "aspirasi"){echo "active";} ?>">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Aspirasi Publik                
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('admin/profil') ?>" class="nav-link <?php if($this->session->flashdata('menu') == "profil"){echo "active";} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil Saya
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('admin/change_password') ?>" class="nav-link <?php if($this->session->flashdata('menu') == "password"){echo "active";} ?>">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Ganti Password
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link"  onclick="return confirm('Anda yakin ingin logout ?')">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                logout
              </p>
            </a>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
