<!-- BEGIN BASE-->
<div id="base">

<!-- BEGIN OFFCANVAS LEFT -->
<div class="offcanvas">

</div><!--end .offcanvas-->
<!-- END OFFCANVAS LEFT -->

<!-- BEGIN CONTENT-->
<div id="content">
	<section>
		<div class="section-header">
				<h2><span class="fa fa-users"></span> Data Pelanggan</h2>
		</div>
			<?= $this->session->flashdata('msg');?>
	</section>

	<!-- BEGIN TABLE HOVER -->
	<section class="style-default-bright" style="margin-top:0px;">
		
		
		<div class="section-body">	
			<div class="row">
				
				<table class="table table-hover" id="datatable1">
				<thead>
					<tr>
						<th>Photo</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Kontak</th>
						<th>Email</th>
						<th class="text-right">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=0;
					foreach ($data->result_array() as $a) {
						$no++;
						$id=$a['plg_id'];
						$nama=$a['plg_nama'];	
						$alamat=$a['plg_alamat'];
						$jenkel=$a['plg_jenkel'];
						$notelp=$a['plg_notelp'];
						$email=$a['plg_email'];
						$facebook=$a['plg_facebook'];
						$instagram=$a['plg_instagram'];
						$line=$a['plg_line'];
						$whatapp=$a['plg_whatapp'];
						$path=$a['plg_path'];
						$photo=$a['plg_photo'];
						$register=$a['plg_register'];
					
				?>
					<tr>
						<?php if(empty($photo)):?>
							<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?= base_url().'assets/images/user_blank.png';?>" alt="" /></td>
						<?php else:?>
							<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?= base_url().'assets/images/'.$photo;?>" alt="" /></td>
						<?php endif;?>
						<td><?= $nama;?></td>
						<?php if($jenkel=='L'):?>
							<td>Laki-Laki</td>
						<?php else:?>
							<td>Perempuan</td>
						<?php endif;?>
						<td><?= $alamat;?></td>
						<td><?= $notelp;?></td>
						<td><?= $email;?></td>
						<td class="text-right">
							<a href="#" class="btn btn-icon-toggle" title="Lihat Detail" data-toggle="modal" data-target="#modal_edit_pengguna<?= $id;?>"><i class="fa fa-eye"></i></a>
							
							<a href="#" class="btn btn-icon-toggle" title="Hapus Pelanggan" data-toggle="modal" data-target="#modal_hapus_pengguna<?= $id;?>"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>

				<?php } ?>
					
				</tbody>
				</table>

			</div>
		</div><!--end .section-body -->

		
	</section>
	<!-- END TABLE HOVER -->

	

</div><!--end #content-->
<!-- END CONTENT -->

</div><!--end #base-->
<!-- END BASE -->



<!-- ============ MODAL EDIT PENGGUNA =============== -->
<?php 
	foreach ($data->result_array() as $a) {
		$id=$a['plg_id'];
		$nama=$a['plg_nama'];	
		$alamat=$a['plg_alamat'];
		$jenkel=$a['plg_jenkel'];
		$notelp=$a['plg_notelp'];
		$email=$a['plg_email'];
		$facebook=$a['plg_facebook'];
		$instagram=$a['plg_instagram'];
		$line=$a['plg_line'];
		$whatapp=$a['plg_whatapp'];
		$path=$a['plg_path'];
		$photo=$a['plg_photo'];
		$register=$a['plg_register'];
					
?>
<div class="modal fade" id="modal_edit_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Detail Pelanggan</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/menu/update_menu'?>" enctype="multipart/form-data">
				<div class="modal-body">
				<table>
					<tr>
						<td style="width:90px;">Nama</td>
						<td>:</td>
						<td style="width:160px;"><?= $nama;?></td>
						<td style="width:90px;">Jenis Kelamin</td>
						<td>:</td>
						<?php if($jenkel=='L'):?>
							<td>Laki-Laki</td>
						<?php else:?>
							<td>Perempuan</td>
						<?php endif;?>
					</tr>
					<tr>
						<td style="width:90px;">Alamat</td>
						<td>:</td>
						<td style="width:160px;"><?= $alamat;?></td>
						<td style="width:90px;">Kontak</td>
						<td>:</td>
						<td><?= $notelp;?></td>
					</tr>
					<tr>
						<td style="width:90px;">Facebook</td>
						<td>:</td>
						<td style="width:160px;"><?= $facebook;?></td>
						<td style="width:90px;">Email</td>
						<td>:</td>
						<td><?= $email;?></td>
					</tr>
					<tr>
						<td style="width:90px;">Instagram</td>
						<td>:</td>
						<td style="width:160px;"><?= $instagram;?></td>
						<td style="width:90px;">Line</td>
						<td>:</td>
						<td><?= $line;?></td>
					</tr>
					<tr>
						<td style="width:90px;">WhatApp</td>
						<td>:</td>
						<td style="width:160px;"><?= $whatapp;?></td>
						<td style="width:90px;">Path</td>
						<td>:</td>
						<td><?= $path;?></td>
					</tr>
				</table>			
						
				</div>
				<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
				</div>
		</form>
		</div>
		</div>
</div>
<?php } ?>

<!-- ============ MODAL HAPUS PENGGUNA =============== -->
<?php 
	foreach ($data->result_array() as $a) {
		$id=$a['plg_id'];
		$nama=$a['plg_nama'];	
		$alamat=$a['plg_alamat'];
		$jenkel=$a['plg_jenkel'];
		$notelp=$a['plg_notelp'];
		$email=$a['plg_email'];
		$facebook=$a['plg_facebook'];
		$instagram=$a['plg_instagram'];
		$line=$a['plg_line'];
		$whatapp=$a['plg_whatapp'];
		$path=$a['plg_path'];
		$photo=$a['plg_photo'];
		$register=$a['plg_register'];
					
?>
<div class="modal fade" id="modal_hapus_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Pelanggan</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/pelanggan/hapus_pelanggan'?>" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="form-group">
							<label for="regular13" class="col-sm-2 control-label"></label>
							<div class="col-sm-8">
								<input type="hidden" name="kode" value="<?= $id;?>">
								<input type="hidden" name="nama" value="<?= $nama;?>">
								<p>Apakah Anda yakin mau menghapus data <b><?= $nama;?></b> ?</p>
							</div>
						</div>

				</div>
				<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
						<button class="btn btn-primary" type="submit"><span class="fa fa-trash"></span> Hapus</button>
				</div>
		</form>
		</div>
		</div>
</div>
<?php } ?>