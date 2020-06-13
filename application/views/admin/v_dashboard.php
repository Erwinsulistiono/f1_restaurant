
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
      <div class="section-body">
        <div class="row">
          <?= $this->session->flashdata('msg'); ?>
          <?php
					$l = $pen_last->row_array();
					?>
          <!-- BEGIN ALERT - REVENUE -->
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <div class="card-body no-padding">
                <div class="alert alert-callout alert-info no-margin">
                  <strong class="pull-right text-success text-lg"> <i class="fa fa-bar-chart"></i></strong>
                  <strong class="text-xl"><?= 'Rp ' . number_format($l['total_penjualan']); ?></strong><br />
                  <span class="opacity-50">Penjualan Bulan Sebelumnya</span>
                  <div class="stick-bottom-left-right">
                    <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                  </div>
                </div>
              </div>
              <!--end .card-body -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END ALERT - REVENUE -->
          <?php
					$c = $pen_now->row_array();
					?>
          <!-- BEGIN ALERT - VISITS -->
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <div class="card-body no-padding">
                <div class="alert alert-callout alert-warning no-margin">
                  <strong class="pull-right text-warning text-lg"> <i class="fa fa-line-chart"></i></strong>
                  <strong class="text-xl"><?= 'Rp ' . number_format($c['total_penjualan']); ?></strong><br />
                  <span class="opacity-50">Penjualan Bulan Ini</span>
                  <div class="stick-bottom-right">
                    <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                  </div>
                </div>
              </div>
              <!--end .card-body -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END ALERT - VISITS -->
          <?php
					$p = $tot_porsi->row_array();
					?>
          <!-- BEGIN ALERT - BOUNCE RATES -->
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <div class="card-body no-padding">
                <div class="alert alert-callout alert-danger no-margin">
                  <strong class="pull-right text-danger text-lg"> <i class="fa fa-cubes"></i></strong>
                  <strong class="text-xl"><?= $p['total_porsi']; ?></strong><br />
                  <span class="opacity-50">Total Porsi Terjual Bulan Ini</span>
                  <div class="stick-bottom-right">
                    <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                  </div>
                </div>
              </div>
              <!--end .card-body -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END ALERT - BOUNCE RATES -->
          <?php
					$t = $tot_plg->row_array();
					?>
          <!-- BEGIN ALERT - TIME ON SITE -->
          <div class="col-md-3 col-sm-6">
            <div class="card">
              <div class="card-body no-padding">
                <div class="alert alert-callout alert-success no-margin">
                  <h1 class="pull-right text-success"><i class="fa fa-users"></i></h1>
                  <strong class="text-xl"><?= $t['tot_pelanggan'] ?></strong><br />
                  <span class="opacity-50">Total Pelanggan</span>
                </div>
              </div>
              <!--end .card-body -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END ALERT - TIME ON SITE -->

        </div>
        <!--end .row -->
        <div class="row">

          <?php
					/* Mengambil query report*/
					error_reporting(0);
					foreach ($statistik as $result) {
						$bulan[] = $result->tanggal; //ambil bulan
						$value[] = (float) $result->total; //ambil nilai
					}
					/* end mengambil query*/

					?>

          <!-- BEGIN SITE ACTIVITY -->
          <div class="col-md-12">
            <div class="card ">
              <div class="row">
                <div class="col-md-12">
                  <div class="card-head">
                    <header>Statistik Penjualan</header>
                  </div>
                  <!--end .card-head -->
                  <div class="card-body height-8">
                    <div class="flot-legend-horizontal stick-top-right no-y-padding">
                      <canvas id="canvas" width="1200" height="300"></canvas>
                    </div>
                  </div>
                  <!--end .card-body -->
                </div>
                <!--end .col -->

              </div>
              <!--end .row -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END SITE ACTIVITY -->



        </div>
        <!--end .row -->
        <div class="row">

          <!-- BEGIN TODOS -->
          <div class="col-md-3">
            <div class="card ">
              <div class="card-head">
                <header>Orders Terbaru</header>
                <div class="tools">
                  <a class="btn btn-icon-toggle btn-close"><i class="fa fa-close"></i></a>
                </div>
              </div>
              <!--end .card-head -->
              <div class="card-body no-padding height-9 scroll">
                <ul class="list" data-sortable="true">
                  <?php
									foreach ($odr->result_array() as $o) {
										$oid = $o['inv_no'];
										$otgl = $o['inv_tanggal'];
										$oplg = $o['inv_plg_nama'];
									?>
                  <li class="tile">
                    <div class="checkbox checkbox-styled tile-text">
                      <label>
                        <span>
                          <?= $oid; ?>
                          <small><?= $otgl . '<br/>' . $oplg; ?></small>
                        </span>
                      </label>
                    </div>
                    <a class="btn btn-flat ink-reaction btn-default" href="<?= base_url() . 'admin/order' ?>">
                      <i class="fa fa-arrow-right"></i>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <!--end .card-body -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END TODOS -->
          <?php
					/* Mengambil query report*/
					error_reporting(0);
					foreach ($statistikplg as $result) {
						$bln[] = $result->bulan; //ambil bulan
						$val[] = (float) $result->total; //ambil nilai
					}
					/* end mengambil query*/

					?>
          <!-- BEGIN REGISTRATION HISTORY -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-head">
                <header>Statistik Pelanggan</header>
                <div class="tools">
                  <a class="btn btn-icon-toggle btn-close"><i class="fa fa-close"></i></a>
                </div>
              </div>
              <!--end .card-head -->
              <div class="card-body no-padding height-9">
                <div class="row">

                  <canvas id="canvasplg" width="560" height="340" style="margin-left:20px;"></canvas>
                </div>
                <!--end .row -->
                <div class="stick-bottom-left-right force-padding">
                  <!--<div id="flot-registrations" class="flot height-5" data-title="Registration history" data-color="#0aa89e"></div>-->

                </div>
              </div>
              <!--end .card-body -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END REGISTRATION HISTORY -->

          <!-- BEGIN NEW REGISTRATIONS -->
          <div class="col-md-3">
            <div class="card">
              <div class="card-head">
                <header>Pelanggan Terbaru</header>
                <div class="tools hidden-md">
                  <a class="btn btn-icon-toggle btn-close"><i class="fa fa-close"></i></a>
                </div>
              </div>
              <!--end .card-head -->
              <div class="card-body no-padding height-9 scroll">
                <ul class="list divider-full-bleed">
                  <?php
									foreach ($plg->result_array() as $p) {
										$idpel = $p['plg_id'];
										$napel = $p['plg_nama'];
										$ptpel = $p['plg_photo'];

									?>
                  <li class="tile">
                    <div class="tile-content">
                      <div class="tile-icon">
                        <img src="<?= base_url() . 'assets/images/' . $ptpel; ?>" alt="" />
                      </div>
                      <div class="tile-text"><?= $napel; ?></div>
                    </div>
                    <a class="btn btn-flat ink-reaction" href="<?= base_url() . 'admin/pelanggan' ?>">
                      <i class="fa fa-arrow-right text-default-light"></i>
                    </a>
                  </li>
                  <?php } ?>

                </ul>
              </div>
              <!--end .card-body -->
            </div>
            <!--end .card -->
          </div>
          <!--end .col -->
          <!-- END NEW REGISTRATIONS -->

        </div>
        <!--end .row -->
      </div>
      <!--end .section-body -->
    </section>
  </div>
  <!--end #content-->
  <!-- END CONTENT -->

</div>
<!--end #base-->
<!-- END BASE -->