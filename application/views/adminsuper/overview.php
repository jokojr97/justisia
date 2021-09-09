<?php $this->load->view('adminsuper/_partial/header'); ?>
      <div class="container-fluid">
          <div class="row">

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Penduduk</span>
                <span class="info-box-number"><?= $jumwarga ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-home"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rumah Tangga</span>
                <span class="info-box-number"><?= $jumrumahtangga ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rukun Warga (RW)</span>
                <span class="info-box-number"><?= $jumrw ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rukun Tetangga (RT)</span>
                <span class="info-box-number"><?= $jumrt ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <!-- /.col -->

          <!-- fix for small devices only -->

          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Jumlah Penduduk</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <div id="grafik1"></div>
                  </div>        
                  <div class="col-md-5">
                    <div id="grafik2"></div>                    
                  </div>        

                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  

                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!--/. container-fluid -->
<?php $this->load->view('adminsuper/_partial/footer') ?>
<?php $this->load->view('adminsuper/_partial/highchart') ?>
