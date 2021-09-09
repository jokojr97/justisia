   <!-- main -->
   <main id="main" class="main-page  ">
    <!--==========================
      Detail News Section
    ============================-->
    <!-- section -->
    <section id="speakers-details" class="wow fadeIn">
      <!-- div container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- col -->
          <div class="col-md-8">
            <!-- article -->
            <article>
              <div class="postdetail">
                <h3><?= $berita['judul'] ?></h3>
                <p style="color:gray;font-size:14px"><i class="fas fa-user"></i> <?= $berita['nama_user'] ?>,  Published at <?= $berita['date_created'] ?></p>
                <!-- <center><img src="<?= base_url() ?>assets/images/<?= $berita['featured_image'] ?>" class="img img-fluid mt-3"  style="border:1px solid #e1e2e3"></center> -->
                <?php  
                $sumber = $berita['sumber_foto'];
                if ($sumber) {
                echo "<p class=\"ml-1\" style=\"font-size: 11px;\">Sumber: ".$sumber." </p>";
                }
                ?>
                <div class="mt-3 desc"><?= $berita['deskripsi'] ?></div>
              </div>
            </article>
            <!-- // article -->
            <!-- div share link -->
            <div class="mt-3">
                <p>Share Link:</p>                
                <?php 
                    $urls = base_url()."berita/".$id_berita;
                    $url = urlencode($urls);
                ?>
                <a href="http://twitter.com/share?url=<?= $url ?>" class="twitter text-white mr-1 bg-info pl-3 pr-3 pt-2 pb-2" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>" class="facebook text-white mr-1 bg-primary pl-3 pr-3 pt-2 pb-2" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://api.whatsapp.com/send?text=<?= $url ?>" class="text-white mr-1 bg-success pl-3 pr-3 pt-2 pb-2"  data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <br><br>
            </div>
            <!-- // div share link -->
          </div>
          <!-- //div col -->
          <!-- div col -->
          <div class="col-md-4">
            <?php          
                $data['berita_list'] = $berita_list;
                $data['category_list'] = $category_list;
            ?>
            <?php $this->load->view('home/_partial/sidebar', $data) ?>
          </div>
          <!-- // div col -->
        </div>
        <!-- // div row -->
      </div>
      <!-- // div container -->
    </section>
    <!-- // section detail berita -->
  </main>
  <!-- // main -->
