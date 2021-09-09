
      <!-- <div class="site-section-cover overlay inner-page bg-light" style="background-image: url('images/cargo_sea_big.jpg')" data-aos="fade"> -->
         
   <main id="main" class="main-page">


      <!-- Awal Service -->
      <div class="services" id="materi">
        <div class="container"> 
          <div class="row">
            <div class="col-md-8">
                   
            <h2 class="headtani" style="color: white"><b>Masalah Pertanian di Bojonegoro; Krisis Regenerasi dan Didominasi Petani Gurem</b></h2>    
            <p class="ptani" style="color: white">Mayoritas penduduk Kabupaten Bojonegoro bekerja di sektor pertanian. Berdasarkan datanya, terdapat 251.700 atau sekitar 60.5% rumah tangga yang bekerja di sektor usaha pertanian. Dari angka tersebut, sebanyak 174 ribu rumah tangga atau sekitar 69.2% berada dalam kategori ‘petani gurem’. Yakni rumah tangga pertanian yang hanya menguasai lahan kurang dari 0,50 hektar. </p>
            <p class="ptani" style="color: white">Para petani di Bojonegoro pun didominasi oleh kelompok dewasa dan usia lanjut. Bagi kalangan remaja, usaha setor pertanian kurang diminati.</p>
            <p style="font-size: 14px;color: white">- AW. Syaiful Huda -</p>
            </div>
          </div> 
        </div>
      </div>
      <!-- <p class="ml-2" style="font-size: 11px;">Photo By : Ravi Bachtiar</p> -->
      
    <section id="speakers-details" class="wow fadeIn" style="margin-top: -60px">
      <div class="container-fluid" style="padding-top:30px">
        <div class="container">
          <div class="row">
            <?php foreach($poster->result() as $hsl) { ?>
            <div class="col-md-4 p-2">
              <center><a href="<?= base_url()?>home/detail_poster/<?= $hsl->slug ?>"><img src="<?= base_url() ?>assets/poster/<?= $hsl->nama_file ?>" alt="<?= $hsl->title ?>" class="img-fluid"></a></center>
              <p style="color: gray;" class="mt-2 mb-1"><i class="fas fa-user"> </i> Admin, &nbsp;<span class="far fa-calendar-alt"></span> <?= $hsl->tanggal_upload ?></p>
              <b><a href="<?= base_url()?>home/detail_poster/<?= $hsl->slug ?>" style="color:black"><?= $hsl->title ?></a></b>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
      
    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn" style="margin-top: -60px">
      <div class="container-fluid" style="padding:30px">
        <div class="container">
          <div class="row">
            <div class="col-8">
              <h4 class=" text-orange pt-1 header11" style="text-transform: uppercase;">PETA DATA PERTANIAN JAWA TIMUR</h4>
            </div>
            <div class="col-4">                      
              <select class="form-control" style="border:1px solid gray;" onchange="regionfunction(this)">
                <option value="peta_pertanian">Peta Kabupaten/Kota</option>
                <option value="peta_desa_2020">Peta Desa</option>
                <!-- <option value="peta_kecamatan">Peta Kecamatan</option> -->
              </select>
            </div>   
            <!-- 
            <div class="col-4" style="margin-right: -15px">              
              <select class="form-control" style="border:1px solid gray;" onchange="myfunction(this)">
                <option value="peta_kecamatan">Peta Kecamatan</option>
                <option value="peta_kabupaten">Peta Kabupaten/Kota</option>
                <option value="peta_desa">Peta Desa</option>
              </select>
            </div>
            <div class="col-1">              
              <button style="padding:  5px 10px" onclick="reloadfunc()"><span class="fas fa-sync-alt"></span></button>
            </div> -->
          </div>
        </div>
      </div>
      <hr>

      <div class="container">
        <div class="row">
          <div class="col">
            <br>
            <div class="p-3 border">
              <embed src="https://bi.or.id/peta-pertanian/index.html" style="width: 100%; height: 520px; border: 0px;"></embed>              
            </div>
            <!-- <p><iframe style="width: 100%; height: 520px; border: 0px;" src="https://bi.or.id/kab/" width="300" height="150"></iframe></p> -->
          </div>
        </div>
        <div class="row mt-3">          
          <div class="col">            
            <div id="accordion">              
              <div class="card">
                <div class="card-header" id="headingOne">
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
  function regionfunction(id){
    var idss = id.value;
    window.location.replace("<?= base_url() ?>"+idss+""); 
  }
</script>