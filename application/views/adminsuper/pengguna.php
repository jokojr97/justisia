<?php $this->load->view('adminsuper/_partial/header') ?>

<div class="container-fluid">
	<div class="row">		
      <div class="col">
      	<h3>List User
      	<a href="<?= base_url('adminsuper/tambah_pengguna') ?>" class="btn btn-primary float-right mb-3"><i class="fas fa-plus"></i> Tambah Data</a></h3><hr>

        <?= $this->session->flashdata('message'); ?>
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="bg-success text-white text-center">
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>              
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 0;

            foreach ($pengguna->result() as $row) { 
              $role_id = $row->role_id;
              if ($role_id == 1) {
                $role = "Admin Super";
              }else if ($role_id == 2) {
                $role = "Admin";
              }
              $no++;
            ?>            	
            <tr>
              <th scope="row" class="text-center"><?= $no ?></th>
              <td><?= $row->username ?></td>
              <td class="text-left"><?= $row->nama ?></td>
              <td class="text-center"><?= $row->email ?></td>
              <td class="text-center"><?= $role ?></td>
              <td class="text-center"><a class="btn btn-warning m-1" href="<?= base_url() ?>adminsuper/edit_pengguna/<?= $row->id ?>"><i class="fas fa-edit"></i></a><a class="btn btn-danger" href="<?= base_url() ?>adminsuper/hapus_pengguna/<?= $row->id ?>" onclick="confirm('Yakin untuk menghapus data?')"><i class="fas fa-trash"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
	</div>
</div>
<?php $this->load->view('adminsuper/_partial/footer') ?>