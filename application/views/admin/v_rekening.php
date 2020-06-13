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
				<h2><span class="fa fa-credit-card"></span> Data Rekening</h2>
		</div>
			<?= $this->session->flashdata('msg');?>
	</section>

	<!-- BEGIN TABLE HOVER -->
	<section class="style-default-bright" style="margin-top:0px;">
		<p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pengguna"><span class="fa fa-plus"></span> Tambah Rekening</a></p>
		
		<div class="section-body">	
			<div class="row">
				
				<table class="table table-hover" id="datatable1">
				<thead>
					<tr>
						<th>Logo</th>
						<th>No Rekening</th>
						<th>Bank</th>
						<th>Atas Nama</th>
						<th>Cabang</th>
						<th class="text-right">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($data->result_array() as $a) {
						$id=$a['rek_id'];
						$norek=$a['rek_no'];
						$nama=$a['rek_nama'];
						$bank=$a['rek_bank'];
						$cabang=$a['rek_cabang'];
						$logo=$a['rek_logo'];
					
				?>
					<tr>
						<td><img style="width:100px;height:90px;"  src="<?= base_url().'assets/img/'.$logo;?>" alt="" /></td>
						<td><?= $norek;?></td>
						<td><?= $bank;?></td>
						<td><?= $nama;?></td>
						<td><?= $cabang;?></td>
						
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
				<h3 class="modal-title" id="myModalLabel">Tambah Rekening</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/rekening/simpan_rekening'?>" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">No Rekening</label>
							<div class="col-sm-8">
								<input type="text" name="norek" class="form-control" id="regular13" required>
							</div>
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Bank</label>
							<div class="col-sm-8">
								<input type="text" name="bank" class="form-control" id="regular13" required>
							</div>
						</div>

						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Atas Nama</label>
							<div class="col-sm-8">
								<input type="text" name="nama" class="form-control" id="regular13" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Cabang</label>
							<div class="col-sm-8">
								<input type="text" name="cabang" class="form-control" id="regular13">
							</div>
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Photo</label>
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
		$id=$a['rek_id'];
		$norek=$a['rek_no'];
		$nama=$a['rek_nama'];
		$bank=$a['rek_bank'];
		$cabang=$a['rek_cabang'];
		$logo=$a['rek_logo'];
					
?>
<div class="modal fade" id="modal_edit_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Edit Rekening</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/rekening/update_rekening'?>" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">No Rekening</label>
							<div class="col-sm-8">
								<input type="hidden" value="<?= $id;?>" name="kode">
								<input type="text" name="norek" value="<?= $norek?>" class="form-control" id="regular13" required>
							</div>
						</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Bank</label>
							<div class="col-sm-8">
								<input type="text" name="bank" value="<?= $bank?>" class="form-control" id="regular13" required>
							</div>
						</div>


						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Atas Nama</label>
							<div class="col-sm-8">
								<input type="text" name="nama" value="<?= $nama?>" class="form-control" id="regular13" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="regular13" class="col-sm-3 control-label">Cabang</label>
							<div class="col-sm-8">
								<input type="text" name="cabang" value="<?= $cabang?>" class="form-control" id="regular13">
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
		$id=$a['rek_id'];
		$norek=$a['rek_no'];
		$nama=$a['rek_nama'];
		$bank=$a['rek_bank'];
		$cabang=$a['rek_cabang'];
		$logo=$a['rek_logo'];
					
?>
<div class="modal fade" id="modal_hapus_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Rekening</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/rekening/hapus_rekening'?>" enctype="multipart/form-data">
				<div class="modal-body">
						<div class="form-group">
							<label for="regular13" class="col-sm-2 control-label"></label>
							<div class="col-sm-8">
								<input type="hidden" name="kode" value="<?= $id;?>">
								<input type="hidden" name="nama" value="<?= $norek;?>">
								<p>Apakah Anda yakin mau menghapus data <b><?= $norek;?></b> ?</p>
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