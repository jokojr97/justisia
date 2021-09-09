<?php $this->load->view('adminsuper/_partial/header') ?>
<div class="container-fluid">
	<div class="row">		
      <div class="col">
      	<h3>List Penduduk
      	<!-- <a href="<?= base_url('adminsuper/ m  tambah_user') ?>" class="btn btn-primary float-right mb-3"><i class="fas fa-plus"></i> Tambah Penduduk</a> -->
      </h3><hr>
      	<!-- <?= $sql; ?> -->
  		<form action="<?= base_url() ?>adminsuper/data_desa" method="POST">		      			
  			<input type="hidden" name="name" value = "1">
	      	<div class="row m-3 p-3 bg-white">
	      		<div class="col-md-6">
					<div class="form-group">
						<label class="control-label h5" for="Pendidikan" >Pendidikan :</label>         
						<!-- <input type="text" class="form-control" id="pendidikan" placeholder="Masukkan Nama Lengkap Anda" name="pendidikan"> -->
	                    <select class="form-control" id="Pendidikan" name="pendidikan">
                        	<?php if ($pendidikan) { ?>                        		
                        		<option><?= $pendidikan ?></option>
                        	<?php }else { ?>
                        		<option value="">-- Pilih Salah Satu --</option>
                    		<?php } ?>
	                    	<?php foreach ($pendidikan_group->result() as $row) : ?>
	                              <option><?= $row->pendidikan_terakhir ?></option>
	                    	<?php endforeach; ?>
                        	<option value="">-- Semua --</option>
	                    </select>
					</div>	
					<div class="form-group">
						<label class="control-label h5" for="Pekerjaan" >Pekerjaan :</label>         
						<!-- <input type="text" class="form-control" id="pekerjaan" placeholder="Masukkan Nama Lengkap Anda" name="pekerjaan" value=""> -->
                        <select class="form-control" id="Pekerjaan" name="pekerjaan">
                        	<?php if ($pekerjaan) { ?>                        		
                        		<option><?= $pekerjaan ?></option>
                        	<?php }else { ?>
                        		<option value="">-- Pilih Salah Satu --</option>
                    		<?php } ?>
                        	<?php foreach ($pekerjaan_group->result() as $row) : ?>
                                  <option><?= $row->pekerjaan ?></option>
                        	<?php endforeach; ?>
                        	<option value="">-- Semua --</option>
                        </select>
					</div>
					<div class="form-group">
						<label class="control-label h5 mt-1" for="Jk" >Jenis Kelamin :</label>
						<!-- <input id="sign-in-password" type="password" name="password2" class="form-control"  placeholder="Ulangi Password"> -->						
                        <select class="form-control" id="Jk" name="jk">
                        	<?php if ($jk) { ?>                        		
                        		<option><?= $jk ?></option>
                        	<?php }else { ?>
                        		<option value="">-- Pilih Salah Satu --</option>
                    		<?php } ?>
                        	<option>Laki-Laki</option>
                        	<option>Perempuan</option>
                        	<option value="">-- Semua --</option>
                        </select>
					</div>
				</div>
				<div class="col-md-6">
		          	<div class="form-group">
						<label class="control-label h5" for="Status_kawin" >Status Kawin :</label>

                        <select class="form-control" id="Status_kawin" name="status_kawin">                        	
                        	<?php if ($status_kawin) { ?>                        		
                        		<option><?= $status_kawin ?></option>
                        	<?php }else { ?>
                        		<option value="">-- Pilih Salah Satu --</option>
                    		<?php } ?>
                        	<?php foreach ($status_perkawinan_group->result() as $row) : ?>
                                  <option><?= $row->status_perkawinan ?></option>
                        	<?php endforeach; ?>
                        	<option value="">-- Semua --</option>
                        </select>
						<!-- <input type="text" class="form-control" id="email" placeholder="Masukkan Alamat Email Anda"  name="email" value=""> -->
					</div><!-- 
						<div class="form-group">
							<label class="control-label h5" for="Telpon" >Telpon:</label>
							<input type="number" class="form-control" id="telpon" placeholder="Masukkan Nomor Telpon Anda"  name="telpon" value="">
						</div> -->
					<div class="form-group">
						<label class="control-label h5" for="Password1" >Umur :</label>
						<!-- <input id="sign-in-password" type="password" name="password1" class="form-control"  placeholder="Masukkan Password"> -->

                        <select class="form-control" id="Umur" name="umur">
                        	<?php if ($umurval) { ?>                        		
                        		<option value="<?= $umur ?>"><?= $umurval ?></option>
                        	<?php }else { ?>
                        		<option value="">-- Pilih Salah Satu --</option>
                    		<?php } ?>
                        	<option value="10"><10 Tahun</option>
                        	<option value="20">10-20 Tahun</option>
                        	<option value="30">20-30 Tahun</option>
                        	<option value="40">30-40 Tahun</option>
                        	<option value="50">40-50 Tahun</option>
                        	<option value="60">50-60 Tahun</option>
                        	<option value="70">>60 Tahun</option>
                        	<option value="">-- Semua --</option>
                        </select>
					</div>
					<br>
					<button type="submit" class="btn btn-success float-right" value="MASUK"><i class="fas fa-filter"></i> Filter</button>
					<a href="<?= base_url('adminsuper/data_desa') ?>" class="btn btn-default float-right mr-3 table-bordered" disabled><i class="fa fa-retweet"></i> Reset</a>
				</div>
	      	</div>
  		</form>
      	<br><br>
	      	<div class="table table-responsive p-2">
	      		
		        <table class="table table-striped table-bordered bg-white" id="bosdttable" >
		          <thead>
		            <tr class="bg-success text-white text-center">
		              <th scope="col"></th>
		              <th scope="col">NO KK</th>
		              <th scope="col">NIK</th>
		              <th scope="col">Nama Lengkap</th>
		              <th scope="col">Tempat Lahir</th>
		              <th scope="col">Tanggal Lahir</th>
		              <th scope="col">Umur</th>              
		              <th scope="col">Jenis_kelamin</th>              
		              <th scope="col">Pendidikan</th>              
		              <th scope="col">Pekerjaan</th>              
		              <th scope="col">Status Kawin</th>              
		            </tr>
		          </thead>
		          <tbody>
		          	
		          </tbody>
		      	</table>
	      	</div>
		</div>
	</div>
</div>
<?php $this->load->view('adminsuper/_partial/footer') ?>