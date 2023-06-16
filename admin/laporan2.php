<?php 
  require 'connection.php';
  checkLogin();
  $bulan_pembayaran = mysqli_query($conn, "SELECT * FROM bulan_pembayaran ORDER BY id_bulan_pembayaran DESC");

  if (isset($_POST['btnLaporanSiswa'])) {
  	$dari_tanggal_date = htmlspecialchars($_POST['dari_tanggal']);
  	$sampai_tanggal_date = htmlspecialchars($_POST['sampai_tanggal']);
  	$dari_tanggal = strtotime(htmlspecialchars($_POST['dari_tanggal'] . " 00:00:00"));
  	$sampai_tanggal = strtotime(htmlspecialchars($_POST['sampai_tanggal'] . " 23:59:59"));
  	$sql = mysqli_query($conn, "SELECT * FROM siswa WHERE tgl_periksa BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
  	
    $fetch_sql = mysqli_fetch_assoc($sql);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'include/css.php'; ?>
  <title>Laporan</title>
  <style>
  	@media print {
	  	.not-printed {
	  		display: none;
	  	}
	  	.total {
	  		color: black !important;
	  	}
  	}
  </style>
</head>
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
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="not-printed row justify-content-center">
        	<div class="col-lg-12 ml-4">
        		<h3>Data Pemeriksaan Bayi Balita</h3>
        		<form method="post">
        			<div class="row">
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="dari_tanggal">Dari Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanSiswa'])): ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= $_POST['dari_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal" value="<?= date('Y-m-01'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        				<div class="col-lg">
        					<div class="form-group">
		        				<label for="sampai_tanggal">Sampai Tanggal</label>
		        				<?php if (isset($_POST['btnLaporanSiswa'])): ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= $_POST['sampai_tanggal']; ?>">
	        					<?php else: ?>
			        				<input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal" value="<?= date('Y-m-d'); ?>">
		        				<?php endif ?>
		        			</div>
        				</div>
        			</div>
        			<div class="form-group">
        				<button type="submit" name="btnLaporanSiswa" class="btn btn-primary">Laporan Data</button>
        			</div>
        		</form>
        	</div>
        </div>
        <?php if (isset($_POST['btnLaporanSiswa'])): ?>
        	<hr class="not-printed">
        	<button onclick="return print()" class="not-printed btn btn-success"><i class="fas fa-fw fa-print"></i> Print</button>
        	<a href="export_excel.php" class="not-printed btn btn-primary"><i class="fas fa-fw fa-file-excel"></i> Export Excel</a>
			<div class="row m-1 mb-0">
	        	<div class="col-lg m-1">
	        		<h2 class="text-center mb-3 mt-2">Laporan Data Bayi Balita</h2>
	        		<h3 class="text-left mb-3">Laporan Dari Tanggal: <?= $dari_tanggal_date; ?> Sampai Tanggal: <?= $sampai_tanggal_date; ?></h3>
	        		<div class="table-responsive">
	        			<table class="table table-bordered table-hover">
	        				<thead>
	        					<tr>
	        						<th>No.</th>
									<th>Nama Anak</th>
									<th>Tanggal Pemeriksaan</th>
									<th>Jenis Kelamin</th>
									<th>Usia</th>
									<th>Tinggi Badan</th>
									<th>Berat Badan</th>
									<th>Catatan Konsultasi</th>
									<th>Antrian</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					<?php $i = 1; ?>
	        					<?php foreach ($sql as $ds): ?>
	        						<tr>
	        							<td><?= $i++; ?></td>
	        							<td><?= $ds['nama_siswa']; ?></td>
	        							<td><?= date('d-m-Y, H:i:s', $ds['tgl_periksa']); ?></td>
										<td><?= $ds['jenis_kelamin']; ?></td>
										<td><?= $ds['no_telepon']; ?></td>
                      					<td><?= $ds['email']; ?></td>
                      					<td><?= $ds['bb_anak']; ?></td>
                      					<td><?= $ds['catatan']; ?></td>
										<td><?= $ds['antrian']; ?></td>
	        						</tr>
	        					<?php endforeach ?>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        <?php endif ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	<script>
		$(document).ready(function() {
			function print() {
				window.print();
			}
		});
	</script>
</div>
</body>
</html>
