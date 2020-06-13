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
        <h2><span class="fa fa-user"></span> Profil</h2>
        <?= $this->session->flashdata('msg'); ?>

      </div>


      <br>
      <div class="section-body">
        <div class="card">
          <!-- BEGIN CONTACT DETAILS -->
          <div class="card-tiles">
            <div class="hbox-md col-md-12">
              <div class="hbox-column col-md-4  style-default-light">
                <div class="row">

                  <!-- BEGIN CONTACTS MAIN CONTENT -->
                  <div class="col-xs-12">
                    <div class="text-center">
                      <img class="img-circle size-3" src="<?= base_url() . 'assets/images/user_blank.png' ?>"
                        alt="user" />
                      <div>
                        <br>
                        <h1 class="text-light no-margin"><?= $this->session->userdata('user_nama') ?></h1>
                        <h5>
                          Administrator
                        </h5>
                      </div>
                    </div>
                    <!--end .tab-content -->
                  </div>
                  <!--end .col -->


                </div>
                <!--end .row -->
              </div>
              <!--end .hbox-column -->

              <!-- BEGIN CONTACTS COMMON DETAILS -->
              <div class="hbox-column col-md-9">
                <div class="row">
                  <div class="card-body">
                    <br />
                    <form class="form" action="<?= base_url('admin/profile/update'); ?>" method="post">
                      <div class="form-group">
                        <input class="form-control" name="username" id="pengguna_username"
                          value="<?= $this->session->userdata('pengguna_username') ?>">
                        <label for="pengguna_username">Username</label>
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="pengguna_email"
                          value="<?= $this->session->userdata('pengguna_email') ?>">
                        <label for="pengguna_email">E-Mail</label>
                      </div>
                      <div class="form-group">
                        <input class="form-control" name="kontak" id="pengguna_nohp"
                          value="<?= $this->session->userdata('pengguna_nohp') ?>">
                        <label for="pengguna_nohp">Contact Person</label>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <label for="labelfile">Foto</label>
                          <input type="file" name="filefoto" class="form-control" id="labelfile">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="password" class="form-control" name="password" id="pengguna_password">
                            <label for="pengguna_password">Password</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input type="password" class="form-control" name="password2" id="pengguna_password_conf">
                            <label for="pengguna_password_conf">Confirm Password</label>
                          </div>
                        </div>
                      </div>
                      <div class="card-actionbar">
                        <div class="card-actionbar-row">
                          <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update account</button>
                        </div>
                      </div>

                  </div>
                  <!--end .col -->
                </div>
                <!--end .row -->
              </div>
              <!--end .hbox-column -->
              <!-- END CONTACTS COMMON DETAILS -->

            </div>
            <!--end .hbox-md -->
            </form>
          </div>
          <!--end .card-tiles -->
          <!-- END CONTACT DETAILS -->

        </div>
        <!--end .card -->
      </div>
      <!--end .section-body -->
    </section>

  </div>
  <!--end #content-->
  <!-- END CONTENT -->
</div>
<!--end #base-->
<!-- END BASE -->