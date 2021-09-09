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
              <a href="#" class="btn btn-primary" onclick="tambahfunction()"><span class="fas fa-plus"></span> Tambah Category</a>
              <br><br>
              <table class="table table-striped table-bordered data mt-3" id="categorytable">
                <thead>
                  <tr class="text-center bg-primary">
                    <th>No</th>
                    <th>Nama Category</th>
                    <th>Slug</th>
                    <th>Jumlah Post</th>
                    <th style="width:20%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $no = 1;
                  foreach ($cat as $row) {
                  ?>
                  <tr>
                    <td class="text-center"><?= $no ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['slug'] ?></td>
                    <td class="text-center"><?= $row['jml_post'] ?></td>
                    <td class="text-center">
                      <a href="#" class="btn btn-sm btn-primary m-1" onclick="editfunction(<?= $row['id'] ?>)"><span class="fas fa-edit"></span> Edit</a>
                      <a href="#" class="btn btn-sm btn-danger m-1" onclick="hapusfunction(<?= $row['id'] ?>)"><span class="fas fa-trash"></span> Hapus</a>
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
// datatable
$(document).ready( function () {
    $('#categorytable').DataTable({
      // "order": [[ 3, "desc" ]],
    });
} );

// function hapus
function hapusfunction(id) {
    var con = confirm('Apakah Anda yakin untuk menghapus kategori ini?');
    if (con == true) {  
        // Simulate an HTTP redirect:
        var url = '<?= base_url() ?>admin/categories/hapus/' + id;
        window.location.replace(url);
        // console.log(url);
    }
}

// tambah function
function tambahfunction() {
    var inptprompt = prompt('Masukkan Nama Category:');
    if (inptprompt) {
        $.ajax({
            url: "<?= base_url() ?>admin/categories/insert",
            type: "GET",
            action: "insert",
            data: {categories: inptprompt},
            success: function (response) {
                location.reload();
            }
        });
    }
}

// function edit
function editfunction(id) {
    // console.log(id);
    $.ajax({
        url: "<?= base_url() ?>admin/categories/get_name",
        type: "GET",
        action: "get_name",
        data: {id: id},
        success: function (response) {
            res = JSON.parse(response);
            var promptedit = prompt('Nama Kategori', res.name);
            if (promptedit) {
                ajaxedit(promptedit,res.name);         
            }
        }
    });

    // function edit proses / update
    function ajaxedit(nameanyar,namelawas) {
        $.ajax({
            url: "<?= base_url() ?>admin/categories/update",
            type: "GET",
            action: "update",
            data: {nameanyar: nameanyar,namelawas: namelawas},
            success: function (response) {
                location.reload();
                // console.log(response);
            }
        });
    }
}

</script>