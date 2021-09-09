<?php $this->load->view('admin/_partial/header'); ?>
      <div class="container-fluid bg-white">
        <div class="row m-3">
          <div class="col-md-12">
            <br>
            <div class="table table-responsive">
              <a href="<?= base_url()  ?>admin/tambah_data_prov"><button class="btn btn-primary"><span class="fas fa-plus"></span> Tambah Data</button></a>  
              <a href="<?= base_url()  ?>admin/eksport_data_prov"><button class="btn btn-danger ml-1"><span class="fas fa-upload"></span> Eksport Data</button></a>  
              <a href="<?= base_url()  ?>admin/import_data_prov"><button class="btn btn-success ml-1"><span class="fas fa-download"></span> Import Data</button></a>
              <table class="table table-striped table-bordered data mt-3">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th style="padding-left: 40px;padding-right: 40px">Aksi</th>
                    <th>Bidang</th>
                    <th>Kategori</th>
                    <th>Tahun</th>
                    <?php  
                    foreach ($kabupaten->result() as $row) {
                    ?>
                      <th><?= $row->nama_kab ?></th>
                    <?php   
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $no = 1;
                  foreach ($data_prov->result() as $row) {
                  $res = $this->db->get_where('jsts_deskripsi_data', ['id_deskripsi' => $row->id_deskripsi])->row_array();                     
                  ?>
                  <tr>
                    <td class="text-center"><?= $no ?></td>
                    <td> 
                      <a href="#" class="btn btn-sm btn-success m-1"><span class="fas fa-eye"></span></a>
                      <a href="#" class="btn btn-sm btn-warning m-1"><span class="fas fa-lock"></span></a>
                      <a href="#" class="btn btn-sm btn-primary m-1"><span class="fas fa-edit"></span></a>
                      <a href="#" class="btn btn-sm btn-danger m-1"><span class="fas fa-trash"></span></a>
                    </td>
                    <td><?= $res['nama_bidang'] ?></td>
                    <td><?= $res['nama_kategori'] ?></td>
                    <td><?= $row->tahun ?></td>

                    <?php  
                    foreach ($kabupaten->result() as $rw) {
                      $namakab = $rw->kd_kab;
                    ?>
                      <td class="text-center"><?= $row->$namakab ?></td>
                    <?php   
                    }
                    ?>
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
