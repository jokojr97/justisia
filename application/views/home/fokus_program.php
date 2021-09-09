<main id="main" class="main-page  ">

<!-- Awal Service -->
<div class="services" id="materi">
    <div class="container"> 
        <div class="row">
        <div class="col-md-8">
                
        <h2 class="headtani" style="color: white"><b><?= $header_judul ?></b></h2>    
        <?= $header_isi ?>
        <p style="font-size: 14px;color: white">- <?= $header_penulis ?> -</p>
        </div>
        </div> 
    </div>
</div>
<!-- <p class="ml-2" style="font-size: 11px;">Photo By : Ravi Bachtiar</p> -->
      
<!--==========================
  Speaker Details Section
============================-->
<section id="speakers-details" class="wow fadeIn">
  <div class="container">
    <div class="form-row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="h3">
                        <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif;margin-bottom:0;text-transform:uppercase" class="text-orange"></i> Fokus Programs: <?= $text ?></h3>
                        <hr style="border:5px solid orange;margin-bottom: 10px">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <?php if ($data->result()) { 
                    foreach ($data->result() as $row) { 
                    ?>
                    <div class="col-md-3">
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
                                $icon = $this->db->query("SELECT * FROM jsts_programs where `name`='".$slugs."'")->row_array();
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
    </div>
    
    <?php if ($poster_programs->result() && $poster_programs->result() != "") { ?>
            <div class="form-row">
                <div class="col">            
                    <h2 class="judul"><strong> Media Campaign</strong></h2>
                    <hr class="hr-judul">   
                    
                    <!--  Demos -->
                    <section id="demo">
                    <div class="form-row">
                        <div class="large-12 columns">
                        <div class="owl-carousel owl-carousel-podcast owl-theme">
                            
                            <?php foreach($poster_programs->result() as $result) { ?>
                            <div class="p-1">
                                <div class="berita-box">
                                <a href="<?= base_url() ?>home/detail_poster/<?= $result->slug ?>"><img src="<?= base_url() ?>assets/poster/<?= $result->nama_file ?>"></a>
                                <p class="service-heading mt-3" style="line-height:1.3;font-size:15px;"><a href="<?= base_url() ?>home/detail_poster/<?= $result->slug ?>" class="text-orange"><b><?= $result->title ?></a></b></p>
                              
                                <p style="color: gray;margin-top: -10px;font-size:12px;"><i class="fas fa-user"> </i> Admin, <span class="far fa-calendar-alt"></span> <?= $result->tanggal_upload ?></p>
                                
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <script>
                            $(document).ready(function() {
                            var owl = $('.owl-carousel-podcast');
                            owl.owlCarousel({
                                items: 3,
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
                                    items: 3,
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
                </div>
            </div>
        <?php } ?>
  </div>

</section>

</main>

