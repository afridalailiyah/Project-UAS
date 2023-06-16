<?php 
  require 'connection.php';
  checkLogin();
  $antrian = mysqli_query($conn, "SELECT * FROM antrian ");
  if (isset($_POST['btnEditSiswa'])) {
    if (editSiswa($_POST) > 0) {
      setAlert("Data pemeriksaan has been changed", "Successfully changed", "success");
      header("Location: antrian.php");
    }
  }

  if (isset($_POST['btnTambahSiswa'])) {
    if (addSiswa($_POST) > 0) {
      setAlert("Data pemeriksaan has been added", "Successfully added", "success");
      header("Location: siswa.php");
    }
  }
  if (isset($_GET['toggle_modal'])) {
    $toggle_modal = $_GET['toggle_modal'];
    echo "
    <script>
      $(document).ready(function() {
        $('#$toggle_modal').modal('show');
      });
    </script>
    ";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'include/css.php'; ?>
  <title>Antrian</title>
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
        <div class="row justify-content-center mb-2">
          <div class="col-sm text-left">
            <h1 class="m-0 text-dark">Data Antrian</h1>
          </div><!-- /.col -->
          <div class="col-sm text-right">
            <?php if ($_SESSION['id_jabatan'] !== '3'): ?>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSiswaModal"><i class="fas fa-fw fa-plus"></i> Tambah Data </button>
              <!-- Modal -->
              <div class="modal fade text-left" id="tambahSiswaModal" tabindex="-1" role="dialog" aria-labelledby="tambahSiswaModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form method="post">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="tambahSiswaModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="id_antrian">Nomor Antrian</label>
                          <input type="int" id="id_antrian" name="id_antrian" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Status Antrian</label><br>
                          <input type="radio" id="Sudah Dipanggil" name="status_antrian" value="Sudah Dipanggil"> <label for="Sudah Dipanggil">Sudah Dipanggil</label> |
                          <input type="radio" id="Belum Dipanggil" name="status_antrian" value="Belum Dipanggil"> <label for="Belum Dipanggil">Belum Dipanggil</label>
                        </div>
                        <div class="form-group">
                          <label>Jenis Layanan</label><br>
                          <input type="radio" id="Bayi dan Balita" name="status_antrian" value="Bayi dan Balita"> <label for="Bayi dan Balita">Bayi dan Balita</label> |
                          <input type="radio" id="Ibu Hamil" name="status_antrian" value="Ibu Hamil"> <label for="Ibu Hamil">Ibu Hamil</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary" name="btnTambahSiswa"><i class="fas fa-fw fa-save"></i> Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php endif ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nomor Antrian</th>
                    <th>Status Antrian</th>
                    <th>Jenis Layanan</th>
                    <?php if ($_SESSION['id_jabatan'] !== '3'): ?>
                      <th>Aksi</th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($antrian as $da): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $da['id_antrian']; ?></td>
                      <td><?= ucwords($da['status_antrian']); ?></td>
                      <td><?= ucwords($da['jenis_layanan']); ?></td>
                      <?php if ($_SESSION['id_jabatan'] !== '3'): ?>
                        <td>
                          <!-- Button trigger modal -->
                          <a href="ubah_siswa.php?id_antrian=<?= $da['id_antrian']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editSiswa<?= $da['id_antrian']; ?>">
                            <i class="fas fa-fw fa-edit"></i> Ubah
                          </a>
                          <!-- Modal -->
                          <div class="modal fade" id="editSiswa<?= $da['id_antrian']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSiswa<?= $da['id_antrian']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <form method="post">
                                <input type="hidden" name="id_antrian" value="<?= $da['id_antrian']; ?>">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editSiswaModalLabel<?= $da['id_antrian']; ?>">Ubah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="id<?= $da['id_antrian']; ?>">Nomor Antrian</label>
                                      <input type="int" id="id<?= $da['id_antrian']; ?>" value="<?= $da['id']; ?>" name="id_antrian" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Status Antrian</label><br>
                                      <?php if ($da['Sudah Dipanggil'] == 'Bayi dan Balita'): ?>
                                        <input type="radio" id="Sudah Dipanggil<?= $da['id_antrian']; ?>" name="status_antrian" value="Sudah Dipanggil" checked="checked"> <label for="Sudah Dipanggil<?= $da['id_antrian']; ?>">Sudah Dipanggil</label> |
                                        <input type="radio" id="Belum Dipanggil<?= $da['id_antrian']; ?>" name="status_antrian" value="Belum Dipanggil"> <label for="Belum Dipanggil<?= $da['id_antrian']; ?>">Belum Dipanggil</label>
                                      <?php else: ?>
                                        <input type="radio" id="Sudah Dipanggil<?= $da['id_antrian']; ?>" name="status_antrian" value="Sudah Dipanggil"> <label for="Sudah Dipanggil<?= $da['id_antrian']; ?>">Sudah Dipanggil</label> |
                                        <input type="radio" id="Ibu Hamil<?= $da['id_antrian']; ?>" name="status_antrian" value="Belum Dipanggil" checked="checked"> <label for="Belum Dipanggil<?= $da['id_antrian']; ?>">Belum Dipanggil</label>
                                      <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                      <label>Jenis Antrian</label><br>
                                      <?php if ($da['status_antrian'] == 'Bayi dan Balita'): ?>
                                        <input type="radio" id="Bayi dan Balita<?= $da['id_antrian']; ?>" name="jenis_layanan" value="Bayi dan Balita" checked="checked"> <label for="Bayi dan Balita<?= $da['id_antrian']; ?>">Bayi dan Balita</label> |
                                        <input type="radio" id="Ibu Hamil<?= $da['id_antrian']; ?>" name="jenis_layanan" value="Ibu Hamil"> <label for="Ibu Hamil<?= $da['id_antrian']; ?>">Ibu Hamil</label>
                                      <?php else: ?>
                                        <input type="radio" id="Bayi dan Balita<?= $da['id_antrian']; ?>" name="jenis_layanan" value="Bayi dan Balita"> <label for="Bayi dan Balita<?= $da['id_antrian']; ?>">Bayi dan Balita</label> |
                                        <input type="radio" id="Ibu Hamil<?= $da['id_antrian']; ?>" name="jenis_layanan" value="Ibu Hamil" checked="checked"> <label for="Ibu Hamil<?= $da['id_antrian']; ?>">Ibu Hamil</label>
                                      <?php endif ?>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                                    <button type="submit" class="btn btn-primary" name="btnEditSiswa"><i class="fas fa-fw fa-save"></i> Save</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <?php if ($_SESSION['id_jabatan'] == '1'): ?>
                            <a data-nama="<?= $da['id_antrian']; ?>" class="btn-delete badge badge-danger" href="hapus_siswa.php?id_antrian=<?= $da['id_antrian']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                          <?php endif ?>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

</div>
</body>
</html>
