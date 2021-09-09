<?php $this->load->view('adminsuper/_partial/header') ?>
<div class="container-fluid">
	<div class="row p-3">
		<div class="col-md-8">	
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="tab" href="#home"><span class="fa fa-circle text-danger"></span> &nbsp;Pengaduan Terbaru</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="tab" href="#menu1"><span class="fa fa-circle text-success"></span> &nbsp;Pengaduan Selesai</a>
			</li>
		</ul>
		<div class="tab-content">			
	    	<div id="home" class=" tab-pane active"><br>

				<?php $i = 1; foreach ($aspirasi_proses->result() as $proses) {  ?>
					
				<div class="card card-body border">				
					<div class="media">
					  <img class="mr-3 rounded-circle" src="https://siipp.net/assets/images/img_avatar2.png" alt="Generic placeholder image" width="64">
					  <div class="media-body">
					  	<div class="row">
			            	<div class="col-8">
			                <h5 class="text-capitalize"><?= $proses->nama ?> <small class="text-lowercase">&nbsp;(<?= $proses->email ?>)&nbsp;&nbsp;
			                	<span class=" badge badge-pill badge-success " >Warga</span>
			                </small></h5>                                        
				            </div>
				            <div class="col-4 float-right">                    
				                <small style="text-transform: bold" class="float-right">2019-09-31 15:16:07</small>
				            </div>
			        	</div>	            
			        	<p class="text-justify"><?= $proses->aspirasi ?></p>              
		                <button class="btn btn-primary border" data-toggle="modal" data-target="#modal<?= $i  ?>"><span class="fa fa-info "></span>&nbsp;&nbsp;Detail</button>              
		                <a href="<?= base_url() ?>adminsuper/balas_aspirasi/<?= $proses->id ?>" class="btn btn-danger border"><span class="fa fa-comment "></span>&nbsp;&nbsp;Balas</a>
					  </div>
					</div>
				</div>
				<?php $i++; } ?>
			</div>
		    <div id="menu1" class=" tab-pane fade bg-gray-100"><br>		     

				<?php $j = $i; foreach ($aspirasi_selesai->result() as $selesai) {  ?>
					
				<div class="card card-body border">				
					<div class="media">
					  <img class="mr-3 rounded-circle" src="https://siipp.net/assets/images/img_avatar2.png" alt="Generic placeholder image" width="64">
					  <div class="media-body">
					  	<div class="row">
			            	<div class="col-8">
			                <h5 class="text-capitalize"><?= $selesai->nama ?> <small class="text-lowercase">&nbsp;(<?= $selesai->email ?>)&nbsp;&nbsp;
			                	<span class=" badge badge-pill badge-success " >Warga</span>
			                </small></h5>                                        
				            </div>
				            <div class="col-4 float-right">                    
				                <small style="text-transform: bold" class="float-right">2019-09-31 15:16:07</small>
				            </div>
			        	</div>	            
			        	<p class="text-justify"><?= $selesai->aspirasi ?></p>              
		                <button class="btn btn-primary border" data-toggle="modal" data-target="#modal<?= $j  ?>"><span class="fa fa-info "></span>&nbsp;&nbsp;Detail</button>              
		                <a href="<?= base_url() ?>adminsuper/balas_aspirasi/<?= $selesai->id ?>" class="btn btn-danger border"><span class="fa fa-comment "></span>&nbsp;&nbsp;Balas</a>
					  </div>
					</div>
				</div>
				<?php $j++; } ?>
	  	    </div>
		</div>
	</div>
	<div class="col-md-4">
		<div id="grafik3"></div>
	</div>
	</div>
</div>

<?php  $a = 1; foreach ($aspirasi_proses->result() as $proses)  { ?>
	<div class="modal fade bd-example-modal-lg" id="modal<?= $a ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog  modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-gray">
	        <h5 class="modal-title text-capitalize" id="exampleModalLongTitle">detail pengaduan</h5>
	        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="container">
	      		<div class="row">
	      			<div class="col">
	      				<table class="table table-bordered">
	      					<tbody>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">Nama</td>
	      							<td colspan="2" class=" text-capitalize"><?= $proses->nama ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">alamat</td>
	      							<td colspan="2" class=" text-capitalize"><?= $proses->alamat ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">email</td>
	      							<td colspan="2"><?= $proses->email ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">Jenis Kelamin</td>
	      							<td colspan="2" class=" text-capitalize"><?= $proses->jenis_kelamin ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">subject</td>
	      							<td colspan="2" class=" text-capitalize"><?= $proses->subject ?></td>
	      						</tr>
	      					</tbody>
	      				</table>
	      				<h5>Aspirasi: </h5>
	      				<div class="border p-3 bg-light">
	      					<p class="text-justify mb-3"><?= $proses->aspirasi ?></p>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </div><!-- 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div> -->
	    </div>
	  </div>
	</div>
<?php $a ++; } ?>
<?php foreach ($aspirasi_selesai->result() as $selesai) { ?>
	<div class="modal fade bd-example-modal-lg" id="modal<?= $a ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-gray">
	        <h5 class="modal-title text-capitalize" id="exampleModalLongTitle">detail pengaduan</h5>
	        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="container">
	      		<div class="row">
	      			<div class="col">
	      				<table class="table table-bordered">
	      					<tbody>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">Nama</td>
	      							<td colspan="2" class=" text-capitalize"><?= $selesai->nama ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">alamat</td>
	      							<td colspan="2" class=" text-capitalize"><?= $selesai->alamat ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">email</td>
	      							<td colspan="2"><?= $selesai->email ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">Jenis Kelamin</td>
	      							<td colspan="2" class=" text-capitalize"><?= $selesai->jenis_kelamin ?></td>
	      						</tr>
	      						<tr>
	      							<td class="bg-light text-capitalize" width="40%">subject</td>
	      							<td colspan="2" class=" text-capitalize"><?= $selesai->subject ?></td>
	      						</tr>
	      					</tbody>
	      				</table>
	      				<h5>Aspirasi: </h5>
	      				<div class="border p-3 bg-light">
	      					<p class="text-justify mb-3"><?= $selesai->aspirasi ?></p>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </div><!-- 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div> -->
	    </div>
	  </div>
	</div>
<?php $a++; } ?>


<?php 
$data['aspirasi_laki'] = $jumlah_aspirasi_laki2;
$data['aspirasi_perempuan'] = $jumlah_aspirasi_perempuan;
?>
<?php $this->load->view('adminsuper/_partial/footer') ?>
<?php $this->load->view('adminsuper/_partial/highchart',$data) ?>