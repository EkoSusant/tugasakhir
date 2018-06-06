<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Tambah Data Member</title>
</head>

<body>
<?php

include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$nama = $_POST["nama"];
	$gender = $_POST["gender"];
	$alamat = $_POST["alamat"];
	$loginId = $_SESSION["id"];
		
	
	if(empty($nama) || empty($gender) || empty($alamat)) {
				
		if(empty($nama)) {
			echo "<font color='red'>kolom tidak boleh kosong.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>kolom tidak boleh kosong.</font><br/>";
		}
		
		if(empty($alamat)) {
			echo "<font color='red'>kolom tidak boleh kosong.</font><br/>";
		}
		
		
		echo "<br/><a href='javascript:self.history.back();'>kembali</a>";
	} else { 
		
			
			
		$result = mysqli_query($mysqli, "INSERT INTO member(nama, gender, alamat, login_id) VALUES('$nama','$gender','$alamat','$loginId')");
		
		
		echo "<font color='green'>Data berhasil disimpan.";
		echo "<br/><a href='view.php'>Silahkan Lihat Hasilnya</a>";
	}
}
?>
</body>
</html>
