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
						<h2><span class="fa fa-image"></span> Data Gallery</h2>
				</div>
					<?= $this->session->flashdata('msg');?>
			</section>

			<!-- BEGIN TABLE HOVER -->
			<section class="style-default-bright" style="margin-top:0px;">
				<p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Gallery</a></p>
				
				<div class="section-body">	
					<div class="row">
						
						<table class="table table-hover" id="datatable1">
						<thead>
							<tr>
								<th>Gambar</th>
								<th>Judul</th>
								<th>Deskripsi</th>
								<th class="text-right">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no=0;
							foreach ($data->result_array() as $a) {
								$no++;
								$id=$a['galeri_id'];
								$judul=$a['galeri_judul'];	
								$deskripsi=$a['galeri_deskripsi'];
								$gambar=$a['galeri_gambar'];
							
						?>
							<tr>
								<td><img style="width:80px;height:80px;" class="img-thumbnail width-1" src="<?= base_url().'assets/galeries/'.$gambar;?>" alt="" /></td>
								<td><?= $judul;?></td>
								<td><?= limit_words($deskripsi,10).'...';?></td>
								<td class="text-right">
									<a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal" data-target="#modal_edit_pengguna<?= $id;?>"><i class="fa fa-pencil"></i></a>
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
						<h3 class="modal-title" id="myModalLabel">Tambah Gallery</h3>
				</div>
				<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/gallery/simpan_gallery'?>" enctype="multipart/form-data">
						<div class="modal-body">
								<div class="form-group">
									<label for="regular13" class="col-sm-3 control-label">Judul</label>
									<div class="col-sm-8">
										<input type="text" name="judul" class="form-control" id="regular13" required>
									</div>
								</div>

								<div class="form-group">
									<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
									<div class="col-sm-8">
										<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label for="regular13" class="col-sm-3 control-label">Gambar</label>
									<div class="col-sm-8">
										<input type="file" name="filefoto" class="form-control" id="regular13" required>
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
				$id=$a['galeri_id'];
				$judul=$a['galeri_judul'];	
				$deskripsi=$a['galeri_deskripsi'];
				$gambar=$a['galeri_gambar'];
							
		?>
		<div class="modal fade" id="modal_edit_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 class="modal-title" id="myModalLabel">Edit Gallery</h3>
				</div>
				<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/gallery/update_gallery'?>" enctype="multipart/form-data">
						<div class="modal-body">
								<div class="form-group">
									<label for="regular13" class="col-sm-3 control-label">Judul</label>
									<div class="col-sm-8">
										<input type="hidden" name="kode" value="<?= $id;?>">
										<input type="text" name="judul" value="<?= $judul?>" class="form-control" id="regular13" required>
									</div>
								</div>

								<div class="form-group">
									<label for="textarea13" class="col-sm-3 control-label">Deskripsi</label>
									<div class="col-sm-8">
										<textarea name="deskripsi" id="textarea13" class="form-control" rows="3" placeholder="" required><?= $deskripsi;?></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label for="regular13" class="col-sm-3 control-label">Gambar</label>
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
				$id=$a['galeri_id'];
				$judul=$a['galeri_judul'];	
				$deskripsi=$a['galeri_deskripsi'];
				$gambar=$a['galeri_gambar'];
							
		?>
		<div class="modal fade" id="modal_hapus_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 class="modal-title" id="myModalLabel">Hapus Gallery</h3>
				</div>
				<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/gallery/hapus_gallery'?>" enctype="multipart/form-data">
						<div class="modal-body">
								<div class="form-group">
									<label for="regular13" class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
										<input type="hidden" name="kode" value="<?= $id;?>">
										<input type="hidden" name="nama" value="<?= $judul;?>">
										<p>Apakah Anda yakin mau menghapus data <b><?= $judul;?></b> ?</p>
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