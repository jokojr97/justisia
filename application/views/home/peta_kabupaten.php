
      <!-- <div class="site-section-cover overlay inner-page bg-light" style="background-image: url('images/cargo_sea_big.jpg')" data-aos="fade"> -->
         
    <main id="main" class="main-page">

      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url() ?>assets/home/img/slider3.jpg" alt="First slide">
          </div>
        </div>
      </div>
      <p class="ml-2" style="font-size: 11px;">Photo By : Ravi Bachtiar</p>
    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn" style="margin-top: -60px">
      <div class="container-fluid" style="padding:30px">
        <div class="container">
          <div class="row">
            <div class="col-7">
              <h4 class=" text-orange pt-1 header11">PETA DATA KABUPATEN/KOTA</h4>
            </div>
            <div class="col-4" style="margin-right: -15px">              
              <select class="form-control" style="border:1px solid gray;" onchange="myfunction(this)">
                <option value="peta_kabupaten">Peta Kabupaten/Kota</option>
                <option value="peta_kecamatan">Peta Kecamatan</option>
                <option value="peta_desa">Peta Desa</option>
              </select>
              <select class="form-control mt-2" style="border:1px solid gray;" onchange="kabfunction(this)">
              <?php  
              if ($kabupaten == "anggaran") {
              ?>
                <option value="anggaran">Data Anggaran</option>
                <option value="kemiskinan">Data Pembangunan</option>
              <?php   
              }else {
              ?>
                <option value="kemiskinan">Data Pembangunan</option>
                <option value="anggaran">Data Anggaran</option>
              <?php   
              }
              ?>
              </select>
            </div>
            <div class="col-1">              
              <button style="padding:  5px 10px" onclick="reloadfunc()"><span class="fas fa-sync-alt"></span></button>
            </div>
          </div>
        </div>
      </div>
      <hr>

      <div class="container">
        <div class="row">
          <div class="col">
            <br>
            <div class="p-3 border">
              <?php  
              if ($kabupaten == "anggaran") {
              ?>
              <embed src="https://bi.or.id/peta-anggaran/index.html" style="width: 100%; height: 520px; border: 0px;"></embed>
              <?php   
              }else {
              ?>
              <embed src="https://bi.or.id/kab/index.html" style="width: 100%; height: 520px; border: 0px;"></embed>
              <?php   
              }
              ?>
              
            </div>
            <!-- <p><iframe style="width: 100%; height: 520px; border: 0px;" src="https://bi.or.id/kab/" width="300" height="150"></iframe></p> -->
          </div>
        </div>
        <div class="row mt-3">          
          <div class="col">            
            <div id="accordion">              
              <div class="card">
                <div class="card-header bg-orange" id="headingOne">
                    <a style="padding: 1px" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Cara Menampilkan Peta
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <ol>
                      <li>Pastikan di komputer anda terinstall Flash Player versi 9.0.45 ke atas </li>
                      <li>Jika menggunakan browser google chrome pastikan pengaturan flash sudah aktif (aks first)</li>
                      <li>Jika pengaturan flash belum aktif maka bisa buka "setting->privacy and security->site setting->flash"</li>
                      <li>kemudian klik switch sampai menjadi ask first</li>
                      <li>Klik icon flash player untuk mengaktifkan flash player pada halaman ini</li>
                      <li>Jika muncul tombol Run flash klik Allow</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </div>

    </div>

    </section>

    

<script type="text/javascript">
  function myfunction(id){
    var idss = id.value;
    window.location.replace("<?= base_url() ?>"+idss+"");      
  }
  function reloadfunc(){
   window.location.replace("<?= base_url() ?>peta"); 
  }
  function kabfunction(id){
    var idss = id.value;
   window.location.replace("<?= base_url() ?>peta_kabupaten/"+idss+""); 
  }
</script>