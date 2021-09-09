<?php $this->load->view('admin/_partial/header'); ?>

    <?php 
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        $words = str_replace('<p>', '', $words);
        $words = str_replace('</p>', '', $words);
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
      <div class="container-fluid bg-white">
        <?= $this->session->flashdata('message'); ?>
        <div class="row" >
          <div class="col-md-12">
            <div class="table table-responsive">
              <a href="<?= base_url()  ?>admin/tambah_berita"><button class="btn btn-primary"><span class="fas fa-plus"></span> Tambah Post</button></a>  
              <br>
              <br>
              <table class="table table-responsive table-striped table-bordered data mt-3" id="myTable">
                <thead>
                  <tr class="text-center bg-primary">
                    <!-- <th style="width:5%">No</th> -->
                    <th style="width:10%"></th>
                    <th style="width:15%">Judul</th>
                    <th style="width:20%">Isi</th>
                    <th style="width:10%">Tipe Post</th>
                    <th style="width:10%">Fokus Program</th>
                    <th style="width:5%">Uploader</th>
                    <th style="width:10%">Published Date</th>
                    <th style="width:10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $no = 1;
                  foreach ($brita->result() as $row) {
                    if ($row->id == 21) {
                      $isi = limit_words2($row->deskripsi, 20);
                    }else {
                      $isi = limit_words($row->deskripsi, 20);
                    }
                  ?>
                  <tr>
                    <!-- <td><?= $no ?></td> -->
                    <td><img src="<?= base_url()  ?>assets/images/<?= $row->featured_image ?>" class="img img-fluid"></td>
                    <td class="berita-table text-orange"><?= $row->judul ?></td>
                    <td class="berita-table"><p><?= $isi ?></p></td>
                    <td><a href="#" class="kategori-badge podcast-badge mt-1 berita-table"><i class="<?= $row->posttype_icon ?>"></i> <?= $row->posttype_name ?></a></td>
                    <td>
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
                          
                          <a href="#" class="kategori-badge podcast-badge mt-1 berita-table"><i class="<?= $icon['icon'] ?>"></i> <?= $hasils ?></a><br>
                        <?php
                          }
                        }else {
                          echo "";
                        }
                      ?>
                      </td>
                    <td class="berita-table"><i class="fas fa-user"></i> &nbsp;<?= $row->nama_user ?></td>
                    <td class="berita-table"><i class="far fa-calendar-alt"></i>&nbsp; <?= $row->date_created ?></td>
                    <td>
                      <center>
                        <a href="<?= base_url() ?><?= $row->posttype_slug ?>/<?= $row->slug ?>" class="btn btn-sm btn-success m-1" target="_blank"><span class="fas fa-eye"></span></a>
                        <a href="#" class="btn btn-sm btn-warning m-1"><span class="fas fa-lock"></span></a>
                        <a href="<?= base_url() ?>admin/editberita/<?= $row->id_post ?>" class="btn btn-sm btn-primary m-1"><span class="fas fa-edit"></span></a>
                        <a href="#" class="btn btn-sm btn-danger m-1" onclick="konfirmasi(<?= $row->id_post ?>)" id="hapus<?= $row->id_post ?>"><span class="fas fa-trash"></span></a>
                      </center>
                    </td>
                  </tr>
                  <?php 
                  $no++; }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!--/. container-fluid -->
<?php $this->load->view('admin/_partial/footer') ?>
<!-- <?php $this->load->view('admin/_partial/highchart') ?> -->
<script>
function konfirmasi(id){
  const konfirm = confirm("Apakah Anda yakin ingin menghapus Postingan ini?");
  if (konfirm == true){
    window.location.replace("<?= base_url() ?>admin/hapusberita/"+id);
  } 
}

$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>