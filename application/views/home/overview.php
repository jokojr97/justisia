  <!--==========================
    Intro Section
  ============================-->

    <?php 
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        $words = str_replace('</p>', '', $words);
        $words = str_replace('<p>', '', $words);
        return implode(" ",array_splice($words,0,$word_limit));
    }
    function limit_words2($string, $word_limit){
        $words = explode(" ",$string);
        $words = str_replace('</p>', '', $words);
        $words = str_replace('<p>', '', $words);
        return implode(" ",array_splice($words,6,$word_limit));
    }
    
    function make_slug($string) {
      $slug = strtolower($string);
      $slug = str_replace(" ","-",$slug);
      $slug = str_replace(";","",$slug);
      $slug = str_replace(",","",$slug);
      $slug = str_replace("?","",$slug);
      $slug = str_replace("!","",$slug);
      $slug = str_replace(".","",$slug);
      $slug = str_replace("'","",$slug);
      $slug = str_replace('"',"",$slug);
      $slug = str_replace('&',"",$slug);
      return $slug;
    }
    ?>
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Justisia institute <span>Initiative</span></h1>
      <p class="mb-4 pb-0" style="font-weight: normal;">Pusat Data serta Kajian Pengembangan Inovasi Kebijakan dan Strategi Penanggulangan Kemiskinan</p>
      </a>
      <!-- <a href="<?= base_url() ?>home/datajatim/2019/1/1" class="about-btn scrollto" target="_blank">Data Gender</a> -->
      <a href="<?= base_url() ?>data/gender" class="about-btn scrollto" target="_blank">Data Gender</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      Speakers Section
    ============================-->

    <section id="ttgAplikasi" class="wow fadeInUp mt-3 mb-3 p-3 bg-light">
      <div class="container mt-3">
        <a href="<?= base_url() ?>berita"><h2 class="judul"><strong>Berita dan Kegiatan</strong></h2></a>
        <hr class="hr-judul">
        <div class="form-row mt-2">   
          <?php foreach($berita_list->result() as $row) { ?>
            <div class="col-md-3">
              <div class="berita-box">
                <img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>">
                
                <span class="tipe-post-berita">
                  <a href="<?= base_url() ?>posttipe/<?= $row->posttype_slug ?>" class="kategori-badge podcast-badge"><i class="<?= $row->posttype_icon ?>"></i> <?= $row->post_type_name ?></a>
                </span>
                <p class="service-heading mt-3" style="line-height:1.3;font-size:15px;margin-bottom:10px"><a href="<?= base_url() ?><?= $row->posttype_slug ?>/<?= $row->slug ?>" class="text-orange"><b><?= $row->judul ?></a></b></p>
                
                <?php 
                $programs = $row->programs;
                if(isset($programs) && $programs != "") {
                  $key = explode(',', $programs);
                  foreach($key as $result) { 
                    $result = trim($result);
                    $result = ucfirst($result);
                    $slugs = make_slug($result);
                    $icon = $this->db->get_where('jsts_programs', ['slug' => $slugs])->row_array();
                    // var_dump($icon);
                    ?>
                  
                  <a href="<?= base_url() ?>fokus-programs/<?= $icon['slug'] ?>" class="btn btn-warning btn-sm kategori-badge"><i class="<?= $icon['icon'] ?>"></i> <?= $result ?></a>
                <?php
                  }
                }else {
                  echo "";
                }
                ?>

                <p style="color: gray;font-size:12px;"><i class="fas fa-user"> </i> Admin, <span class="far fa-calendar-alt"></span> <?= $row->date_created ?></p>
                
                <p style="margin-top: -20px;line-height: 1.3;font-size:14px"><?=  limit_words($row->deskripsi, 20); ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    
    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp mt-3 mb-3 p-3">
        
      </div>
    </section>

    <!--==========================
      Schedule Section
    ============================-->
    <section id="layanan" class="section " style="background-color:#f0f0f0">
      <div class="container wow fadeInUp mt-3 mb-3 p-3">
        <h2 class="judul"><strong>Fokus Program</strong></h2>
        <hr class="hr-judul">
        <div class="container mt-3">
          <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form-row text-center ">
                <?php foreach($programs_list->result() as $result) { ?>
                  <div class="col-md-3 col-6">
                  <div class="zoomss">
                    
                    <span class="fa-stack fa-3x ">
                      <a href="<?= base_url() ?>fokus-programs/<?= $result->slug ?>">
                        <i class="fas fa-circle fa-stack-2x text-orange shadows"></i>
                        <i class="<?= $result->icon ?> fa-stack-1x fa-inverse"></i>                
                      </a>
                    </span>
                    <h6 class="service-heading mt-2 text-orange"><strong><?= $result->name ?></strong></h6>
                  </div>
                    <!-- <p class="text-muted" style="font-size: 12px"><?= $result->deskripsi ?></p> -->
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        </div>

      </div>

    </section>


    <section id="layanan" class="section">
      <div class="container wow fadeInUp mt-3 mb-3 p-3">
        <h2 class="juduls"><a href="<?= base_url() ?>podcast/" style="color:black"><strong>PRC<span style="color:#ff4a1a">i</span> PODCAST</strong></a></h2>
        <hr class="hr-judul">
        <div class="container">
          
        <!--  Demos -->
        <section id="demo">
          <div class="form-row">
            <div class="large-12 columns">
              <div class="owl-carousel owl-carousel-podcast owl-theme">
                
                <?php foreach($podcasts->result() as $result) { ?>
                  <div class="p-1">
                    <div class="berita-box">
                      <img src="<?= base_url() ?>assets/images/<?= $result->featured_image ?>">
                      <span class="tipe-post-berita" style="left:15px;top:25px">
                        <a href="<?= base_url() ?>posttipe/<?= $result->posttype_slug ?>" class="kategori-badge podcast-badge"><i class="<?= $result->posttype_icon ?>"></i> <?= $result->post_type_name ?></a>
                      </span>
                      <p class="service-heading mt-3" style="line-height:1.3;font-size:15px;"><a href="<?= base_url() ?>podcast/<?= $result->slug ?>" class="text-orange"><b><?= $result->judul ?></a></b></p>
                      
                    <?php 
                    $programs = $result->programs;
                    if(isset($programs) && $programs != "") {
                      $key = explode(',', $programs);
                      foreach($key as $hasils) { 
                        $hasils = trim($hasils);
                        $hasils = ucfirst($hasils);
                        $slugs = make_slug($hasils);
                        $icon = $this->db->get_where('jsts_programs', ['slug' => $slugs])->row_array();
                        // var_dump($icon);
                        ?>
                      
                      <a href="<?= base_url() ?>fokus-programs/<?= $icon['slug'] ?>" class="btn btn-warning btn-sm kategori-badge podcast-badge"><i class="<?= $icon['icon'] ?>"></i> <?= $hasils ?></a>
                    <?php
                      }
                    }else {
                      echo "";
                    }
                    ?>

                      <p style="color: gray;margin-top: -10px;font-size:12px;"><i class="fas fa-user"> </i> Admin, <span class="far fa-calendar-alt"></span> <?= $result->date_created ?></p>
                      
                      <p style="margin-top: -20px;line-height: 1.3;font-size:14px"><?=  limit_words2($result->deskripsi, 20); ?></p>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <script>
                $(document).ready(function() {
                  var owl = $('.owl-carousel-podcast');
                  owl.owlCarousel({
                    items: 4,
                    loop: true,
                    responsiveClass: true,
                    responsive: {
                      0: {
                        items: 1,
                        nav: true
                      },
                      600: {
                        items: 2,
                        nav: false
                      },
                      1000: {
                        items: 4,
                        nav: true,
                        loop: true,
                      }
                    },
                    autoplay: true,
                    dots: false,
                    navText: "<>",
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true
                  });
                })
              </script>
            </div>
          </div>
        </section>

        </div>
      </div>
        </div>

      </div>

    </section>



    <!--==========================
      Contact Section
    ============================-->
  </main>
<?php $this->load->view('home/_partial/footer') ?>  