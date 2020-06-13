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
				<h2><span class="fa fa-list"></span> Data Kategori</h2>
		</div>
			<?= $this->session->flashdata('msg');?>

	<!-- BEGIN TABLE HOVER -->
	<section class="style-default-bright" style="margin-top:0px;">
		<p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_kategori"><span class="fa fa-plus"></span> Tambah Kategori</a></p>
		
		<div class="section-body">	
			<div class="row">
				
				<table class="table table-hover" id="datatable1">
				<thead>
					<tr>
						<th>No</th>
						<th>Kategori</th>	
						<th class="text-right">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=0;
					foreach ($data->result_array() as $table_content) {
						$no++;					
				?>
					<tr>
						<td><?= $no;?></td>
						<td><?= $table_content['kategori_nama'];?></td>
						<td class="text-right">
							<a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal" data-target="#modal_edit_kategori<?= $table_content['kategori_id'];?>"><i class="fa fa-pencil"></i></a>
							<a href="#" class="btn btn-icon-toggle" title="Delete row" data-toggle="modal" data-target="#modal_hapus_kategori<?= $table_content['kategori_id'];?>"><i class="fa fa-trash-o"></i></a>
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

<!-- ============ MODAL ADD PELANGGAN =============== -->
<div class="modal fade" id="modal_add_kategori" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Tambah Kategori</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/katalog/simpan_kategori_menu'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Kategori</label>
							<div class="col-sm-8">
								<input type="text" name="kategori_nama" class="form-control" id="regular13" required>
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
<div class="modal fade" id="modal_edit_kategori<?= $table_content['kategori_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/katalog/simpan_kategori_menu'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Kategori</label>
							<div class="col-sm-8">
								<input type="hidden" name="kategori_id" value="<?= $table_content['kategori_id'];?>">
								<input type="text" name="kategori_nama" value="<?= $table_content['kategori_nama'];?>" class="form-control" id="regular13" required>
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

<!-- ============ MODAL HAPUS KATEGORI =============== -->
<?php 
	foreach ($data->result_array() as $table_content) {
?>
<div class="modal fade" id="modal_hapus_kategori<?= $table_content['kategori_id'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/katalog/hapus_kategori_menu'); ?>" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="form-group">
							<label for="regular13" class="col-sm-2 control-label"></label>
							<div class="col-sm-8">
								<input type="hidden" name="kategori_id" value="<?= $table_content['kategori_id'];?>">
								<input type="hidden" name="kategori_nama" value="<?= $table_content['kategori_nama'];?>">
								<p>Apakah Anda yakin mau menghapus data <b><?= $table_content['kategori_nama'];?></b> ?</p>
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