<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if (isset($_GET['id'])) {
    // Ambil nomor antrian dari parameter URL
    $antrian_id = $_GET['id'];

    // Koneksi ke database
    $servername = "sql303.infinityfree.com";
    $username = "if0_34439705";
    $password = "2s8H2m3pe2xqT";
    $dbname = "if0_34439705_kas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk mendapatkan data pendaftaran berdasarkan nomor antrian
    $sql = "SELECT * FROM antrian_posyandu WHERE id_antrian = $antrian_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil data pendaftaran
        $row = $result->fetch_assoc();
        $jenis_layanan = $row["jenis_layanan"];

        // Generate konten HTML untuk formulir pendaftaran dan nomor antrian
        $html = '
        <center> <h3> Selamat Datang Di Posyandu Rungkut </h3>
        <h1>Nomor Antrian Posyandu Rungkut</h1>
        <h3>Nomor Antrian: <h1>' . $antrian_id . '</h1></h3>
        <p>Jenis Layanan: ' . $jenis_layanan . '</p> </center>
        ';

        // Buat objek DOMPDF
        $dompdf = new Dompdf();

        // Muat konten HTML ke DOMPDF
        $dompdf->loadHtml($html);

        // Konfigurasi opsi DOMPDF
        $dompdf->setPaper('A6', 'portrait');

        // Render PDF
        $dompdf->render();

        // Simpan atau tampilkan PDF sesuai kebutuhan Anda
        // Misalnya, simpan sebagai file dengan nama unik
        $filename = 'Nomor_Antrian_Posyandu_' . $antrian_id . '.pdf';
        $dompdf->stream($filename, array('Attachment' => true));
        exit();
    } else {
        echo "Data pendaftaran tidak ditemukan.";
    }

    $conn->close();
} else {
    echo "Nomor antrian tidak valid.";
}
?>
