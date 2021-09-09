<?php $this->load->view('admin/_partial/header'); ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $posttype ?></h3>
                <p>Tipe Post</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $category ?></h3>
                <p>Kategori</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $pages ?></h3>
                <p>Page</p>
              </div>
              <div class="icon">
                <i class="fas fa-th"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $post ?></h3>
                <p>Post</p>
              </div>
              <div class="icon">
                <i class="fas fa-copy"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div><!-- // row --> 
        <div class="row">
          <!-- col -->
          <div class="col-lg-6">
            <div class="border p-3 bg-white">
            <h4>Latest Post</h4>
            <hr style="border:2px solid orange">
            <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th style="width:30%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($latest->result() as $row){ ?>
                  <tr>
                    <td><?= $row->judul ?></td>
                    <td>
                      <center>
                      <a href="<?= base_url() ?>berita/<?= $row->slug ?>" class="btn btn-sm btn-success mt-1" target="_blank"><span class="fas fa-eye"></span></a>
                      <a href="<?= base_url() ?>admin/editberita/<?= $row->id_post ?>" class="btn btn-sm btn-primary mt-1" target="_blank">Edit</a>
                      <a href="#" class="btn btn-sm btn-danger mt-1" onclick="konfirmasi(<?= $row->id_post ?>)" id="hapus<?= $row->id_post ?>">Hapus</a>
                      </center>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            </div>
          </div><!-- //col -->
          <div class="col-lg-6">
            <div id="piechart1" class="border p-1"></div>
          </div><!-- //col -->
        </div><!-- // row -->
      </div><!--/. container-fluid -->
<?php $this->load->view('admin/_partial/footer') ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  
Highcharts.chart('piechart1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Category Post'
    },
    legend:{ 
      enabled:false 
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Jumlah Post',
        colorByPoint: true,
        data: [
      <?php foreach($kategori as $row){ ?>

        {
          name: '<?= $row['name'] ?>',
          y: <?= $row['jml_post'] ?>,
          sliced: false,
          selected: true
        }, 
        
      <?php } ?>
        ]
    }]
});
</script>

<script>
function konfirmasi(id){
  const konfirm = confirm("Apakah Anda yakin ingin menghapus Postingan ini?");
  if (konfirm == true){
    window.location.replace("<?= base_url() ?>admin/hapusberita/"+id);
  }
}
</script>