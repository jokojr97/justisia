<?php $this->load->view('admin/_partial/header'); ?>

    <?php 
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
    ?>
      <div class="container-fluid bg-white p-3">
        <div class="container-fluid">            
            <?= $this->session->flashdata('message'); ?>
            <div class="row" >
                <div class="col-md-8">
                    <div class="table table-responsive">
                    <a href="#" class="btn btn-primary" onclick="tambahfunction()"><span class="fas fa-plus"></span> Tambah Tipe Post</a>
                    <br><br>
                    <table class="table table-striped table-bordered data mt-3" id="tipetable">
                        <thead>
                        <tr class="text-center bg-primary">
                            <th>No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                        $no = 1;
                        foreach ($typepost->result() as $row) {
                        ?>
                        <tr>
                            <td><center><?= $no ?></center></td>
                            <td id="typepost<?= $row->id ?>"><p><?= $row->posttype_name ?></p></td>
                            <td><?= $row->posttype_slug ?></td>
                            <td>
                            <center>
                                <a href="#" class="btn btn-sm btn-primary m-1" onclick="editfunction(<?= $row->id ?>)" id="btnedit<?= $row->id ?>"><span class="fas fa-edit"></span> Edit</a>
                                <a href="#" class="btn btn-sm btn-danger m-1" id="btnhapus<?= $row->id ?>" onclick="hapusfunction(<?= $row->id ?>)"><span class="fas fa-trash"></span> Hapus</a>
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
        </div>
      </div><!--/. container-fluid -->
<?php $this->load->view('admin/_partial/footer') ?>
<script>
// function hapus
function hapusfunction(id) {
    var con = confirm('Apakah Anda yakin untuk menghapus tipe ini?');
    if (con == true) {  
        // Simulate an HTTP redirect:
        var url = '<?= base_url() ?>admin/postype/hapus/' + id;
        window.location.replace(url);
        // console.log(url);
    }
}

// function edit
function editfunction(id) {
    // console.log(id);
    $.ajax({
        url: "<?= base_url() ?>admin/postype/get_name",
        type: "GET",
        action: "get_name",
        data: {id: id},
        success: function (response) {
            res = JSON.parse(response);
            var promptedit = prompt('Nama Type Post', res.posttype_name);
            if (promptedit) {
                ajaxedit(promptedit,res.posttype_name);         
            }
        }
    });

    // function edit proses / update
    function ajaxedit(nameanyar,namelawas) {
        $.ajax({
            url: "<?= base_url() ?>admin/postype/updatetipe",
            type: "GET",
            action: "updatetipe",
            data: {nameanyar: nameanyar,namelawas: namelawas},
            success: function (response) {
                location.reload();
                // console.log(response);
            }
        });
    }
}

// insert function
function tambahfunction() {
    var inptprompt = prompt('Masukkan Tipe Post:');
    if (inptprompt) {
        $.ajax({
            url: "<?= base_url() ?>admin/postype/insert",
            type: "GET",
            action: "insert",
            data: {posttipe: inptprompt},
            success: function (response) {
                location.reload();
            }
        });
    }
}

$(document).ready( function () {
    $('#tipetable').DataTable();
} );
</script>

