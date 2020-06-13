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
        <h2><span class="	fa fa-map-marker"></span> Data Outlet</h2>
      </div>
      <?= $this->session->flashdata('msg'); ?>

    <!-- BEGIN TABLE HOVER -->
    <section class="style-default-bright" style="margin-top:0px;">
      <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_outlet"><span
            class="fa fa-plus"></span> Tambah Outlet</a></p>
      <div class="section-body">
        <div class="row">
            <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/parameter/simpan_outlet'); ?>"
            enctype="multipart/form-data">
            <table class="table table-hover" id="datatable1">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Parameter</th>
                    <th>Katalog</th>
                    <th>POS</th>
                    <th>Laporan</th>
                    <th>Sistem</th>
                    <th>Import Data</th>
                    <th>User</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $table_content) {
                    $no++ ?>
                <div class="form-group">
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $table_content['level_desc']; ?></td>
                        <td>
                            <div class="checkbox checkbox-styled">
                                <?php if ($table_content['parameter'] == 'Y') : ?>
                                    <input type="checkbox" value="Y" checked>
                                <?php else : ?>
                                    <input type="checkbox" value="Y">
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-styled">
                                <?php if ($table_content['katalog'] == 'Y') : ?>
                                    <input type="checkbox" value="Y" checked>
                                <?php else : ?>
                                    <input type="checkbox" value="Y">
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-styled">
                                <?php if ($table_content['pos'] == 'Y') : ?>
                                    <input type="checkbox" value="Y" checked>
                                <?php else : ?>
                                    <input type="checkbox" value="Y">
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-styled">
                                <?php if ($table_content['laporan'] == 'Y') : ?>
                                    <input type="checkbox" value="Y" checked>
                                <?php else : ?>
                                    <input type="checkbox" value="Y">
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-styled">
                                <?php if ($table_content['sistem'] == 'Y') : ?>
                                    <input type="checkbox" value="Y" checked>
                                <?php else : ?>
                                    <input type="checkbox" value="Y">
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-styled">
                                <?php if ($table_content['import_data'] == 'Y') : ?>
                                    <input type="checkbox" value="Y" checked>
                                <?php else : ?>
                                    <input type="checkbox" value="Y">
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>
                            <div class="checkbox checkbox-styled">
                                <?php if ($table_content['user'] == 'Y') : ?>
                                    <input type="checkbox" value="Y" checked>
                                <?php else : ?>
                                    <input type="checkbox" value="Y">
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="text-right">
                        <a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal"
                            data-target="#modal_edit_outlet<?= $table_content['level_id']; ?>"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-icon-toggle" title="Delete row" data-toggle="modal"
                            data-target="#modal_hapus_outlet<?= $table_content['level_id']; ?>"><i
                            class="fa fa-trash-o text-danger"></i></a>
                        </td>
                    </tr>
                </div>
                <?php } ?>
                </tbody>
            </table>
            </form>
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

<!-- ============ MODAL ADD OUTLET =============== -->
<div class="modal fade" id="modal_add_outlet" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Outlet</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/parameter/simpan_outlet'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Kode Outlet</label>
            <div class="col-sm-8">
              <input name="out_kode" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Outlet</label>
            <div class="col-sm-8">
              <input name="out_nama" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <input name="out_alamat" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Telepon</label>
            <div class="col-sm-8">
              <input name="out_telp" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-8">
              <input type="out_email" name="" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Person in Charge</label>
            <div class="col-sm-8">
              <input name="out_nm_pic" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Area</label>
            <div class="col-sm-8">
              <select id="select13" name="area_id" class="form-control" required>
                <option value="">&nbsp;</option>
                <option value="1">Jabodetabek</option>
                <option value="2">Lampung</option>
              </select>
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

<!-- ============ MODAL EDIT OUTLET =============== -->
<?php
foreach ($data->result_array() as $table_content) {

?>
<div class="modal fade" id="modal_edit_outlet<?= $table_content['out_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Outlet</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/parameter/simpan_outlet'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Kode Outlet</label>
            <div class="col-sm-8">
              <input type="hidden" name="out_id" value="<?= $table_content['out_id']; ?>">
              <input name="out_kode" value="<?= $table_content['out_kode']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Outlet</label>
            <div class="col-sm-8">
              <input name="out_nama" value="<?= $table_content['out_nama']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <input name="out_alamat" value="<?= $table_content['out_alamat']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Telp</label>
            <div class="col-sm-8">
              <input name="out_telp" value="<?= $table_content['out_telp']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">E-Mail</label>
            <div class="col-sm-8">
              <input name="out_email" value="<?= $table_content['out_email']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">PIC</label>
            <div class="col-sm-8">
              <input name="out_nm_pic" value="<?= $table_content['out_nm_pic']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Area</label>
            <div class="col-sm-8">
              <select id="select13" name="area_id" class="form-control" required>
                <option value="">&nbsp;</option>
                <?php if ($table_content['area_id'] == '1') : ?>
                <option value="1" selected>Jabodetabek</option>
                <option value="2">Lampung</option>
                <?php else : ?>
                <option value="1">Jabodetabek</option>
                <option value="2" selected>Lampung</option>
                <?php endif; ?>
              </select>
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

<!-- ============ MODAL HAPUS OUTLET =============== -->
<?php
foreach ($data->result_array() as $table_content) { ?>
<div class="modal fade" id="modal_hapus_outlet<?= $table_content['out_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Hapus Pengguna</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/parameter/hapus_outlet'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-2 control-label"></label>
            <div class="col-sm-8">
              <input type="hidden" name="out_id" value="<?= $table_content['out_id']; ?>">
              <input type="hidden" name="out_nama" value="<?= $table_content['out_nama']; ?>">
              <h4 class="text-light no-margin">Apakah Anda yakin mau menghapus data outlet
                <b><?= $table_content['out_nama']; ?></b>
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