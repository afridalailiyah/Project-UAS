<?php 
	include 'include/js.php';
	
	session_start();
	
	date_default_timezone_set("Asia/Jakarta");

	$host		= "localhost";
	$username	= "root";
	$password	= "";
	$database	= "kas";

	$conn 		= mysqli_connect($host, $username, $password, $database);
	if ($conn) {
		// echo "berhasil terkoneksi!";
	} else {
		echo "gagal terkoneksi!";
	}

// ======================================== FUNCTION ========================================
function setAlert($title='', $text='', $type='', $buttons='') {
	$_SESSION["alert"]["title"]		= $title;
	$_SESSION["alert"]["text"] 		= $text;
	$_SESSION["alert"]["type"] 		= $type;
	$_SESSION["alert"]["buttons"]	= $buttons; 
}

if (isset($_SESSION['alert'])) {
	$title 		= $_SESSION["alert"]["title"];
	$text 		= $_SESSION["alert"]["text"];
	$type 		= $_SESSION["alert"]["type"];
	$buttons	= $_SESSION["alert"]["buttons"];

	echo"
		<div id='msg' data-title='".$title."' data-type='".$type."' data-text='".$text."' data-buttons='".$buttons."'></div>
		<script>
			let title 		= $('#msg').data('title');
			let type 		= $('#msg').data('type');
			let text 		= $('#msg').data('text');
			let buttons		= $('#msg').data('buttons');

			if(text != '' && type != '' && title != '') {
				Swal.fire({
					title: title,
					text: text,
					icon: type,
				});
			}
		</script>
	";
	unset($_SESSION["alert"]);
}

function checkLogin() {
	if (!isset($_SESSION['id_user'])) {
		setAlert("Access Denied!", "Login First!", "error");
		header('Location: login.php');
	} 
}

function checkLoginAtLogin() {
	if (isset($_SESSION['id_user'])) {
		setAlert("You has been logged!", "Welcome!", "success");
		header('Location: index.php');
	}
}

function logout() {
	setAlert("You has been logout!", "Success Logout!", "success");
	header("Location: index.php");
}

if (isset($_SESSION['id_user'])) {
	function dataUser() {
		global $conn;
		$id_user = $_SESSION['id_user'];
		return mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user INNER JOIN jabatan ON user.id_jabatan = jabatan.id_jabatan WHERE id_user = '$id_user'"));
	}
}

function editUser($data) {
	global $conn;
	$id_user = htmlspecialchars($data['id_user']);
	$nama_lengkap = htmlspecialchars(addslashes($data['nama_lengkap']));
  	$username = htmlspecialchars($data['username']);
  	$id_jabatan = htmlspecialchars($data['id_jabatan']);
  	$query = mysqli_query($conn, "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', id_jabatan = '$id_jabatan' WHERE id_user = '$id_user'");
  	return mysqli_affected_rows($conn);
}

function editJabatan($data) {
	global $conn;
	$id_jabatan = htmlspecialchars($data['id_jabatan']);
  	$nama_jabatan = htmlspecialchars($data['nama_jabatan']);
  	$query = mysqli_query($conn, "UPDATE jabatan SET nama_jabatan = '$nama_jabatan' WHERE id_jabatan = '$id_jabatan'");
  	return mysqli_affected_rows($conn);
}

function checkJabatan() {
	$id_jabatan = $_SESSION['id_jabatan'];
	if ($id_jabatan !== '1') {
		setAlert("Access Denied!", "You cannot delete data except administrator!", "error");
     	header("Location: index.php");
	} else {
		return true;
	}
}

function deleteJabatan($id) {
	global $conn;
	if (checkJabatan() == true) {
		$query = mysqli_query($conn, "DELETE FROM jabatan WHERE id_jabatan = '$id'");
	  	return mysqli_affected_rows($conn);
	}
}

function addJabatan($data) {
	global $conn;
	$nama_jabatan = htmlspecialchars($data['nama_jabatan']);
	$query = mysqli_query($conn, "INSERT INTO jabatan VALUES ('', '$nama_jabatan')");
  	return mysqli_affected_rows($conn);
}

function addUser($data) {
	global $conn;
	// check username already used or not
	$username = htmlspecialchars($data['username']);
	$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($query)) {
		setAlert("Failed to add user!", "Username has been used!", "error");
     	return header("Location: user.php");
	} else {
		$password = htmlspecialchars($data['password']);
		$password_verify = htmlspecialchars($data['password_verify']);
		if ($password !== $password_verify) {
			setAlert("Failed to add user!", "password not same password verify!", "error");
	     	return header("Location: user.php");
		} else {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$nama_lengkap = htmlspecialchars($data['nama_lengkap']);
			$id_jabatan = htmlspecialchars($data['id_jabatan']);
			$query = mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama_lengkap', '$username', '$password', '$id_jabatan')");
		  	return mysqli_affected_rows($conn);
		}
	}
}

function deleteUser($id) {
	global $conn;
	if (checkJabatan() == true) {
		$query = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");
	  	return mysqli_affected_rows($conn);
	}
}

function addSiswa($data) {
	global $conn;
	$nama_siswa = htmlspecialchars($data['nama_siswa']);
	$tgl_periksa = time();
	$jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
	$no_telepon = htmlspecialchars($data['no_telepon']);
	$email = htmlspecialchars($data['email']);
	$bb_anak = htmlspecialchars($data['bb_anak']);
	$catatan = htmlspecialchars($data['catatan']);
	$antrian = htmlspecialchars($data['antrian']);
	$query = mysqli_query($conn, "INSERT INTO siswa VALUES ('', '$nama_siswa', '$tgl_periksa', '$jenis_kelamin', '$no_telepon', '$email', '$bb_anak', '$catatan', '$antrian')");
  	return mysqli_affected_rows($conn);
}

function deleteSiswa($id) {
	global $conn;
	if (checkJabatan() == true) {
		$query = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = '$id'");
	  	return mysqli_affected_rows($conn);
	}
}

function editSiswa($data) {
	global $conn;
	$id_siswa = htmlspecialchars($data['id_siswa']);
	$nama_siswa = htmlspecialchars($data['nama_siswa']);
	$tgl_periksa = time();
	$jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
	$no_telepon = htmlspecialchars($data['no_telepon']);
	$email = htmlspecialchars($data['email']);
	$bb_anak = htmlspecialchars($data['bb_anak']);
	$catatan = htmlspecialchars($data['catatan']);
	$antrian = htmlspecialchars($data['antrian']);
	$query = mysqli_query($conn, "UPDATE siswa SET nama_siswa = '$nama_siswa', tgl_periksa = '$tgl_periksa', jenis_kelamin = '$jenis_kelamin', no_telepon = '$no_telepon', email = '$email', bb_anak = '$bb_anak', catatan = '$catatan', antrian = '$antrian' WHERE id_siswa = '$id_siswa'");
  	return mysqli_affected_rows($conn);
}

function changePassword($data) {
	global $conn;
	$id_user = $_SESSION['id_user'];
	$old_password = htmlspecialchars($data['old_password']);
	// check old password
	$dataUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'"));
	if (password_verify($old_password, $dataUser['password'])) {
		$new_password = htmlspecialchars($data['new_password']);
		$new_password_verify = htmlspecialchars($data['new_password_verify']);
		if ($new_password == $new_password_verify) {
			$password = password_hash($new_password, PASSWORD_DEFAULT);
			$query = mysqli_query($conn, "UPDATE user SET password = '$password' WHERE id_user = '$id_user'");
	  		return mysqli_affected_rows($conn);
		} else {
			setAlert("Failed to change password user!", "New Password not Matches with New Password Verify!", "error");
	     	return header("Location: profile.php");
		}
	} else {
		setAlert("Failed to change password user!", "Old Password not Matches!", "error");
     	return header("Location: profile.php");
	}
}

function addPengeluaran($data) {
	global $conn;
	$id_user = htmlspecialchars($_SESSION['id_user']);
	$jumlah_pengeluaran = htmlspecialchars($data['jumlah_pengeluaran']);
	$keterangan = htmlspecialchars($data['keterangan']);
	$tanggal_pengeluaran = time();
	$alamat = htmlspecialchars($data['alamat']);
	$beratbadan = htmlspecialchars($data['beratbadan']);
	$umurkehamilan = htmlspecialchars($data['umurkehamilan']);
	$tekanandarah = htmlspecialchars($data['tekanandarah']);
	$antrian = htmlspecialchars($data['antrian']);
	$query = mysqli_query($conn, "INSERT INTO pengeluaran VALUES ('', '$jumlah_pengeluaran', '$keterangan', '$tanggal_pengeluaran', '$id_user', '$alamat', '$beratbadan', '$umurkehamilan', '$tekanandarah', '$antrian')");
	return mysqli_affected_rows($conn);
}

function editPengeluaran($data) {
	global $conn;
	$id_user = htmlspecialchars($_SESSION['id_user']);
	$id_pengeluaran = htmlspecialchars($data['id_pengeluaran']);
	$fetch_sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengeluaran WHERE id_pengeluaran = '$id_pengeluaran'"));
	$jumlah_pengeluaran = htmlspecialchars($data['jumlah_pengeluaran']);
	$keterangan = htmlspecialchars($data['keterangan']);
	$tanggal_pengeluaran = time();
	$alamat = htmlspecialchars($data['alamat']);
	$beratbadan = htmlspecialchars($data['beratbadan']);
	$umurkehamilan = htmlspecialchars($data['umurkehamilan']);
	$tekanandarah = htmlspecialchars($data['tekanandarah']);
	$antrian = htmlspecialchars($data['antrian']);
	$query = mysqli_query($conn, "UPDATE pengeluaran SET jumlah_pengeluaran = '$jumlah_pengeluaran', keterangan = '$keterangan', tanggal_pengeluaran = '$tanggal_pengeluaran', id_user = '$id_user', alamat = '$alamat', 
	beratbadan ='$beratbadan', umurkehamilan = '$umurkehamilan', tekanandarah ='$tekanandarah', antrian = '$antrian' WHERE id_pengeluaran = '$id_pengeluaran'");
	return mysqli_affected_rows($conn);
}

function deletePengeluaran($id) {
	global $conn;
	if (checkJabatan() == true) {
		$query = mysqli_query($conn, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id'");
	  	return mysqli_affected_rows($conn);
	}
}

