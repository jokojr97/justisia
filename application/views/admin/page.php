<?php $this->load->view('admin/_partial/header'); ?>

    <?php 
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
    ?>
      <div class="container-fluid bg-white">
        <?= $this->session->flashdata('message'); ?>
        <div class="row" >
          <div class="col-md-12">
            <div class="table table-responsive">
              <!-- <a href="<?= base_url()  ?>admin/tambah_berita"><button class="btn btn-primary"><span class="fas fa-plus"></span> Tambah Page</button></a>   -->
              <table class="table table-striped table-bordered data mt-3" id="pagetable">
                <thead>
                  <tr class="text-center bg-primary">
                    <th style="width:5%">No</th>
                    <th style="width:15%">Judul</th>
                    <th style="width:20%">Isi</th>
                    <th style="width:17%">Keywords</th>
                    <th style="width:18%">Description</th>
                    <th style="width:5%">Uploader</th>
                    <th style="width:10%">Published Date</th>
                    <th style="width:10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $no = 1;
                  foreach ($pages->result() as $row) {
                     $isi= limit_words($row->content, 20);
                  ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $row->name ?></td>
                    <td><p><?= $isi ?></p></td>
                    <td><?= $row->keywords ?></td>
                    <td><?= $row->description ?></td>
                    <td><?= $row->slug ?></td>
                    <td><?= $row->created_at ?></td>
                    <td> 
                      <a href="#" class="btn btn-sm btn-success m-1"><span class="fas fa-eye"></span></a>
                      <a href="#" class="btn btn-sm btn-warning m-1"><span class="fas fa-lock"></span></a>
                      <a href="#" class="btn btn-sm btn-primary m-1"><span class="fas fa-edit"></span></a>
                      <a href="#" class="btn btn-sm btn-danger m-1"><span class="fas fa-trash"></span></a>
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
    <script>
      $(document).ready( function () {
          $('#pagetable').DataTable();
      } );
    </script>