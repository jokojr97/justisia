<main id="main" class="main-page  ">

<!--==========================
  Speaker Details Section
============================-->
<section id="speakers-details" class="wow fadeIn">
  <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col">
                    <div class="h3">
                        <h3><i class="fas fa-searc"></i> Kategori: <?= $text ?></h3>
                        <hr style="border:5px solid orange;margin-bottom: 30px">
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if ($kategori->result()) { 
                foreach ($kategori->result() as $row) { 
                ?>
                    <div class="col-md-4 col-sm-6">
                        <img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" class="img-fluid mb-2">
                        <b><a href="<?= base_url() ?>post/<?= $row->slug ?>"><p style="line-height: 1.3;color:#ff4a1a"><?= $row->judul ?></p></a></b>
                        <p style="color: gray;margin-top: -16px;"><i class="fas fa-user"> </i> Admin, <span class="far fa-calendar-alt"></span> <?= $row->date_created ?></p>
                        <div style="margin-top: -16px;font-size: 16px;line-height: 1.3;">
                            <p><?=  limit_words($row->deskripsi, 20); ?></p>
                        </div>
                    </div>
                <?php 
                }
                ?>
                
                <?php } else { ?>
                    <div class="col">
                        <h5>Belum Tersedia</h5>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-4">
            <?php          
                $data['berita_list'] = $berita_list;
                $data['posttype_list'] = $posttype_list;
                $data['category_list'] = $category_list;
            ?>
            <?php $this->load->view('home/_partial/sidebar', $data) ?>
        </div>
    </div>
    
  </div>

</section>

</main>

