
   <main id="main" class="main-page  ">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">

        <div class="h1">
          <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif;margin-bottom:0" class="text-orange"><i class="fas fa-newspaper"></i> BERITA & KEGIATAN</h3>
          <hr style="border:4px solid orange;margin-bottom: 10px;margin-top:10px">
        </div>

        <div class="form-row">
          <?php  
          foreach ($data->result() as $row) { 
          ?>
          <div class="col-md-3">
            <div class="berita-box">
              <a href="<?= base_url() ?>berita/<?= $row->slug ?>"><img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" class="img-fluid"></a>
              <p class="service-heading mt-3" style="line-height:1.3;font-size:15px;margin-bottom:10px"><a href="<?= base_url() ?>berita/<?= $row->slug ?>" class="text-orange"><b><?= $row->judul ?></a></b></p>
                  
              <span class="tipe-post-berita">
                <a href="<?= base_url() ?>posttipe/<?= $row->posttype_slug ?>" class="kategori-badge podcast-badge"><i class="<?= $row->posttype_icon ?>"></i> <?= $row->post_type_name ?></a>
              </span>
              <?php 
              $programs = $row->programs;
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

              <p style="color: gray;font-size:12px;"><i class="fas fa-user"> </i> Admin, <span class="far fa-calendar-alt"></span> <?= $row->date_created ?></p>
              
              <p style="margin-top: -15px;line-height: 1.3;font-size:14px"><?=  limit_words($row->deskripsi, 20); ?></p>
            </div>
          </div>
          <?php 
          }
          ?>
        </div>
            <div class="float-right mt-3"><?php echo $pagination; ?></div>
      </div>

    </section>

  </main>
  <?php $this->load->view('home/_partial/publikasi_footer') ?>

