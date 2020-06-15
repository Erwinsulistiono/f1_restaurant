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
        <h2><span class=" fa fa-map-marker"></span> Area</h2>
      </div>
      <?= $this->session->flashdata('msg'); ?>


      <!-- BEGIN TABLE HOVER -->
      <section class="style-default-bright" style="margin-top:0px;">
        <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_area"><span
              class="fa fa-plus"></span> Area</a></p>
        <div class="section-body">
          <div class="row">

            <table class="table table-hover" id="datatable1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Area</th>
                  <th>Lantai</th>
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
                  <td><?= $table_content['area_nama']; ?></td>
                  <td><?= $table_content['area_level']; ?></td>
                  <td class="text-right">
                    <a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal"
                      data-target="#modal_edit_area<?= $table_content['area_id']; ?>"><i class="fa fa-pencil"></i></a>
                    <a href="<?= base_url(); ?>admin/restaurant/hapus_area/<?= $table_content['area_id']; ?>"
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

<!-- ============ MODAL ADD TAX =============== -->

<div class="modal fade" id="modal_add_area" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Area</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/restaurant/simpan_area'); ?>"
        enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Area</label>
            <div class="col-sm-8">
              <input name="area_nama" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Lantai</label>
            <div class="col-sm-8">
              <input type="number" name="area_level" class="form-control" id="regular13" required>
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


<!-- ============ MODAL EDIT TAX =============== -->
<?php foreach ($data->result_array() as $table_content) : ?>
<div class="modal fade" id="modal_edit_area<?= $table_content['area_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Tax</h3>
      </div>
      <form class="form-horizontal" role="form" method="post" action="<?= base_url('admin/restaurant/simpan_area'); ?>"
        enctype="multipart/form-data">
        <input type="hidden" name="area_id" value="<?= $table_content['area_id']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Area</label>
            <div class="col-sm-8">
              <input name="area_nama" value="<?= $table_content['area_nama']; ?>" class="form-control" id="regular13"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Lantai</label>
            <div class="col-sm-8">
              <input name="area_level" value="<?= $table_content['area_level']; ?>" class="form-control" id="regular13"
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