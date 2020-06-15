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
        <h2><span class=" fa fa-map-marker"></span> Meja</h2>
      </div>
      <?= $this->session->flashdata('msg'); ?>


      <!-- BEGIN TABLE HOVER -->
      <section class="style-default-bright" style="margin-top:0px;">
        <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_meja"><span
              class="fa fa-plus"></span> Meja</a></p>
        <div class="section-body">
          <div class="row">

            <table class="table table-hover" id="datatable1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Meja</th>
                  <th>Lokasi</th>
                  <th>Lantai</th>
                  <th>Keterangan</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($data->result_array() as $table_content) {
                  $no++;
                ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $table_content['meja_nama']; ?></td>
                  <td><?= $table_content['area_nama']; ?></td>
                  <td><?= $table_content['area_level']; ?></td>
                  <td><?= $table_content['meja_ket']; ?></td>
                  <td class="text-right">
                    <a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal"
                      data-target="#modal_edit_meja<?= $table_content['meja_id']; ?>"><i class="fa fa-pencil"></i></a>
                    <a href="<?= base_url(); ?>admin/restaurant/hapus_meja/<?= $table_content['meja_id']; ?>"
                      onclick="return confirm('Apakah anda yakin?')" class="btn btn-icon-toggle" title="Delete row">
                      <i class="fa fa-trash-o text-danger"></i></a>
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

<!-- ============ MODAL ADD MEJA =============== -->

<div class="modal fade" id="modal_add_meja" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Meja</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/restaurant/simpan_meja'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Meja</label>
            <div class="col-sm-8">
              <input name="meja_nama" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Lantai - Area</label>
            <div class="col-sm-8">
              <select id="select13" name="meja_lokasi" class="form-control" required>
                <option value="">&nbsp;</option>
                <?php
                foreach ($data->result_array() as $table_content) { ?>
                <option value="<?= $table_content['area_id']; ?>">
                  <?= $table_content['area_level'] . ' - ' . $table_content['area_nama']; ?> </option>
                <?php }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Ket Meja</label>
            <div class="col-sm-8">
              <input name="meja_ket" class="form-control" id="regular13" required>
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


<!-- ============ MODAL EDIT MEJA =============== -->
<?php foreach ($data->result_array() as $table_content) : ?>
<div class="modal fade" id="modal_edit_meja<?= $table_content['meja_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Meja</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/restaurant/simpan_meja'); ?>"
        enctype="multipart/form-data">
        <input type="hidden" name="meja_id" value="<?= $table_content['meja_id']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Meja</label>
            <div class="col-sm-8">
              <input name="meja_nama" value="<?= $table_content['meja_nama']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Lantai - Area</label>
            <div class="col-sm-8">
              <select id="select13" name="meja_lokasi" class="form-control" required>
                <option value="">&nbsp;</option>
                <?php
                  foreach ($data->result_array() as $table_content) {
                    $m_id = $table_content['meja_lokasi'];
                    $a_id = $table_content['area_id'];
                    $a_nama = $table_content['area_nama'];
                    $a_level = $table_content['area_level'];
                    if ($m_id == $a_id)
                      echo "<option value='$a_id' selected>$a_level - $a_nama</option>";
                    else
                      echo "<option value='$a_id'>$a_level - $a_nama</option>";
                  }
                  ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Keterangan Meja</label>
            <div class="col-sm-8">
              <input name="meja_ket" value="<?= $table_content['meja_ket']; ?>" class="form-control" id="regular13"
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

<?php endforeach; ?>