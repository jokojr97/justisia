  <main id="main" class="main-page  ">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2><?= $bidang_sekarang ?> Jawa Timur Tahun <?= $tahun_data ?></h2>
          <p>Justisia Institute</p>
        </div>
        <!-- <form method="POST" action="<?= base_url() ?>home/proses_cari">             -->
          <div class="row">
            <div class="col-sm-2 pt-2 pb-2" style="margin-right: -20px">
              <div class="input-group">              
                <select class="form-control bg-gray" name="tahun" onchange="thnfunction(this)" style="border:1px solid gray">
                  
                  <?php
                  $uri1 = $this->uri->segment(3);
                  if (!isset($uri1)) {
                    echo "<option>-- Pilih Tahun --</option>";
                  }  else {
                    echo  "<option>".$tahun_data."</option>";
                  }
                  $tahun = date(Y)-1;
                  for ($i=0; $i < 5; $i++) { 
                    echo "<option>".$tahun."</option>";
                    $tahun--;
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-9 pt-2 pb-2">
              <div class="input-group">              
                <select class="form-control bg-gray" name="bidang" onchange="myfunction(this)" style="border:1px solid gray">
                  <?php  
                  $uri2 = $this->uri->segment(4);
                  if (!isset($uri2)) {
                    echo "<option>-- Pilih Bidang --</option>";
                  }  else {
                    echo  "<option value=\"".$id_bidang_sekarang."\">".$bidang_sekarang."</option>";
                  }
                  foreach ($bidang->result() as $row) {
                    echo "<option value=\"".$row->id_bidang."\">".$row->nama_bidang."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- <div class="col-sm-5 pt-2 pb-2" style="margin-right: -13px">
              <div class="input-group">              
                <select class="form-control bg-gray" name="kategori" style="border:1px solid gray" id="kategori">
                  <?php    
                  $uri3 = $this->uri->segment(5);
                  if (!isset($uri3)) {
                    echo "<option>-- Pilih Kategori --</option>";
                  }  else {
                    echo  "<option value=\"".$id_kategori_sekarang."\">".$kategori_sekarang."</option>";
                  }
                  foreach ($kategori_list->result() as $row) {
                    echo "<option value=\"".$row->id_kategori_data."\">".$row->nama_kategori."</option>";
                  }
                  ?>
                </select>
              </div>
            </div> -->
            <div class="col-sm-1 pt-2 pb-2">              
              <a href="<?= base_url() ?>home/datajatim/2019/1/1" class="btn btn-outline-secondary float-right"><span class="fas fa-sync-alt"></span> Reset </a>
            </div>
          </div>
        <!-- </form> -->
        <div class="row">
          <div class="col">
            
          <?php  
          $jumlah = count($hasil);
          for ($i=0; $i < $jumlah; $i++) { 
          ?>

            <div id="accordion<?= $i ?>" class="mt-3">              
              <div class="card">
                <div class="card-header" id="headingOne" style="padding:0 3px;background-color: #ff4a1a">
                  <h5 class="mb-0">
                    <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>" style="text-transform: capitalize;">
                      <?= $kategori[$i] ?>
                    </button>
                  </h5>
                </div>
                <div id="collapse<?= $i ?>" class="collapse <?php if($i == 0) {echo "show";} ?>" aria-labelledby="headingOne" data-parent="#accordion<?= $i ?>">
                  <div class="card-body">
                    <div class="row">
                      
                    <div class="col-8 col-md-10">
                      <div class="border p-3 mt-3">
                        <!-- &nbsp<br><br><br><br><br><br><br><br> -->
                        <p style="margin-bottom: -3px">Eksport As: </p>
                        <a id="btnExcel<?= $i ?>" class="btn btn-sm btn-light border border-secondary mt-1">Excel</a>
                        <a id="btnCsv<?= $i ?>" class="btn btn-sm btn-light border border-secondary mt-1">CSV</a>
                        <a id="btnJpeg<?= $i ?>" class="btn btn-sm btn-light border border-secondary mt-1">JPG</a>
                        <a id="btnPng<?= $i ?>" class="btn btn-sm btn-light border border-secondary mt-1">PNG</a>
                        <a id="btnPdf<?= $i ?>" class="btn btn-sm btn-light border border-secondary mt-1">PDF</a>
                        <a id="btnSvg<?= $i ?>" class="btn btn-sm btn-light border border-secondary mt-1">SVG</a>
                        <div id="grafik<?= $i ?>" class="mt-2"></div>
                      </div>
                    </div>
                    <div class="col-4 col-md-2">
                      <!-- <div class="mt-3 pt-3">
                        <br>
                        <h3><b><?= $kategori_sekarang ?> Jawa Timur Tahun <?= $tahun_data ?></b></h3>
                        <hr>
                      </div> -->
                      <div style="overflow: scroll;height: 500px;" class="mt-3">  
                        <table class="table table-striped table-bordered mt-3 table-sm">
                          <tbody>
                            <?php
                            $no = 1;  
                            foreach ($kab->result() as $row) {
                            ?>
                            
                            <tr style="">
                              <td><a href="<?= base_url() ?>home/detailkab/2015/2019/<?= $row->kd_kab ?>/<?= $id_bidang_sekarang ?>/<?= $id_kategori[$i] ?>" target="_blank"><?= $row->nama_kab ?></a></td>
                              
                            </tr>  
                            <?php 
                            $no++;
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
          </div>


        </div>
      </div>

    </section>

  </main>
  <?php $this->load->view('home/_partial/publikasi_footer') ?>
  <?php $katbid = json_encode($kategori_bidang); //echo $jumlah_bidang[3]; 
  $tahun = $this->uri->segment(3);
  $bidangs = $this->uri->segment(4);
  // var_dump($hasil);
  ?>
<script type="text/javascript">
  var katbid = <?= $katbid ?>;
  console.log(katbid[2]);
  var jum1 = <?= $jumlah_bidang[1] ?>;
  var jum2 = <?= $jumlah_bidang[2] ?>;
  var jum3 = <?= $jumlah_bidang[3] ?>;
  var tahun = <?= $tahun ?>;
  var bidang = <?= $bidangs ?>;

  function myfunction(id){
    // console.log(id.value);
    var ids = id.value;
    window.location.replace("<?= base_url() ?>home/datajatim/"+tahun+"/"+ids+"");
    // console.log(dt);
    // const kat = document.querySelector('#kategori');
    // kat.innerHTML = dt;
  }
  function thnfunction(id){
    // console.log(id.value);
    var ids = id.value;
    window.location.replace("<?= base_url() ?>home/datajatim/"+ids+"/"+bidang+"");
  }

</script>