<?php 
  require 'connection.php';
  checkLogin();
  $riwayat_pengeluaran = mysqli_query($conn, "SELECT * FROM riwayat_pengeluaran INNER JOIN user ON riwayat_pengeluaran.id_user = user.id_user ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'include/css.php'; ?>
  <title>Riwayat_pengeluaran Uang Kas</title>
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
            <h1 class="m-0 text-dark">Riwayat Data Ibu Hamil</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="table_id">
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <?php if ($_SESSION['id_jabatan'] !== '3'): ?>
                      <th>Aksi</th>
                <?php endif ?>
                    
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($riwayat_pengeluaran as $dr): ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $dr['username']; ?></td>
                  <td><?= $dr['aksi']; ?></td>
                  <td><?= date('d-m-Y, H:i:s', $dr['tanggal']); ?></td>
                  <?php if ($_SESSION['id_jabatan'] !== '3'): ?>
                    <td>
                    <a href="hapus_riwayat_pengeluaran.php?id_riwayat_pengeluaran=<?= $dr['id_riwayat_pengeluaran']; ?>" class="badge badge-danger btn-delete" ><i class="fas fa-fw fa-trash"></i> Hapus</a>
                    </td>
                  <?php endif ?>
                </tr>
              <?php endforeach ?>
              
            </tbody>
            
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

</div>
</body>
</html>