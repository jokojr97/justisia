   <main id="main" class="main-page  ">

<!--==========================
  Speaker Details Section
============================-->
<section id="speakers-details" class="wow fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
          <h2><?= $poster['title'] ?></h2>
          <p style="color: gray;" class="mt-2 mb-1"><i class="fas fa-user"> </i> Admin, &nbsp;<span class="far fa-calendar-alt"></span> <?= $poster['tanggal_upload'] ?></p>
          <img src="<?= base_url() ?>assets/poster/<?= $poster['nama_file'] ?>" alt="<?= $poster['title'] ?>" class="img-fluid mt-3">
            <div class="mt-3">
                <p class="mb-0">Share Link:</p>                
                <hr>
                
                <?php 
                    $urls = base_url()."home/detail_poster/".$poster['slug'];
                    $url = urlencode($urls);
                ?>
                <div class="mt-3">
                    <a href="http://twitter.com/share?url=<?= $url ?>" class="twitter text-white mr-1 bg-info pl-3 pr-3 pt-2 pb-2" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>" class="facebook text-white mr-1 bg-primary pl-3 pr-3 pt-2 pb-2" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://api.whatsapp.com/send?text=<?= $url ?>" class="text-white mr-1 bg-success pl-3 pr-3 pt-2 pb-2"  data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
                <br><br>
            </div>
      </div>
      <div class="col-md-4">
        <h4>Berita Terbaru</h4>
        <hr style="border: 3px solid orange">
        <?php  
        $n = 0;
        foreach ($berita_list->result() as $row) {
          $judul = $row->judul;
          if ($n < 6) {
        ?>
          <div class="form-row">
            <div class="col-4">
              <img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" class="img img-fluid p-1" style="border:1px solid #e1e2e3">
            </div>
            <div class="col-8">
              <a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>" target="_blank" style="font-size: 14px" ><p style="line-height:1.3;margin-top:10px;"><?= $judul ?></p></a>
            </div>
          </div>   
        <?php            
          } 
            $n++;
        }
        ?>              
      </div>
    </div>
    <!-- <div class="float-right"><?php echo $pagination; ?></div> -->
  </div>

</section>

</main>
<?php $this->load->view('home/_partial/publikasi_footer') ?>

