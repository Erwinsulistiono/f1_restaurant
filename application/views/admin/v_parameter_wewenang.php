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
        <h2><span class="	fa fa-map-marker"></span> Data Wewenang Menu</h2>
    </div>
    <?= $this->session->flashdata('msg'); ?>

    <!-- BEGIN TABLE HOVER -->
    <section class="style-default-bright" style="margin-top:0px;">
      <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_wewenang"><span
        class="fa fa-plus"></span> Tambah Wewenang</a></p>
        <div class="section-body">
            <div class="row">
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
                            <tr>
                                <form name="form" method="post" action="<?= base_url().'admin/parameter/reset_wewenang/'.$table_content['level_id'].'/'.$table_content['level_desc'];?>">
                                    <td><?= $no; ?></td>
                                    <td><?= $table_content['level_desc']; ?></td>
                                    <td>
                                        <?php if ($table_content['parameter'] == 'Y') : ?>
                                            <?php $check = "checked"; else : $check = ""; endif;?>
                                            <input type="checkbox" name="wewenang[]" value="1" <?= $check?>>
                                        </td>
                                        <td>
                                            <?php if ($table_content['katalog'] == 'Y') : ?>
                                                <?php $check = "checked"; else : $check = ""; endif;?>
                                                <input type="checkbox" name="wewenang[]" value="2" <?= $check?>>
                                            </td>
                                            <td>
                                                <?php if ($table_content['pos'] == 'Y') : ?>
                                                    <?php $check = "checked"; else : $check = ""; endif;?>
                                                    <input type="checkbox" name="wewenang[]" value="3" <?= $check?>>
                                                </td>
                                                <td>
                                                    <?php if ($table_content['laporan'] == 'Y') : ?>
                                                        <?php $check = "checked"; else : $check = ""; endif;?>
                                                        <input type="checkbox" name="wewenang[]" value="4" <?= $check?>>
                                                    </td>
                                                    <td>
                                                        <?php if ($table_content['sistem'] == 'Y') : ?>
                                                            <?php $check = "checked"; else : $check = ""; endif;?>
                                                            <input type="checkbox" name="wewenang[]" value="5" <?= $check?>>
                                                        </td>
                                                        <td>
                                                            <?php if ($table_content['import_data'] == 'Y') : ?>
                                                                <?php $check = "checked"; else : $check = ""; endif;?>
                                                                <input type="checkbox" name="wewenang[]" value="6" <?= $check?>>
                                                            </td>
                                                            <td>
                                                                <?php if ($table_content['user'] == 'Y') : ?>
                                                                    <?php $check = "checked"; else : $check = ""; endif;?>
                                                                    <input type="checkbox" name="wewenang[]" value="7" <?= $check?>>
                                                                </td>
                                                                <td class="text-right">
                                                                    <button type="submit" name="submit-form" class="btn btn-icon-toggle" title="Update Permission">
                                                                        <i class='fa fa-refresh'></i>
                                                                    </button>
                                                                    <a href="<?= base_url() . '/admin/parameter/hapus_wewenang/'.$table_content['level_id'] ?>" class="btn btn-icon-toggle" title="Delete row"><i
                                                                    class="fa fa-trash-o text-danger"></i></a>
                                                                </td>
                                                            </form>
                                                        </tr>
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

                <!-- ============ MODAL ADD WEWENANG =============== -->
                <div class="modal fade" id="modal_add_wewenang" tabindex="-1" role="dialog" aria-labelledby="largeModal"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Wewenang</h3>
                    </div>
                    <form class="form-horizontal" role="form" name="form" method="post" action="<?= base_url().'admin/parameter/reset_wewenang';?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="regular13" class="col-sm-3 control-label">Deskripsi Jabatan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="level_desc" class="form-control" id="regular13" required>
                                </div>
                            </div>
                            <table class="table table-hover" id="datatable1">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Katalog</th>
                                        <th>POS</th>
                                        <th>Laporan</th>
                                        <th>Sistem</th>
                                        <th>Import Data</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="wewenang[]" value="1">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="wewenang[]" value="2">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="wewenang[]" value="3">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="wewenang[]" value="4">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="wewenang[]" value="5">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="wewenang[]" value="6">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="wewenang[]" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="modal-footer">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                          <button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>