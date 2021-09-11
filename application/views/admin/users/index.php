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
              <a href="<?= base_url() ?>/admin/users/add" class="btn btn-success mb-3"> <i class="fas fa-plus"></i> Add users</a>
            <div class="table table-responsive">
              <table class="table table-striped table-bordered data mt-3" id="pagetable">
                <thead>
                  <tr class="text-center bg-primary">
                    <th style="width:5%">No</th>
                    <th style="width:15%">Name</th>
                    <th style="width:15%">Username</th>
                    <th style="width:20%">Email</th>
                    <th style="width:10%">Role</th>
                    <th style="width:5%">Status</th>
                    <th style="width:10%">Jenis Kelamin</th>
                    <th style="width:15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $no = 1;
                  foreach ($users->result() as $row) {
                  ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->username ?></td>
                    <td><?= $row->email ?></td>
                    <td><?= ($row->role_id == 1) ? "Admin" : "Users" ?></td>
                    <td><?= ($row->is_active == 1) ? "Active" : "Non Active" ?></td>
                    <td><?= $row->jenis_kelamin ?></td>
                    <td> 
                      <!-- <a href="#" class="btn btn-sm btn-success m-1"><span class="fas fa-eye"></span></a> -->
                      <!-- <a href="#" class="btn btn-sm btn-warning m-1"><span class="fas fa-lock"></span></a> -->
                      <a href="<?= base_url() ?>admins/users/edit/<?= $row->id ?>" class="btn btn-sm btn-primary m-1"><span class="fas fa-edit"></span> Edit</a>
                      <a href="<?= base_url() ?>admins/users/delete/<?= $row->id ?>" class="btn btn-sm btn-danger m-1"><span class="fas fa-trash"></span> Hapus</a>
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