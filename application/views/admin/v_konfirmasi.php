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
				<h2><span class="fa fa-exchange"></span> Data Konfirmasi</h2>
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
						<th>Tanggal</th>
						<th>Invoice</th>
						<th>Nama</th>
						<th>Bank</th>
						<th>Total Belanja</th>
						<th>Jumlah Transfer</th>
						<th>Bukti Transfer</th>	
						<th class="text-right">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$no=0;
					foreach ($data->result_array() as $a) {
						$no++;
						$id=$a['konfirmasi_id'];
						$invoice=$a['konfirmasi_invoice'];
						$nama=$a['konfirmasi_nama'];	
						$tanggal=$a['tanggal'];
						$bank=$a['konfirmasi_bank'];
						$jumlah=$a['konfirmasi_jumlah'];
						$total=$a['inv_total'];	
						$bukti=$a['konfirmasi_bukti'];
					
				?>
					<tr>
						<td><?= $tanggal;?></td>
						<td><?= $invoice;?></td>
						<td><?= $nama;?></td>
						<td><?= $bank;?></td>
						<td><?= number_format($total);?></td>
						<td><?= number_format($jumlah);?></td>
						<td><a href="<?= base_url().'assets/img/'.$bukti;?>" target="_blank">Lihat Bukti Transfer</a></td>
						<td class="text-right">
							<a href="#" class="btn btn-icon-toggle" title="Konfimasi Selesai" data-toggle="modal" data-target="#modal_edit_pengguna<?= $id;?>"><i class="fa fa-check"></i></a>
							<a href="#" class="btn btn-icon-toggle" title="Konfirmasi Batal" data-toggle="modal" data-target="#modal_hapus_pengguna<?= $id;?>"><i class="fa fa-close"></i></a>
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
		$id=$a['konfirmasi_id'];
						$invoice=$a['konfirmasi_invoice'];
						$nama=$a['konfirmasi_nama'];	
						$tanggal=$a['tanggal'];
						$bank=$a['konfirmasi_bank'];
						$jumlah=$a['konfirmasi_jumlah'];	
						$bukti=$a['konfirmasi_bukti'];
					
?>
<div class="modal fade" id="modal_edit_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Konfirmasi</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/konfirmasi/update_konfirmasi'?>" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="kode" value="<?= $id;?>">
					<input type="hidden" name="no_invoice" value="<?= $invoice;?>">
						
				<div class="alert alert-info">Apakah Anda yakin bukti transfer <b><?= $invoice?></b> ini Valid ?</div>
						
				</div>
				<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
						<button class="btn btn-primary" type="submit"> Ya</button>
				</div>
		</form>
		</div>
		</div>
</div>
<?php } ?>

<!-- ============ MODAL HAPUS PENGGUNA =============== -->
<?php 
	foreach ($data->result_array() as $a) {
		$id=$a['konfirmasi_id'];
						$invoice=$a['konfirmasi_invoice'];
						$nama=$a['konfirmasi_nama'];	
						$tanggal=$a['tanggal'];
						$bank=$a['konfirmasi_bank'];
						$jumlah=$a['konfirmasi_jumlah'];	
						$bukti=$a['konfirmasi_bukti'];
					
?>
<div class="modal fade" id="modal_hapus_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Konfirmasi</h3>
		</div>
		<form class="form-horizontal" role="form" method="post" action="<?= base_url().'admin/konfirmasi/hapus_konfirmasi'?>" enctype="multipart/form-data">
				<div class="modal-body">
				<div class="alert alert-danger">Apakah Anda yakin bahwa bukti tranfer <b><?= $invoice;?></b> tidak Valid ?</div>
						<div class="form-group">
							<label for="regular13" class="col-sm-2 control-label"></label>
							<div class="col-sm-8">
								<input type="hidden" name="kode" value="<?= $id;?>">
								<input type="hidden" name="no_invoice" value="<?= $invoice;?>">
								
							</div>
						</div>

				</div>
				<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
						<button class="btn btn-primary" type="submit"> Ya</button>
				</div>
		</form>
		</div>
		</div>
</div>
<?php } ?>
