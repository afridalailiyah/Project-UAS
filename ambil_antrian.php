<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Posyandu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<head>
    <title>Nomor Antrian Posyandu Rungkut</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .form-group input[type="submit"] {
            background-color: #103741;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nomor Antrian Posyandu Rungkut</h1>
<a href="index.php" class="btn btn-primary rounded-pill px-2 d-none d-lg-block">Kembali ke halaman utama</i></a>

        <?php
        require_once 'dompdf/autoload.inc.php';
        use Dompdf\Dompdf;
        
        ob_start();
        include 'admin/connection.php';

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        // Cek apakah form telah disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil nilai dari form
           
            $jenis_layanan = $_POST["jenis_layanan"] ?? "";

            // Query untuk menyimpan data pendaftaran ke database
            $sql = "INSERT INTO antrian_posyandu ( jenis_layanan )
                    VALUES ('$jenis_layanan')";

if ($conn->query($sql) === TRUE) {
    // Ambil nomor antrian terakhir
    $last_id = $conn->insert_id;

    // Tampilkan pesan nomor antrian
    echo '<script>alert("Pendaftaran berhasil! Nomor Antrian Anda: ' . $last_id . '");</script>';

    // Redirect ke halaman cetak PDF setelah 2 detik
    echo '<script>setTimeout(function() { window.location.href = "cetak_pdf.php?id=' . $last_id . '"; }, 2000);</script>';

    ob_end_flush();
    
    exit();
} else {
    echo '<p>Pendaftaran gagal. Silakan coba lagi.</p>';
}

$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Nomor Antrian Posyandu Rungkut</title>
<!-- CSS dan JavaScript lainnya -->
</head>
<body>
    <p></p>
<div class="container">
    <p>Terima kasih telah membuat antrian! Jangan lupa membawa nomor antrian saat datang ke Posyandu</p>
    <p>Mohon tunggu 2 detik untuk mendapatkan PDF</p>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <!-- Formulir Pendaftaran -->
    </form>
</div>
</body>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
           
            <div class="form-group">
                <br>
                <label for="jenis_layanan">Jenis Layanan</label>
                <select id="jenis_layanan" name="jenis_layanan" required>
                    <option value="Bayi dan Balita">Bayi dan Balita</option>
                    <option value="Ibu Hamil">Ibu Hamil</option>
                </select>
            </div>
            <div class="form-group">
           

                <input type="submit" value="Buat Antrian" class="btn btn-primary rounded-pill px-2 d-none d-lg-block">
            </div>
            <script>
        function showConfirmation() {
            alert('Terima kasih telah mendaftar! Jangan lupa membawa formulir dan nomor antrian saat datang ke Posyandu.');
        }
    </script>
        </form>
    </div>
</body>
</html>

                </div>
            </div>
        </div>
        <!-- Contact End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</html>