  <!--==========================
    Intro Section
  ============================-->

    <?php 
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
    ?>
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Justisia institute <span>Initiative</span></h1>
      <p class="mb-4 pb-0" style="font-weight: normal;">Pusat Data Serta Kajian Pengembangan Inovasi Kebijakan dan Strategi Penanggulangan Kemiskinan</p>
      </a>
      <a href="<?= base_url() ?>home/datajatim/2019/1/1" class="about-btn scrollto" target="_blank">Data Gender</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      Speakers Section
    ============================-->

    <section id="ttgAplikasi" class="wow fadeInUp mt-3 mb-3 p-3 bg-light">
      <div class="container mt-3">
        <h2 class="judul"><strong>Berita dan Kegiatan</strong></h2>
        <hr width="30%" style="color:red;border:1px solid red">
        <div class="row">          
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

            <?php  

            $this->db->where('is_active', 1);
            $this->db->from('jsts_post');
            $jml = $this->db->count_all_results();
            $jml = $jml/4;
            for ($i=0; $i < $jml; $i++) { 
              if ($i == 0) {
            ?>
              <div class="carousel-item active">           
                <div class="row" class="mt-3">
                  <?php  
                  $no=0;
                  foreach ($berita_list->result() as $row) {

                    if ($no < 4) {
                  ?>
                  <div class="col-md-3 col-6">
                    <img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" class="img-fluid mb-2">
                    <b><a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>"><p style="line-height: 1.2"><?= $row->judul ?></p></a></b>
                    <p style="margin-top: -20px;line-height: 1.2"><?=  limit_words($row->deskripsi, 20); ?></p>
                  </div>  

                  <?php
                  $no++;
                    }
                  }
                  ?>  
                </div>
              </div>
            <?php
              }else {
            ?>
              <div class="carousel-item">          
                <div class="row" class="mt-3">
                  <?php 
                  $n=$no;
                  $ns = $n*($i+1);
                  $no=0;
                  foreach ($berita_list->result() as $row) {

                    if ($no >= $n && $no <$ns) {
                  ?>
                  <div class="col-md-3 col-6">
                    <img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" class="img-fluid mb-2">
                    <b><a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>"><p style="line-height: 1.2"><?= $row->judul ?></p></a></b>
                    <p style="margin-top: -20px;line-height: 1.2"><?=  limit_words($row->deskripsi, 20); ?></p>
                  </div>  

                  <?php
                    }
                  $no++;
                  }
                  ?>    
                </div>
              </div>
            <?php  
              }
            }
            ?>
            </div>
            <div class="container" style="margin-top: -10px">        
              <a class="btn btn-primary float-right m-1" href="#carouselExampleControls" role="button" data-slide="next"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
              <a class="btn btn-primary float-right m-1" href="#carouselExampleControls" role="button" data-slide="prev"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- 
    <section id="ttgAplikasi" class="wow fadeInUp mt-3 mb-3 p-3 bg-light">
      <div class="container mt-3">
        <div class="section-header">
          <h2>Tentang Kami</h2>
          <p>Justisia Institute</p>
        </div>

        <div class="row">
          <div class="row">
           <div class="col-md-7">
             <p style="font-size: 18px">Justisia Institute atau PRCI adalah sebuah organiasi masyarakat sipil atau Civil Society Organization (CSO) yang bergerak di bidang penelitian, advokasi yang berfokus pada sektor kemiskinan, gender dan pertanian di Kabupaten Bojonegoro, Provinsi Jawa Timur, dan Nasional</p>
             <p style="font-size: 18px">Di awal pendiriannya, lembaga ini diharapkan dapat menjadi wakil masyarakat sipil dalam mengawal regulasi/kebijakan  dan pembaharuan tata pemerintahan lokal yang lebih baik, berkelanjutan dan berbasis pada kebutuhan dan keberpihakan pada masyarakat. Dengan mewujudkan kerangka demokratisasi dan desentralisasi, guna menuju relasi antara negara dan masyarakat yang kuat dan bermakna, serta kehidupan masyarakat sipil yang tangguh, semarak, dinamis dan partisipatif <a href="#" class="text-red"><b>Read More>></b></a></p>

           </div>
           <div class="col-md-5">
             <img src="<?= base_url() ?>/assets/home/img/pengertian-sistem-orange.png" class="img-fluid">
           </div>
          </div>
        </div>
      </div>

    </section> -->

    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp mt-3 mb-3 p-3">
        
      </div>
    </section>

    <br>
    <br>
    <!--==========================
      Schedule Section
    ============================-->
    <section id="layanan" class="section ">
      <div class="container wow fadeInUp mt-3 mb-3 p-3">
        <h2 class="judul"><strong>Fokus Program</strong></h2>
        <hr width="30%" style="color:red;border:1px solid red">
        <div class="container">
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-6x">
              <a href="#" target="_blank">
                <i class="fas fa-circle fa-stack-2x text-orange"></i>
                <i class="fas fa-balance-scale-right fa-stack-1x fa-inverse"></i>                
              </a>
            </span>
            <h4 class="service-heading mt-3">Kemiskinan</h4>
            <p class="text-muted" style="font-size: 14px">Mendorong percepatan penanggulangan kemiskinan melalui pengembangan inovasi kebijakan dan program, penguatan strategi multidimensi, peningkatan kolaborasi dan sinergitas multipihak, serta tatakelola data kemiskinan berbasis teknologi informasi.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-6x">
              <a href="<?= base_url() ?>home/peta_pertanian" target="_blank">
                <i class="fas fa-circle fa-stack-2x text-orange"></i>
                <i class="fas fa-tractor fa-stack-1x fa-inverse"></i>
              </a>
            </span>
            <h4 class="service-heading mt-3">Pertanian</h4>
            <p class="text-muted" style="font-size: 14px">Mendorong pengembangan inovasi kebijakan dan program di sektor pertanian; melakukan edukasi dan kampanye pertanian pada kaum muda, serta pengembangan <em>integrated farming system</em> dan teknologi multiguna di kalangan komunitas/kelompok petani.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-6x">              
              <a href="<?= base_url() ?>home/gender" target="_blank">
                <i class="fas fa-circle fa-stack-2x text-orange"></i>
                <i class="fas fa-venus-mars fa-stack-1x fa-inverse"></i>
              </a>
            </span>
            <h4 class="service-heading mt-3">Gender</h4>
            <p class="text-muted" style="font-size: 14px">Mendorong pembangunan inklusif; responsif gerder melalui pengembangan inovasi kebijakan dan program, penguatan kolaborasi multipihak, serta peningkatan kapasitas dan partispasi kelompok marginal dalam agenda pembangunan daerah / nasional.</p>
          </div>
          <!-- <div class="col-md-3">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-orange"></i>
              <i class="fas fa-chart-bar fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading mt-3">Analisis Data</h4>
            <p class="text-muted">Menganalisis data terkait kemiskinan di bojonegoro atau jawa timur</p>
          </div> -->
        </div>
      </div>
        </div>

      </div>

    </section>




    <!--==========================
      Venue Section
    ============================--><!-- 
    <section id="publikasi" class="wow fadeInUp bg-light">

      <div class="container wow fadeInUp">

        <div class="section-header mt-3 mb-3 p-3">
          <h2>Berita & Kegiatan</h2>
          <p>Justisia Institute</p>
        </div>
        <div class="row">
          <?php  
          $no=1;
          foreach ($berita_list->result() as $row) {

            // $judul=substr($row->judul, 0, 50);
            $judul=$row->judul;
            if ($no <= 2) {
          ?>

          <div class="col-md-6 col-xs-6 p-2">
            <a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>">
              <img class="img-fluid img-brita" src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" alt="">
              <div class="back-brita1">
                &nbsp;                
              </div>
                <h6 class="p-3 text-white text-capitalize text-brita1"><?= $judul ?></h6>
            </a>
          </div> 
          <?php    
            }
            if ($no >= 3 && $no <=6) {
          ?>
         
          <div class="col-md-3 col-xs-6 p-2">
            <a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>">
              <img class="img-fluid img-brita" src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" alt="" style="opacity: 1">
              <div class="back-brita2">
                &nbsp;                
              </div>
                <p class="p-3 text-white text-capitalize text-brita2"><?= $judul ?></p>
            </a>
          </div> 
          <?php    
            }
            $no++;
          }
          ?>
        </div>
          <a href="<?= base_url() ?>home/berita" class="btn btn-orange float-right mt-1">Selengkapnya <span class="fas fa-arrow-right"></span></a>
          <br>

      </div>

      <br><br>
    </section>
 -->

    <!--==========================
      Contact Section
    ============================-->
  </main>
<?php $this->load->view('home/_partial/footer') ?>  