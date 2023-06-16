<?php
include('connection.php');
$sql = "SELECT umurkehamilan, COUNT(*) AS jumlah_data FROM pengeluaran GROUP BY umurkehamilan ORDER BY umurkehamilan";
$result = $conn->query($sql);

$chart_labels = [];
$chart_data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {

        $tanggal = ($row['umurkehamilan']);
        $chart_labels[] = $tanggal;
 
        $jumlah_data = $row['jumlah_data'];
        $chart_data[] = $jumlah_data;
    }

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($conn);
}


?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="Chart.js"></script>
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
            <h1 class="m-0 text-dark">Pemeriksaan Ibu Hamil</h1>
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
		<h1>Grafik Line Data Jumlah Umur Kehamilan</h1>
        <canvas id="myChart"></canvas>
	</div>
    </div>
    </div>
</center>
<script>

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($chart_labels); ?>,
            datasets: [{
                label: 'Data Count',
                data: <?php echo json_encode($chart_data); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>
</body>
</html>