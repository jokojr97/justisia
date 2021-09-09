<?php $this->load->view('adminsuper/_partial/header') ?>
<div class="container">
	<div class="row">
		<div class="col mx-auto">
			<a class="btn btn-primary mb-3" href="<?= base_url('adminsuper/pengguna') ?>"><i class="fas fa-arrow-left"></i> Kembali ke menu pengguna</a>
			<hr>
			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('adminsuper/tambah_pengguna') ?>" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label h5" for="Uname" >Username:</label>         
							<small>*Jangan beri spasi untuk username</small>
							<input type="text" class="form-control" id="uname" placeholder="Masukkan Nama Lengkap Anda" name="uname">
						</div>
						<div class="form-group">
							<label class="control-label h5" for="Nama" >Nama Lengkap:</label>         
							<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" name="nama" value="">
						</div>
						<label class="control-label h5" for="Nama" >Jenis Kelamin:</label>
						<!-- <textarea  class="form-control" placeholder="Berikan Tanggapan Pada Komentar ..." name="aspirasi"  style="height: 100px" required></textarea> -->								    
		                <div class="form-group">
		                  <label class="radio-inline h5 mt-2 ml-2 font-weight-light"  for="Jk">
		                    <input type="radio" name="jk" value="Laki-Laki" checked> Laki-Laki
		                  </label>
		                  <label class="radio-inline h5 mt-2 ml-2 font-weight-light" for="Jk">
		                    <input type="radio" name="jk" value="Perempuan" class="ml-2"> Perempuan
		                  </label>
		                </div><!-- 
						<div class="form-group">
							<label class="control-label h5" for="Alamat">Alamat:</label>
							<input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" name="alamat" value="">
						</div> -->
			    		<h6>Role</h6>
						<div class="input-group">
							<!-- <textarea  class="form-control" placeholder="Berikan Tanggapan Pada Komentar ..." name="aspirasi"  style="height: 100px" required></textarea> -->
							<!-- <input type="text" class="form-control" placeholder="Telpon" aria-label="email" aria-describedby="addon-wrapping" value="<?= $role ?>"> -->
							<select class="form-control" id="role" name="role">
								<option value="2">Admin</option>
								<option value="1">Admin Super</option>
							</select>
					    </div>
					</div>
					<div class="col-md-6">
			          	<div class="form-group">
							<label class="control-label h5" for="Email" >Email:</label>
							<input type="text" class="form-control" id="email" placeholder="Masukkan Alamat Email Anda"  name="email" value="">
						</div><!-- 
						<div class="form-group">
							<label class="control-label h5" for="Telpon" >Telpon:</label>
							<input type="number" class="form-control" id="telpon" placeholder="Masukkan Nomor Telpon Anda"  name="telpon" value="">
						</div> -->
						<div class="form-group">
							<label class="control-label h5" for="Password1" >Password:</label>
							<input id="sign-in-password" type="password" name="password1" class="form-control"  placeholder="Masukkan Password">
						</div>
						<div class="form-group">
							<label class="control-label h5 mt-1" for="Password2" >Ulangi Password:</label>
							<input id="sign-in-password" type="password" name="password2" class="form-control"  placeholder="Ulangi Password">
						</div>
						<br>
						<button type="submit" class="btn btn-success float-right btn-lg" value="MASUK">\Tambah</button>
					</div>
				</div>
				<br>					
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('adminsuper/_partial/footer') ?>