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
							<th>Jabatan</th>
							<th>Email</th>
							<th>Kontak</th>
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($data->result_array() as $table_content) {
					?>
						<tr>
							<td><img style="width:40px;height:40px;" class="img-circle width-1" src="<?= base_url().'assets/images/'.$table_content['pengguna_photo'];?>" alt="" /></td>
							<td><?= $table_content['pengguna_nama']; ?></td>
							<td><?= $table_content['pengguna_jenkel']; ?></td>
							<td><?= $table_content['level_desc'] ; ?></td>
							<td><?= $table_content['pengguna_email']; ?></td>
							<th><?= $table_content['pengguna_nohp']; ?></th>
							<td class="text-right">
								<a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?= $table_content['pengguna_id']; ?>"><i class="fa fa-pencil"></i></a>
								<a href="<?= base_url().'admin/pengguna/reset_password/'.$table_content['pengguna_id'];?>" class="btn btn-icon-toggle" title="Reset Password"><i class="fa fa-refresh"></i></a>
								<a href="#" class="btn btn-icon-toggle" title="Delete row" data-toggle="modal" data-target="#modal_hapus_pengguna<?= $table_content['pengguna_id']; ?>"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>

					<?php } ?>
						
					</tbody>
					</table>

				</div>
			</div><!--end .section-body -->
			</section>
		</section>
		<!-- END TABLE HOVER -->

	</div><!--end #content-->
	<!-- END CONTENT -->

</div><!--end #base-->
<!-- END BASE -->

	<!-- ============ MODAL ADD PENGGUNA =============== -->
	<div class="modal fade" id="modal_add_pengguna" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Tambah Pengguna</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/pengguna/simpan_pengguna'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input type="text" name="pengguna_nama" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-8">
									<select id="select13" name="pengguna_jenkel" class="form-control" required>
										<option value="">&nbsp;</option>
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" name="pengguna_username" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="select13" class="col-sm-3 control-label">Jabatan</label>
								<div class="col-sm-8">
									<select id="select13" name="pengguna_level" class="form-control" required>
										<option value="">&nbsp;</option>
										<?php 
											foreach ($level->result_array() as $table_content) { ?>
												<option value="<?= $table_content['level_id']; ?>"> <?= $table_content['level_desc']; ?></option>
											<?php }
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" name="pengguna_password" class="form-control" id="password13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
								<div class="col-sm-8">
									<input type="password" name="pengguna_password2" class="form-control" id="password13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-8">
									<input type="email" name="pengguna_email" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
								<div class="col-sm-8">
									<input type="text" name="pengguna_nohp" class="form-control" id="regular13" required>
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
		foreach ($data->result_array() as $table_content) {
	?>
	<div class="modal fade" id="modal_edit_pengguna<?= $table_content['pengguna_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Edit Pengguna</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/pengguna/simpan_pengguna'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input type="hidden" name="pengguna_id" value="<?= $table_content['pengguna_id'];?>">
									<input type="text" name="pengguna_nama" value="<?= $table_content['pengguna_nama'];?>" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-8">
									<select id="select13" name="pengguna_jenkel" class="form-control" required>
										<option value="">&nbsp;</option>
										<?php if($table_content['pengguna_jenkel']=='L'):?>
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
									<input type="text" name="pengguna_username" value="<?= $table_content['pengguna_username'];?>" class="form-control" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="select13" class="col-sm-3 control-label">Jabatan</label>
								<div class="col-sm-8">
									<select id="select13" name="pengguna_level" class="form-control" required>
										<option value="">&nbsp;</option>
										<?php 
											foreach ($level->result_array() as $table_content_level) {
												$k_id=$table_content_level['level_id'];
												$k_nama=$table_content_level['level_desc'];
												if($table_content['pengguna_level']==$k_id)
													echo "<option value='$k_id' selected>$k_nama</option>";
												else
													echo "<option value='$k_id'>$k_nama</option>";
											}
										?>
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" name="pengguna_password" class="form-control" id="password13">
								</div>
							</div>
							<div class="form-group">
								<label for="password13" class="col-sm-3 control-label">Ulangi Password</label>
								<div class="col-sm-8">
									<input type="password" name="pengguna_password2" class="form-control" id="password13">
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-8">
									<input type="email" name="pengguna_email" class="form-control" value="<?= $table_content['pengguna_email'];?>" id="regular13" required>
								</div>
							</div>
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Kontak Person</label>
								<div class="col-sm-8">
									<input type="text" name="pengguna_nohp" class="form-control" value="<?= $table_content['pengguna_nohp'];?>" id="regular13" required>
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
		foreach ($data->result_array() as $table_content) {
	?>
	<div class="modal fade" id="modal_hapus_pengguna<?= $table_content['pengguna_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/pengguna/hapus_pengguna'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="regular13" class="col-sm-2 control-label"></label>
								<div class="col-sm-8">
									<input type="hidden" name="pengguna_id" value="<?= $table_content['pengguna_id'];?>">
									<input type="hidden" name="pengguna_nama" value="<?= $table_content['pengguna_nama'];?>">
									<p>Apakah Anda yakin mau menghapus data <b><?= $table_content['pengguna_nama'];?></b> ?</p>
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