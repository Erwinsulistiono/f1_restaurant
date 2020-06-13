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
					<h2><span class="fa fa-cart-arrow-down"></span> Data Order</h2>
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
							<th>No Invoice</th>
							<th>Tanggal</th>
							<th>Pelanggan</th>
							<th>Total</th>
							<th>Metode Pembayaran</th>
							<th>Status Order</th>	
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$no=0;
						foreach ($data->result_array() as $a) {
							$no++;
							$id=$a['inv_no'];
							$tanggal=$a['inv_tanggal'];
							$plg_id=$a['inv_plg_id'];
							$plg_nama=$a['inv_plg_nama'];
							$status=$a['inv_status'];
							$rek_id=$a['inv_rek_id'];
							$rek_bank=$a['inv_rek_bank'];
							$total=$a['inv_total'];	
						
					?>
						<tr>
							<td><?= $id;?></td>
							<td><?= $tanggal;?></td>
							<td><?= $plg_nama;?></td>
							<td><?= number_format($total);?></td>
							<?php if($rek_id=='COD'):?>
								<td><?= $rek_id;?></td>
							<?php else:?>
								<td><?= 'Transfer Bank '.$rek_bank;?></td>
							<?php endif;?>
							<td><?= $status;?></td>
							<td class="text-right">
								<a href="#" class="btn btn-icon-toggle" title="Update Status Order" data-toggle="modal" data-target="#modal_edit_pengguna<?= $id;?>"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-icon-toggle" title="Detail Order" data-toggle="modal" data-target="#modal_detail<?= $id;?>"><i class="fa fa-eye"></i></a>
								<a href="#" class="btn btn-icon-toggle" title="Batalkan Order" data-toggle="modal" data-target="#modal_hapus_pengguna<?= $id;?>"><i class="fa fa-close"></i></a>
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
			$id=$a['inv_no'];
			$tanggal=$a['inv_tanggal'];
			$plg_id=$a['inv_plg_id'];
			$plg_nama=$a['inv_plg_nama'];
			$status=$a['inv_status'];
			$rek_id=$a['inv_rek_id'];
			$total=$a['inv_total'];
			$rek_bank=$a['inv_rek_bank'];
						
	?>
	<div class="modal fade" id="modal_detail<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">#<?= $id;?></h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/order/update_order'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<div class="col-sm-12">
									<table>
										<tr>
											<td style="width:120px;">Tanggal</td>
											<td>:</td>
											<td><?= $tanggal;?></td>
										</tr>
										<tr>
											<td>Pelanggan</td>
											<td>:</td>
											<td><?= $plg_nama;?></td>
										</tr>
										<tr>
											<td>Status Order</td>
											<td>:</td>
											<td><?= $status;?></td>
										</tr>
										<?php if($rek_id=='COD'):?>
										<tr>
											<td>Pembayaran</td>
											<td>:</td>
											<td><?= $rek_id;?></td>
										</tr>
										<?php else:?>
										<tr>
											<td>Pembayaran</td>
											<td>:</td>
											<td><?= 'Transfer Bank '.$rek_bank;?></td>
										</tr>
										<?php endif;?>
									</table><br/>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Menu</th>
												<th style="text-align:center;">Harga</th>
												<th style="text-align:center;">Porsi</th>
												<th style="text-align:center;">Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$query=$this->db->query("SELECT * FROM tbl_detail WHERE detail_inv_no='$id'");
												foreach ($query->result_array() as $j) {
													$menu_nama=$j['detail_menu_nama'];
													$menu_harjul=$j['detail_harjul'];
													$menu_porsi=$j['detail_porsi'];
													$menu_subtotal=$j['detail_subtotal'];
												
											?>
											<tr>
												<td><?= $menu_nama;?></td>
												<td style="text-align:center;"><?= number_format($menu_harjul);?></td>
												<td style="text-align:center;"><?= $menu_porsi;?></td>
												<td style="text-align:center;"><?= number_format($menu_subtotal);?></td>
											</tr>
											<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="3">Total</td>
												<td style="text-align:center;"><?= number_format($total);?></td>
											</tr>
										</tfoot>
										
									</table>
								</div>
							</div>
							
							
					</div>
					<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
							<button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
					</div>
			</form>
			</div>
			</div>
	</div>
	<?php } ?>


	<!-- ============ MODAL EDIT PENGGUNA =============== -->
	<?php 
		foreach ($data->result_array() as $a) {
			$id=$a['inv_no'];
			$tanggal=$a['inv_tanggal'];
			$plg_id=$a['inv_plg_id'];
			$plg_nama=$a['inv_plg_nama'];
			$status=$a['inv_status'];
			$rek_id=$a['inv_rek_id'];
			$total=$a['inv_total'];

						
	?>
	<div class="modal fade" id="modal_edit_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Update Status Order</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/order/update_order'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="regular13" class="col-sm-3 control-label">Pilih</label>
								<input type="hidden" name="kode" value="<?= $id;?>">
								<div class="col-sm-8">
									<select name="status" class="form-control" id="regular13" required>
										<?php foreach ($stts->result_array() as $st) {
											$st_id=$st['status_id'];
											$st_nm=$st['status_nama'];
										?>
										<option value="<?= $st_nm;?>"><?= $st_nm;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							
							
					</div>
					<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
							<button class="btn btn-primary" type="submit"><span class="fa fa-edit"></span> Update</button>
					</div>
			</form>
			</div>
			</div>
	</div>
	<?php } ?>

	<!-- ============ MODAL HAPUS PENGGUNA =============== -->
	<?php 
		foreach ($data->result_array() as $a) {
			$id=$a['inv_no'];
			$tanggal=$a['inv_tanggal'];
			$plg_id=$a['inv_plg_id'];
			$plg_nama=$a['inv_plg_nama'];
			$status=$a['inv_status'];
			$rek_id=$a['inv_rek_id'];
			$total=$a['inv_total'];
						
	?>
	<div class="modal fade" id="modal_hapus_pengguna<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
			</div>
			<form class="form-horizontal" role="form" method="post" action="<?= base_url().'pos/order/hapus_order'?>" enctype="multipart/form-data">
					<div class="modal-body">
							<div class="form-group">
								<label for="regular13" class="col-sm-2 control-label"></label>
								<div class="col-sm-8">
									<input type="hidden" name="kode" value="<?= $id;?>">
									<p>Apakah Anda yakin mau menghapus data <b><?= $id;?></b> ?</p>
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