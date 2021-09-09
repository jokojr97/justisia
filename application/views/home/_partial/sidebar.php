<div class="bg-gray p-3 mt-3">
    <!-- form -->
    <form action="<?= base_url() ?>searchproses" method="POST">
    <!-- form-row -->
    <div class="form-row">
        <!-- div col -->
        <div class="col-10">
        <input type="text" name="keyword" placeholder="Masukkan Pencarian Anda..." class="form-control">
        </div>
        <!-- //div col -->
        <!-- div col -->
        <div class="col-2">
            <button class="btn btn-orange"><i class="fas fa-search"></i></button>
        </div>
        <!-- // div col -->
    </div>
    <!-- //form-row -->
    </form>
    <!-- // form -->
</div>
<h4 class="mt-3">Postingan Terbaru</h4>
<hr style="border: 3px solid orange">
<?php  
$n = 0;
foreach ($berita_list->result() as $row) {
    $judul = $row->judul;
    if ($n < 6) {
?>
    <!-- div row -->
    <div class="form-row">
    <!-- div col -->
    <div class="col-4">
        <img src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" class="img img-fluid p-1" style="border:1px solid #e1e2e3">
        <span class="tipe-post"><a href="<?= base_url() ?>posttipe/<?= $row->posttype_slug ?>" class="text-white"><i class="<?= $row->posttype_icon ?>"></i> <?= $row->posttype_name ?></a></span>
    </div>
    <!-- // div col -->
    <!-- div col -->
    <div class="col-8">
        <?php if($row->post_type_name == 'Podcast') { 
            $urls = 'podcast';
        }else {
            $urls = 'berita';
        }?>
        
        <a href="<?= base_url() ?><?= $urls ?>/<?= $row->slug ?>" style="font-size: 14px" ><p style="line-height:1.3;margin-top:10px;"><?= $judul ?></p></a>
    </div>
    <!-- //div col -->
    </div>
    <!-- // div row -->
<?php            
    } 
    $n++;
}
?>

<?php if (isset($berita['keywords'])) { ?>

    <h4 class="mt-3">Tags:</h4>
    <!-- div tag -->
    <div class="tag bg-gray p-2 border-rad">
        <!-- row -->
        <div class="form-row">
        <!-- col -->
        <div class="col">
            <?php
            $keyword = $berita['keywords'];
            $key = explode(',', $keyword);
            foreach($key as $result) { 
            $result = trim($result);
            $slugs = make_slug($result);
            ?>
            <a href="<?= base_url() ?>tag/<?= $slugs ?>" class="btn btn-light mt-1 mb-1 ml-1 btn-sm">#<?= $result ?></a>
            <?php } ?>
        </div>
        <!-- // col -->
        </div>
        <!-- // form row -->
    </div>
    <!-- // div tag -->
<?php } ?>
