<!-- BEGIN BASE-->
<div id="base">

  <!-- BEGIN OFFCANVAS LEFT -->
  <div class="offcanvas">

  </div>
  <!--end .offcanvas-->
  <!-- END OFFCANVAS LEFT -->

  <!-- BEGIN CONTENT-->
  <div id="content">
    <section>
      <div class="section-header">
        <h2><span class="	fa fa-map-marker"></span> Data Kupon</h2>
      </div>
      <?= $this->session->flashdata('msg'); ?>

    <!-- BEGIN TABLE HOVER -->
    <section class="style-default-bright" style="margin-top:0px;">
      <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_kupon"><span
            class="fa fa-plus"></span> Tambah Kupon</a></p>
      <div class="section-body">
        <div class="row">
          <table class="table table-hover" id="datatable1">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Nominal Discount</th>
                <th>% Discount</th>
                <th>Periode</th>
                <th>limit</th>
                <th>T&C</th>
                <th class="text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($data->result_array() as $table_content) {
                $no++ ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $table_content['kupon_kode']; ?></td>
                <td><?= $table_content['kupon_nama']; ?></td>
                <td><?= number_format($table_content['kupon_nominal']); ?></td>
                <td><?= $table_content['kupon_discount']. '%'; ?></td>
                <td><?= $table_content['kupon_periode_awal'] . ' - ' .$table_content['kupon_periode_akhir']; ?></td>
                <td><?= $table_content['kupon_limit']; ?></td>
                <td><?= $table_content['kupon_syarat']; ?></td>
                <td class="text-right">
                  <a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal"
                    data-target="#modal_edit_kupon<?= $table_content['kupon_id']; ?>"><i class="fa fa-pencil"></i></a>
                  <a href="#" class="btn btn-icon-toggle" title="Delete row" data-toggle="modal"
                    data-target="#modal_hapus_kupon<?= $table_content['kupon_id']; ?>"><i
                      class="fa fa-trash-o text-danger"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
      <!--end .section-body -->
    </section>
    </section>
    <!-- END TABLE HOVER -->

  </div>
  <!--end #content-->
  <!-- END CONTENT -->

</div>
<!--end #base-->
<!-- END BASE -->

<!-- ============ MODAL ADD KUPON =============== -->
<div class="modal fade" id="modal_add_kupon" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Kupon</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/katalog/simpan_kupon'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Kode Kupon</label>
            <div class="col-sm-8">
              <input name="kupon_kode" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Kupon</label>
            <div class="col-sm-8">
              <input name="kupon_nama" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Diskon</label>
            <div class="col-sm-8">
              <input name="kupon_diskon" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Jenis Diskon</label>
            <div class="col-sm-8">
              <select id="select13" name="jenis_diskon" class="form-control" required>
                <option value="">&nbsp;</option>
                <option value="discount">Persentase Pembelian</option>
                <option value="nominal">Pemotongan Nominal</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="demo-date" class="col-sm-3 control-label">Periode</label>
            <div class="col-sm-8">
              <div class="input-group input-daterange">          
                <input type="text" name="kupon_periode_awal" class="datepicker input-group date form-control" id="demo-date-range">
                  <span class="input-group-addon">to</span>
                <input type="text" name="kupon_periode_akhir" class="datepicker input-group date form-control" id="demo-date-range">
                  <span class="input-group-addon"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Limit Kupon</label>
            <div class="col-sm-8">
              <input name="kupon_limit" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Syarat T&C</label>
            <div class="col-sm-8">
              <input name="kupon_syarat" class="form-control" id="regular13"
                required>
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

<!-- ============ MODAL EDIT KUPON =============== -->
<?php
foreach ($data->result_array() as $table_content) {

?>
<div class="modal fade" id="modal_edit_kupon<?= $table_content['kupon_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Kupon</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/katalog/simpan_kupon'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Kode Kupon</label>
            <div class="col-sm-8">
              <input type="hidden" name="kupon_id" value="<?= $table_content['kupon_id']; ?>">
              <input name="kupon_kode" value="<?= $table_content['kupon_kode']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Kupon</label>
            <div class="col-sm-8">
              <input name="kupon_nama" value="<?= $table_content['kupon_nama']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Diskon</label>
            <div class="col-sm-8">
              <?php if ($table_content['kupon_nominal'] !== '0') : ?>
                <input name="kupon_diskon" value="<?= $table_content['kupon_nominal']; ?>" class="form-control" id="regular13"
                required>  
              <?php else : ?>
                <input name="kupon_diskon" value="<?= $table_content['kupon_discount']; ?>" class="form-control" id="regular13"
                required>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Jenis Diskon</label>
            <div class="col-sm-8">
              <select id="select13" name="jenis_diskon" class="form-control" required>
                <option value="">&nbsp;</option>
                <?php if ($table_content['kupon_nominal'] !== '0') : ?>
                <option value="nominal" selected>Pemotongan Nominal</option>
                <option value="discount">Presentase Pembelian</option>
                <?php else : ?>
                <option value="nominal">Pemotongan Nominal</option>
                <option value="discount" selected>Presentase Pembelian</option>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="demo-date" class="col-sm-3 control-label">Periode</label>
            <div class="col-sm-8">
              <div class="input-group input-daterange">          
                  <input type="" name="kupon_periode_awal" value="<?= $table_content['kupon_periode_awal']; ?>" class="datepicker date form-control" id="demo-date-range">
                  <span class="input-group-addon">to</span>
                  <input type="" name="kupon_periode_akhir" value="<?= $table_content['kupon_periode_akhir']; ?>" class="datepicker date form-control" id="demo-date-range">
                  <span class="input-group-addon"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Limit Kupon</label>
            <div class="col-sm-8">
              <input name="kupon_limit" value="<?= $table_content['kupon_limit']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Syarat T&C</label>
            <div class="col-sm-8">
              <input name="kupon_syarat" value="<?= $table_content['kupon_syarat']; ?>" class="form-control" id="regular13"
                required>
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

<!-- ============ MODAL HAPUS KUPON =============== -->
<?php
foreach ($data->result_array() as $table_content) { ?>
<div class="modal fade" id="modal_hapus_kupon<?= $table_content['kupon_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Hapus Kupon</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/katalog/hapus_kupon'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-2 control-label"></label>
            <div class="col-sm-8">
              <input type="hidden" name="kupon_id" value="<?= $table_content['kupon_id']; ?>">
              <input type="hidden" name="kupon_nama" value="<?= $table_content['kupon_nama']; ?>">
              <h4 class="text-light no-margin">Apakah Anda yakin mau menghapus Kupon
                <b><?= $table_content['kupon_nama']; ?></b>
                ?</h4>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span> Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>