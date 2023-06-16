<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('connection.php');
$labelpria = [];
$data_umur_pria = [];
$labelwanita = [];
$data_umur_wanita = [];

$query_pria = mysqli_query($conn, "SELECT COUNT(*) AS jumlah, jenis_kelamin, no_telepon FROM siswa WHERE jenis_kelamin = 'pria' GROUP BY no_telepon");
$row = $query_pria->fetch_all(MYSQLI_ASSOC);
foreach($row as $data) {
  $labelpria[] = $data['no_telepon'];
  $data_umur_pria[] = $data['jumlah'];
}
$query_wanita = mysqli_query($conn, "SELECT COUNT(*) AS jumlah, jenis_kelamin, no_telepon FROM siswa WHERE jenis_kelamin = 'wanita' GROUP BY no_telepon");
$row = $query_wanita->fetch_all(MYSQLI_ASSOC);
foreach($row as $data) {
  $labelwanita[] = $data['no_telepon'];
  $data_umur_wanita[] = $data['jumlah'];

}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'include/css.php'; ?>
    <title>CHART</title>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
  
    <?php include 'include/navbar.php'; ?>
    <?php include 'include/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1 class="m-0 text-dark">Pemeriksaan Bayi dan Balita</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
</head>

<body>
    <center>
    <div class="col-lg-9 grid-margin stretch-card ml-5">
    <div class="card">
          <div class="card-body">
	<div id="canvas-holder" style="width:50%">
		<h1>Grafik Pie Data Jenis Kelamin Pria Berdasarkan Umur</h1>
        <canvas id="jenisKelaminChart"></canvas>
	</div>
    </div>
    </div>
    <div class="card">
          <div class="card-body">
    <div id="canvas-holder" style="width:50%">
		<h1>Grafik Pie Data Jenis Kelamin Wanita Berdasarkan Umur</h1>
        <canvas id="jenisKelaminChart2"></canvas>
	</div>
    </div>
    </div>
    </center>
    <script>
    var ctx1 = document.getElementById("jenisKelaminChart").getContext('2d');
    var barChart = new Chart(ctx1, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($labelpria); ?>,
        datasets: [{
          label: 'Jenis Kelamin Pria', 
          data: <?php echo json_encode($data_umur_pria); ?>,
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(133, 196, 155, 0.5)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(133, 196, 155, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
    });
    
    var ctx2 = document.getElementById("jenisKelaminChart2").getContext('2d');
    var pieChart = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode($labelwanita); ?>,
        datasets: [{
          label: 'Jenis Kelamin Wanita',
          data: <?php echo json_encode($data_umur_wanita); ?>,
          backgroundColor: [
            'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(133, 196, 155, 0.5)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(133, 196, 155, 1)'
          ],
          borderWidth: 1
        }]
      },
    });

  </script>

</body>
</html>