<!-- BEGIN JAVASCRIPT -->
<script src="<?= base_url() . 'assets/js/jquery-3.1.1.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/jquery/jquery-1.11.2.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/jquery/jquery-migrate-1.2.1.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/bootstrap/bootstrap.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/spin/spin.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/autosize/jquery.autosize.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/moment/moment.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/flot/jquery.flot.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/flot/jquery.flot.time.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/flot/jquery.flot.resize.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/flot/jquery.flot.orderBars.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/flot/jquery.flot.pie.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/flot/curvedLines.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/jquery-knob/jquery.knob.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/sparkline/jquery.sparkline.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/nanoscroller/jquery.nanoscroller.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/d3/d3.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/d3/d3.v3.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/rickshaw/rickshaw.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/source/App.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/source/AppNavigation.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/source/AppOffcanvas.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/source/AppCard.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/source/AppForm.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/source/AppNavSearch.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/source/AppVendor.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/Chart.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/DataTables/jquery.dataTables.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/DataTables/extensions/ColVis/js/dataTables.colVis.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/core/DemoTableDynamic.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/bootstrap-datepicker.min.js' ?>"></script>
<!-- END JAVASCRIPT -->

<script type="text/javascript">
$(function () {

// INITIALIZE DATEPICKER PLUGIN
$('.datepicker').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
});
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $('.form-chat').submit(function() {
    alert('Ini adalah klik events tombol kirim pesan');
  });
});
</script>

<script>
var lineChartData = {
  labels: < ? = json_encode($bulan); ? > ,
  datasets : [

    {
      fillColor: "rgba(151,187,205,0.5)",
      strokeColor: "rgba(151,187,205,1)",
      pointColor: "rgba(151,187,205,1)",
      pointStrokeColor: "#fff",
      data: < ? = json_encode($value); ? >
    }
  ]

}

var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

var lineChartPelanggan = {
  labels: < ? = json_encode($bln); ? > ,
  datasets : [

    {
      fillColor: "rgba(220,220,220,0.5)",
      strokeColor: "rgba(220,220,220,1)",
      pointColor: "rgba(220,220,220,1)",
      pointStrokeColor: "#fff",
      data: < ? = json_encode($val); ? >
    }
  ]

}

var myLineplg = new Chart(document.getElementById("canvasplg").getContext("2d")).Line(lineChartPelanggan);
</script>
</body>

</html>