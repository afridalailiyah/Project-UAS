<?php
include 'connection.php';
$pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluaran");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pemeriksaan Ibu Hamil.xls");

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
    <h1 class="h3 mb-2 text-gray-800">Data Pemeriksaan Ibu Hamil</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table border="1" id="customers">
                    <thead>
                        <tr border="1">
                            <th>No</th>
                            <th>Nama Ibu Hamil</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Alamat</th>
                            <th>No.Telepon</th>
                            <th>Berat Badan</th>
                            <th>Umur Kehamilan</th>
                            <th>Tekanan Darah</th>
                            <th>Antrian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        while ($dp = mysqli_fetch_assoc($pengeluaran)) :
                            ?>
                                <tr border="1">
                                <td><?= $i++; ?></td>
	        							<td><?= $dp['keterangan']; ?></td>
	        							<td><?= date('d-m-Y, H:i:s', $dp['tanggal_pengeluaran']); ?></td>
										<td><?= $dp['alamat']; ?></td>
										<td><?= $dp['jumlah_pengeluaran']; ?></td>
                      					<td><?= $dp['beratbadan']; ?></td>
                      					<td><?= $dp['umurkehamilan']; ?></td>
                      					<td><?= $dp['tekanandarah']; ?></td>
                                        <td><?= $dp['antrian']; ?></td>
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
