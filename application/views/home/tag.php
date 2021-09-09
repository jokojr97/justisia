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
                        <h3><i class="fas fa-searh"></i> Tag: #<?= $text ?></h3>
                        <hr style="border:5px solid orange;margin-bottom: 30px">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <?php if ($data->result()) { 
                    foreach ($data->result() as $row) { 
                    ?>
                    <div class="col-md-4">
                        <div class="berita-box">
                            <img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" class="img-fluid">
                            <p class="service-heading mt-3" style="line-height:1.3;font-size:15px;margin-bottom:10px"><a href="<?= base_url() ?>podcast/<?= $row->slug ?>" class="text-orange"><b><?= $row->judul ?></a></b></p>
                            
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
                            
                            <p style="margin-top: -15px;line-height: 1.3;font-size:14px">
                                <?php
                                if($row->post_type == 21) {
                                    echo limit_words2($row->deskripsi, 20);
                                }else {
                                    echo limit_words($row->deskripsi, 20);
                                }
                                ?>
                            </p>
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
            <?php if ($data->result()) { ?>
                <div class="float-right mt-3"><?php echo $pagination; ?></div>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <?php $this->load->view('home/_partial/sidebar', $data) ?>
        </div>
    </div>
    
  </div>

</section>

</main>

