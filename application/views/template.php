<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sewa Mobil Ceria</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>index.php/Home">
      <!-- Logo rental gambar -->
          <img src="<?php echo base_url(); ?>assets/images/logorental.png" alt="logo" style = "width : 200px; height : 75px;"  />
        </a>
  
      </div>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><?php echo $this->session->userdata('username') ?></span>
              <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>assets/images/faces/user1.png" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="py-3 px-5 d-flex align-items-center justify-content-center border-left border-right">
                    <a href="<?php echo base_url(); ?>index.php/login/logout" class="mdi mdi-power" style="font-size: 30px;" title="Logout"></a>
                    </div>
              </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo base_url(); ?>assets/images/faces/user1.png" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $this->session->userdata('username') ?></p>
                  <div>
                    <small class="designation text-muted">Develop</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary btn-block"><a href="<?php echo base_url(); ?>index.php/User" style="text-decoration: none; color: white;">User
                <i class="mdi mdi-plus"></i>
                <a/>
              </button>
            </div>
          </li>
          <?php
              if($this->session->userdata('level') == 'admin'){
                ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Home">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Car</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>index.php/Mobil">Data Mobil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url() ?>index.php/Kat">Data Kategori Mobil</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
               <i class="menu-icon bi bi-bar-chart-line"></i>
              <span class="menu-title">Transacsion</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>index.php/Transaksi">Data Transaksi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('index.php/Transaksi/riwayat'); ?>">Data Riwayat Transaksi</a>
                </li>

                <?php
                } else {
                ?>

                 <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Home">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
                <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
               <i class="menu-icon mdi mdi-car"></i>
              <span class="menu-title">Transacsion</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>index.php/Transaksi">Data Transaksi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('index.php/Transaksi/riwayat'); ?>">Data Riwayat Transaksi</a>
                </li>
                  
              </ul>
            </div>
          </li>
          <?php
              }
            ?>
        </ul>
      </nav>
			<!-- MAIN CONTENT -->
			<?php
				$this->load->view($content_view);
			?>
			<!-- END MAIN CONTENT -->
      <!-- partial:partials/_footer.html -->
      <!-- <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
            <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
            <i class="mdi mdi-heart text-danger"></i>
          </span>
        </div>
      </footer> -->
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>

</html>
