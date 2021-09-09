<?php $this->load->view('adminsuper/_partial/header') ?>
<div class="container">
	<div class="row">
		<div class="col mx-auto">
			<a class="btn btn-primary mb-3" href="<?= base_url('adminsuper/pengguna') ?>"><i class="fas fa-arrow-left"></i> Kembali ke menu pengguna</a>
			<hr>
			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('adminsuper/edit_pengguna') ?>" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label h5" for="Uname" >Username:</label>         
							<small>*Jangan beri spasi untuk username</small>
							<input type="text" class="form-control" id="uname" placeholder="Masukkan Nama Lengkap Anda" name="uname" value="<?= $data_pengguna['username'] ?>">
          					<?= form_error('uname', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<label class="control-label h5" for="Nama" >Jenis Kelamin:</label>
						<!-- <textarea  class="form-control" placeholder="Berikan Tanggapan Pada Komentar ..." name="aspirasi"  style="height: 100px" required></textarea> -->								    
		                <div class="form-group">
		                	<?php if ($data_pengguna['jenis_kelamin'] == "Laki-Laki") { ?>
			                  <label class="radio-inline h5 mt-2 ml-2 font-weight-light"  for="Jk">
			                    <input type="radio" name="jk" value="Laki-Laki" checked> Laki-Laki
			                  </label>
			                  <label class="radio-inline h5 mt-2 ml-2 font-weight-light" for="Jk">
			                    <input type="radio" name="jk" value="Perempuan" class="ml-2"> Perempuan
			                  </label>
	                		<?php } else { ?>

			                  <label class="radio-inline h5 mt-2 ml-2 font-weight-light"  for="Jk">
			                    <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki
			                  </label>
			                  <label class="radio-inline h5 mt-2 ml-2 font-weight-light" for="Jk">
			                    <input type="radio" name="jk" value="Perempuan" class="ml-2" checked> Perempuan
			                  </label>
                			<?php }  ?>
		                </div>

						<div class="form-group">
							<label class="control-label h5" for="Nama" >Nama Lengkap:</label>         
							<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" name="nama"  value="<?= $data_pengguna['nama'] ?>">
          					<?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
		                <!-- 
						<div class="form-group">
							<label class="control-label h5" for="Alamat">Alamat:</label>
							<input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" name="alamat" value="">
						</div> -->
					</div>
					<div class="col-md-6">
			          	<div class="form-group">
							<label class="control-label h5" for="Email" >Email:</label>
							<input type="text" class="form-control" id="email" placeholder="Masukkan Alamat Email Anda"  name="email"  value="<?= $data_pengguna['email'] ?>">
          					<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
						</div><!-- 
						<div class="form-group">
							<label class="control-label h5" for="Telpon" >Telpon:</label>
							<input type="number" class="form-control" id="telpon" placeholder="Masukkan Nomor Telpon Anda"  name="telpon" value="">
						</div> -->
			    		<h6>Role</h6>
						<div class="input-group">
							<!-- <textarea  class="form-control" placeholder="Berikan Tanggapan Pada Komentar ..." name="aspirasi"  style="height: 100px" required></textarea> -->
							<!-- <input type="text_id" class="form-control" placeholder="Telpon" aria-label="email" aria-describedby="addon-wrapping" value="<?= $role ?>"> -->
							<select class="form-control" id="role" name="role">
								<?php if ($data_pengguna['role_id'] == 1) { ?>
								<option value="1">Admin Super</option>
								<option value="2">Admin</option>

								<?php }else { ?>
								<option value="2">Admin</option>
								<option value="1">Admin Super</option>

								<?php } ?>
							</select>
					    </div>
						<br><br>
						<input type="hidden" name="id" value="<?= $data_pengguna['id'] ?>">
						<input type="hidden" name="profil" value="user">
						<button type="submit" class="btn btn-success float-right btn-lg" value="MASUK"><i class="fas fa-edit"></i> Edit</button>
					</div>
				</div>
				<br>					
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('adminsuper/_partial/footer') ?>