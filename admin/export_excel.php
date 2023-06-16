<?php
include 'connection.php';
$siswa = mysqli_query($conn, "SELECT * FROM siswa");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pemeriksaan Bayi Balita.xls");

?>
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pemeriksaan Bayi dan Balita</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table border="1" id="customers">
                    <thead>
                        <tr border="1">
                            <th>No</th>
                            <th>Nama Anak</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
                            <th>Catatan Konsultasi</th>
                            <th>Antrian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        while ($ds = mysqli_fetch_assoc($siswa)) :
                            ?>
                                <tr border="1">
                                <td><?= $i++; ?></td>
                                <td><?= $ds['nama_siswa']; ?></td>
                                <td><?= date("d-m-Y, H:i:s", $ds['tgl_periksa']); ?></td>
                                <td><?= ucwords($ds['jenis_kelamin']); ?></td>
                                <td><?= $ds['no_telepon']; ?></td>
                                <td><?= $ds['email']; ?></td>
                                <td><?= $ds['bb_anak']; ?></td>
                                <td><?= $ds['catatan']; ?></td>
                                <td><?= $ds['antrian']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
