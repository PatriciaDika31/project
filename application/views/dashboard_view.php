
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
            </div>
          </div>
          <div class="panel-heading">
              <h3 class="panel-title">Dashboard Sewa Mobil</h3>
              <p type="date" class="panel-subtitle">Date : <?php echo date('D, d M Y') ?></p>
            </div>
          <div class="row">       
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Mobil</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><span class="number"><?php echo $jml_mobil->jml_mobil; ?></span></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Transaksi</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><span class="number"><?php echo $jml_transaksi->jml_transaksi; ?></span></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> 
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">User</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><span class="number"><?php echo $jml_user->jml_user; ?></span></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i>
                </div>
              </div>
            </div>

             <footer>
      <div class="container-fluid">
        <p class="copyright">&copy; 2022 <a href="https://www.themeineed.com" target="_blank">Platform</a>. All Rights Reserved.</p>
      </div>