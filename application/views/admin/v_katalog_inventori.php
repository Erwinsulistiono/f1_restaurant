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
        <h2><span class=" fa fa-map-marker"></span> Inventori</h2>
      </div>
      <?= $this->session->flashdata('msg'); ?>

      <!-- BEGIN TABLE HOVER -->
      <section class="style-default-bright" style="margin-top:0px;">
        <p><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_stock"><span
              class="fa fa-plus"></span> Stock</a></p>
        <div class="section-body">
          <div class="row">

            <table class="table table-hover" id="datatable1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>QTY</th>
                  <th>Satuan</th>
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
                  <td><?= $table_content['kd_brg']; ?></td>
                  <td><?= $table_content['nm_brg']; ?></td>
                  <td><?php if ($table_content['kd_kategori'] == 1) {
                          echo 'Makanan';
                        } elseif ($table_content['kd_kategori'] == 2) {
                          echo 'Minuman';
                        } elseif ($table_content['kd_kategori'] == 3) {
                          echo 'Dessert';
                        } elseif ($table_content['kd_kategori'] == 4) {
                          echo 'Bahan Baku';
                        } elseif ($table_content['kd_kategori'] == 5) {
                          echo 'Bumbu';
                        } else {
                          echo 'Bumbu Masakan';
                        }
                        ?>
                  </td>
                  <td><?= $table_content['stok_brg']; ?></td>
                  <td><?php if ($table_content['satuan_brg'] == 1) {
                          echo 'PCS';
                        } else {
                          echo 'KG';
                        }
                        ?>
                  </td>
                  <td class="text-right">
                    <a href="#" class="btn btn-icon-toggle" title="Edit row" data-toggle="modal"
                      data-target="#modal_edit_stok<?= $table_content['row_id_brg']; ?>"><i
                        class="fa fa-pencil"></i></a>
                    <a href="<?= base_url(); ?>admin/katalog/hapus_inventori/<?= $table_content['row_id_brg']; ?>"
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

<!-- ============ MODAL ADD STOCK =============== -->
<div class="modal fade" id="modal_add_stock" tabindex="-1" role="dialog" aria-labelledby="largeModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Stock</h3>
      </div>
      <form class="form-horizontal" role="form" method="post"
        action="<?= base_url('admin/katalog/simpan_inventori'); ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Kode Barang</label>
            <div class="col-sm-8">
              <input name="kd_brg" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Barang</label>
            <div class="col-sm-8">
              <input name="nm_brg" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Kategori</label>
            <div class="col-sm-8">
              <select id="select13" name="kd_kategori" class="form-control" required>
                <option value="">&nbsp;</option>
                <option value="1">Makanan</option>
                <option value="2">Minumanan</option>
                <option value="3">Dessert</option>
                <option value="4">Bahan Baku</option>
                <option value="5">Bumbu</option>
                <option value="7">Bumbu Masakan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Stock</label>
            <div class="col-sm-8">
              <input name="stok_brg" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Satuan</label>
            <div class="col-sm-8">
              <select id="select13" name="satuan_brg" class="form-control" required>
                <option value="">&nbsp;</option>
                <option value="1">PCS</option>
                <option value="2">KG</option>
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


<!-- ============ MODAL EDIT STOCK =============== -->
<?php foreach ($data->result_array as $all) {

?>
<div class="modal fade" id="modal_edit_stok<?= $all['row_id_brg']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Stock</h3>
      </div>
      <form class="form-horizontal" role="form" method="post"
        action="<?= base_url('admin/katalog/simpan_inventori'); ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Kode Barang</label>
            <div class="col-sm-8">
              <input type="hidden" name="row_id_brg" value="<?= $all['row_id_brg']; ?>">
              <input name="kd_brg" value="<?= $all['kd_brg']; ?>" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Nama Barang</label>
            <div class="col-sm-8">
              <input name="nm_brg" value="<?= $all['nm_brg']; ?>" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Kategori</label>
            <div class="col-sm-8">
              <select id="select13" name="kd_kategori" class="form-control" required>
                <option value="">&nbsp;</option>
                <?php if ($all['kd_kategori'] == 1) : ?>
                <option value="1" selected>Makanan</option>
                <option value="2">Minumanan</option>
                <option value="3">Dessert</option>
                <option value="4">Bahan Baku</option>
                <option value="5">Bumbu</option>
                <option value="7">Bumbu Masakan</option>
                <?php elseif ($all['kd_kategori'] == 2) : ?>
                <option value="1">Makanan</option>
                <option value="2" selected>Minumanan</option>
                <option value="3">Dessert</option>
                <option value="4">Bahan Baku</option>
                <option value="5">Bumbu</option>
                <option value="7">Bumbu Masakan</option>
                <?php elseif ($all['kd_kategori'] == 3) : ?>
                <option value="1">Makanan</option>
                <option value="2">Minumanan</option>
                <option value="3" selected>Dessert</option>
                <option value="4">Bahan Baku</option>
                <option value="5">Bumbu</option>
                <option value="7">Bumbu Masakan</option>
                <?php elseif ($all['kd_kategori'] == 4) : ?>
                <option value="1">Makanan</option>
                <option value="2">Minumanan</option>
                <option value="3">Dessert</option>
                <option value="4" selected>Bahan Baku</option>
                <option value="5">Bumbu</option>
                <option value="7">Bumbu Masakan</option>
                <?php elseif ($all['kd_kategori'] == 5) : ?>
                <option value="1">Makanan</option>
                <option value="2">Minumanan</option>
                <option value="3">Dessert</option>
                <option value="4">Bahan Baku</option>
                <option value="5" selected>Bumbu</option>
                <option value="7">Bumbu Masakan</option>
                <?php else : ?>
                <option value="1">Makanan</option>
                <option value="2">Minumanan</option>
                <option value="3">Dessert</option>
                <option value="4">Bahan Baku</option>
                <option value="5">Bumbu</option>
                <option value="7" selected>Bumbu Masakan</option>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="regular13" class="col-sm-3 control-label">Stok</label>
            <div class="col-sm-8">
              <input name="stok_brg" value="<?= $all['stok_brg']; ?>" class="form-control" id="regular13" required>
            </div>
          </div>
          <div class="form-group">
            <label for="select13" class="col-sm-3 control-label">Satuan</label>
            <div class="col-sm-8">
              <select id="select13" name="satuan_brg" class="form-control" required>
                <option value="">&nbsp;</option>
                <?php if ($all['satuan_brg'] == 1) : ?>
                <option value="1" selected>PCS</option>
                <option value="2">KG</option>
                <?php else : ?>
                <option value="1">PCS</option>
                <option value="2" selected>KG</option>
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