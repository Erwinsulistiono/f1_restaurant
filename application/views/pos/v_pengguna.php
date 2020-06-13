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
					<h2><span class="fa fa-user"></span> Data Pengguna</h2>
			</div>
				<?= $this->session->flashdata('msg');?>
		</section>

		<!-- BEGIN TABLE HOVER -->
		<section class="style-default-bright" style="margin-top:0px;">
			<p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Pengguna</a></p>
			
			<div class="section-body">	
				<div class="row">
					
					<table class="table table-hover" id="datatable1">
					<thead>
						<tr>
							<th>Photo</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Username</th>
							<th>Password</th>
							<th>Email</th>
							<th>Kontak</th>
							<th>Status</th>
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($data->result_array() as $a) {
							$id=$a['pengguna_id'];
							$nama=$a['pengguna_nama'];
							$jenis_kelamin=$a['pengguna_jenkel'];
							$jenkel=$a['jenkel'];
							$username=$a['pengguna_username'];
							$password=$a['pengguna_password'];
							$email=$a['pengguna_email'];
							$nohp=$a['pengguna_nohp'];
							$status=$a['pengguna_status'];
							$level=$a['pengguna_level'];
							$photo=$a['pengguna_photo'];
						
					?>
						<tr>
							<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?= base_url().'assets/images/'.$photo;?>" alt="" /></td>
							<td><?= $nama;?></td>
							<td><?= $jenkel;?></td>
							<td><?= $username;?></td>
							<td><?= $password;?></td>
							<td><?= $email;?></td>
							<th><?= $nohp?></th>
							<?php if($status==1):?>
								<th>Aktif</th>
							<?php else:?>
								<th>Non Aktif</th>
							<?php endif;?>
							<td class="text-right">
								<a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?= $id;?>"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url().'pos/pengguna/reset_password/'.$id;?>" class="btn btn-icon-toggle" title="Reset Password"><i class="fa fa-refresh"></i></a>
								<a href="#" class="btn btn-icon-toggle" title="Delete row" data-toggle="modal" data-target="#modal_hapus_pengguna<?= $id;?>"><i class="fa fa-trash-o"></i></a>
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

	<!-- ============ MODAL ADD PELANGGAN =============== -->
	<div class="modal fade" id="modal_add_pengguna" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/pengguna/simpan_pengguna'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input type="text" name="nama" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-8">
									<select id="select13" name="jenkel" class="form-control" required>
										<option value="">&nbsp;</option>
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" name="username" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" name="password" class="form-control" id="password13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
								<div class="col-sm-8">
									<input type="password" name="password2" class="form-control" id="password13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-8">
									<input type="email" name="email" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
								<div class="col-sm-8">
									<input type="text" name="kontak" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Photo</label>
								<div class="col-sm-8">
									<input type="file" name="filefoto" class="form-control" id="regular13">
								</div>
							</div>
							
					</div>
					<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
							<button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
					</div>
			</form>
			</div>
			</div>
	</div>

	<!-- ============ MODAL EDIT PENGGUNA =============== -->
	<?php 
		foreach ($data->result_array() as $a) {
			$id=$a['pengguna_id'];
			$nama=$a['pengguna_nama'];
			$jenis_kelamin=$a['pengguna_jenkel'];
			$jenkel=$a['jenkel'];
			$username=$a['pengguna_username'];
			$password=$a['pengguna_password'];
			$email=$a['pengguna_email'];
			$nohp=$a['pengguna_nohp'];
			$status=$a['pengguna_status'];
			$level=$a['pengguna_level'];
			$photo=$a['pengguna_photo'];
						
	?>
	<div class="modal fade" id="modal_edit_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/pengguna/update_pengguna'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input type="hidden" name="kode" value="<?= $id;?>">
									<input type="text" name="nama" value="<?= $nama;?>" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-8">
									<select id="select13" name="jenkel" class="form-control" required>
										<option value="">&nbsp;</option>
										<?php if($jenis_kelamin=='L'):?>
											<option value="L" selected>Laki-Laki</option>
											<option value="P">Perempuan</option>
										<?php else:?>
											<option value="L">Laki-Laki</option>
											<option value="P" selected>Perempuan</option>
										<?php endif;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" name="username" value="<?= $username;?>" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" name="password" class="form-control" id="password13">
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
								<div class="col-sm-8">
									<input type="password" name="password2" class="form-control" id="password13">
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-8">
									<input type="email" name="email" class="form-control" value="<?= $email;?>" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
								<div class="col-sm-8">
									<input type="text" name="kontak" class="form-control" value="<?= $nohp;?>" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Photo</label>
								<div class="col-sm-8">
									<input type="file" name="filefoto" class="form-control" id="regular13">
								</div>
							</div>
							
					</div>
					<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
							<button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Edit</button>
					</div>
			</form>
			</div>
			</div>
	</div>
	<?php } ?>

	<!-- ============ MODAL HAPUS PENGGUNA =============== -->
	<?php 
		foreach ($data->result_array() as $a) {
			$id=$a['pengguna_id'];
			$nama=$a['pengguna_nama'];
			$jenis_kelamin=$a['pengguna_jenkel'];
			$jenkel=$a['jenkel'];
			$username=$a['pengguna_username'];
			$password=$a['pengguna_password'];
			$email=$a['pengguna_email'];
			$nohp=$a['pengguna_nohp'];
			$status=$a['pengguna_status'];
			$level=$a['pengguna_level'];
			$photo=$a['pengguna_photo'];
						
	?>
	<div class="modal fade" id="modal_hapus_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/pengguna/hapus_pengguna'?>" enctype="multipart/form-data">
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