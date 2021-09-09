<?php $this->load->view('adminsuper/_partial/header') ?>
<div class="container">
      	<a href="<?= base_url() ?>adminsuper/data_desa" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali Ke Data Desa</a><br><br>
	<div class="row">		
      <div class="col-md-6">      	

		<table class="table table-bordered bg-white">
			<tbody>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">No. KK</td>
					<td colspan="3" class=" text-capitalize"><?= $row["no_kk"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">NIK</td>
					<td colspan="3" class=" text-capitalize"><?= $row["nik"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Nama</td>
					<td colspan="3"><?= $row["nama_penduduk"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Jenis Kelamin</td>
					<td colspan="3" class=" text-capitalize"><?= $row["jenis_kelamin"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">RT</td>
					<td colspan="3" class=" text-capitalize"><?= $row["rt"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">RW</td>
					<td colspan="3" class=" text-capitalize"><?= $row["rw"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Tempat Lahir</td>
					<td colspan="3" class=" text-capitalize"><?= $row["tempat_lahir"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Tanggal Lahir</td>
					<td colspan="3" class=" text-capitalize"><?= $row["tanggal_lahir"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Umur</td>
					<td colspan="3"><?= $row["umur"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">No, Akta Kelahiran</td>
					<td colspan="3"><?= $row["no_akta_kelahiran"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Golongan darah</td>
					<td colspan="3"><?= $row["golongan_darah"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Status Pajak</td>
					<td colspan="3" class=" text-capitalize"><?= $row["status_pajak"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Tahun Pajak</td>
					<td colspan="3" class=" text-capitalize"><?= $row["tahun_pajak"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Agama</td>
					<td colspan="3"><?= $row["agama"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Pendidikan Terakhir</td>
					<td colspan="3"><?= $row["pendidikan_terakhir"] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
      <div class="col-md-6">      	
  		
		<table class="table table-bordered bg-white">
			<tbody>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Pekerjaan</td>
					<td colspan="3"><?= $row["pekerjaan"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Status Hubungan Keluarga</td>
					<td colspan="3"><?= $row["status_hubungan_keluarga"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Status Perkawinan</td>
					<td colspan="3"><?= $row["status_perkawinan"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">No Akta Perkawinan</td>
					<td colspan="3"><?= $row["no_akta_perkawinan"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Tanggal Perceraian</td>
					<td colspan="3"><?= $row["tanggal_perceraian"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Kelainan Fisik Mental</td>
					<td colspan="3"><?= $row["kelainan_fisik_mental"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Penyandang Cacat</td>
					<td colspan="3"><?= $row["penyandang_cacat"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Nama Ayah</td>
					<td colspan="3"><?= $row["nama_ayah"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">NIK Ayah</td>
					<td colspan="3"><?= $row["nik_ayah"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Nama Ibu</td>
					<td colspan="3"><?= $row["nama_ibu"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">NIK Ibu</td>
					<td colspan="3"><?= $row["nik_ibu"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Alamat</td>
					<td colspan="3"><?= $row["alamat"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Alamat Penduduk</td>
					<td colspan="3"><?= $row["alamat_penduduk"] ?></td>
				</tr>
				<tr>
					<td class="bg-detail text-capitalize text-bold" width="40%">Nama Kepala Keluarga</td>
					<td colspan="3"><?= $row["nama_kepala_keluarga"] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('adminsuper/_partial/footer') ?>