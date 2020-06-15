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
        <h2><span class="fa fa-users"></span> Data Pelanggan</h2>
      </div>
      <?= $this->session->flashdata('msg'); ?>
    </section>

    <!-- BEGIN TABLE HOVER -->
    <section class="style-default-bright" style="margin-top:0px;">
      <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_pelanggan"><span
            class="fa fa-plus"></span> Tambah Pelanggan</a></p>
      <div class="section-body">
        <div class="row">

          <table class="table table-hover" id="datatable1">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Email</th>
                <th class="text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($data->result_array() as $table_content) {
                $no++ ?>
              <tr>
                <?php if (empty($photo)) : ?>
                <td><img style="width:40px;height:40px;" class="img-circle width-1"
                    src="<?= base_url() . 'assets/images/user_blank.png'; ?>" alt="" /></td>
                <?php else : ?>
                <td><img style="width:40px;height:40px;" class="img-circle width-1"
                    src="<?= base_url() . 'assets/images/' . $photo; ?>" alt="" /></td>
                <?php endif; ?>
                <td><?= $table_content['plg_nama']; ?></td>
                <?php if ($table_content['plg_jenkel'] == 'L') : ?>
                <td>Laki-Laki</td>
                <?php else : ?>
                <td>Perempuan</td>
                <?php endif; ?>
                <td><?= $table_content['plg_alamat']; ?></td>
                <td><?= $table_content['plg_notelp']; ?></td>
                <td><?= $table_content['plg_email']; ?></td>
                <td class="text-right">
                  <a href="#" class="btn btn-icon-toggle" title="Lihat Detail" data-toggle="modal"
                    data-target="#modal_edit_pelanggan<?= $table_content['plg_id']; ?>"><i class="fa fa-pencil"></i></a>

                  <a href="#" class="btn btn-icon-toggle" title="Hapus Pelanggan" data-toggle="modal"
                    data-target="#modal_hapus_pelanggan<?= $table_content['plg_id']; ?>"><i
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
    <!-- END TABLE HOVER -->



  </div>
  <!--end #content-->
  <!-- END CONTENT -->

</div>
<!--end #base-->
<!-- END BASE -->


<!-- ============ MODAL TAMBAH PELANGGAN =============== -->

<div class="modal fade" id="modal_add_pelanggan" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Pelanggan</h3>
      </div>
      <form class="form-horizontal" role="form" method="post"
        action="<?= base_url('admin/parameter/simpan_pelanggan'); ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" name="plg_nama" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              <select id="select13" name="plg_jenkel" class="form-control" required>
                <option value="">&nbsp;</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" name="plg_alamat" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password13" class="col-sm-3 control-label">Kontak</label>
            <div class="col-sm-8">
              <input name="plg_kontak" class="form-control" id="password13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password13" class="col-sm-3 control-label">E-Mail</label>
            <div class="col-sm-8">
              <input name="plg_email" class="form-control" id="password13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Whatsapp</label>
            <div class="col-sm-8">
              <input name="plg_whatsapp" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-8">
              <input type="password" name="plg_password" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Confirm Password</label>
            <div class="col-sm-8">
              <input type="password" name="plg_password2" class="form-control" id="regular13">
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



<!-- ============ MODAL EDIT PELANGGAN =============== -->
<?php
foreach ($data->result_array() as $table_content) {

?>
<div class="modal fade" id="modal_edit_pelanggan<?= $table_content['plg_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Detail Pelanggan</h3>
      </div>
      <form class="form-horizontal" role="form" method="post"
        action="<?= base_url('admin/parameter/simpan_pelanggan'); ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-8">
              <input type="hidden" name="plg_id" value="<?= $table_content['plg_id']; ?>">
              <input name="plg_nama" class="form-control" id="regular13" value="<?= $table_content['plg_nama'] ?>"
                required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              <select id="select13" name="plg_jenkel" class="form-control" required>
                <option value="">&nbsp;</option>
                <?php if ($table_content['plg_jenkel'] == 'L') : ?>
                <option value="L" selected>Laki-Laki</option>
                <option value="P">Perempuan</option>
                <?php else : ?>
                <option value="L">Laki-Laki</option>
                <option value="P" selected>Perempuan</option>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <input type="" name="plg_alamat" class="form-control" id="regular13"
                value="<?= $table_content['plg_alamat'] ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Kontak</label>
            <div class="col-sm-8">
              <input type="" name="plg_notelp" class="form-control" id="regular13"
                value="<?= $table_content['plg_notelp'] ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">E-Mail</label>
            <div class="col-sm-8">
              <input type="" name="plg_email" class="form-control" id="regular13"
                value="<?= $table_content['plg_email'] ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Whatsapp</label>
            <div class="col-sm-8">
              <input type="" name="plg_whatsapp" class="form-control" id="regular13"
                value="<?= $table_content['plg_whatsapp'] ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-8">
              <input type="password" name="plg_password" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Confirm Password</label>
            <div class="col-sm-8">
              <input type="password" name="plg_password2" class="form-control" id="regular13">
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
<?php } ?>

<!-- ============ MODAL HAPUS PELANGGAN =============== -->
<?php
foreach ($data->result_array() as $table_content) {

?>
<div class="modal fade" id="modal_hapus_pelanggan<?= $table_content['plg_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Hapus Pelanggan</h3>
      </div>
      <form class="form-horizontal" role="form" method="post"
        action="<?= base_url('admin/pelanggan/hapus_pelanggan'); ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-2 control-label"></label>
            <div class="col-sm-8">
              <input type="hidden" name="kode" value="<?= $table_content['plg_id']; ?>">
              <input type="hidden" name="nama" value="<?= $table_content['plg_nama']; ?>">
              <p>Apakah Anda yakin mau menghapus data <b><?= $table_content['plg_nama']; ?></b> ?</p>
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