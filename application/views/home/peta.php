
   <main id="main" class="main-page  ">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">

        <div class="h1">
          <h1>Berita & Kegiatan</h1>
          <hr style="border:5px solid orange;margin-bottom: 30px">
        </div>

        <div class="row">
          <?php  
          foreach ($data->result() as $row) { 
          ?>

            <div class="col-md-3 col-sm-6">
              <img src="<?= base_url()  ?>assets/images/<?= $row->featured_image ?>" class="img img-fluid mb-2">
              <a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>" target="_blank"><b><?= $row->judul ?></b> </a>
              <p><?=  limit_words($row->deskripsi, 20); ?></p>
            </div>
          <?php 
          }
          ?>
        </div>
            <div class="float-right"><?php echo $pagination; ?></div>
      </div>

    </section>

  </main>
  <?php $this->load->view('home/_partial/publikasi_footer') ?>

