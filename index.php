<?php session_start(); ?>
<html>
<head>
	<title>Beranda</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Data Member Bengkel Dari Hati ke Hati
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Hai <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
		<br/>
		<a href='view.php'>Lihat dan Tambah Data</a>
		<br/><br/>
	<?php	
	} else {
		echo "Anda Harus Login.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Registrasi</a>";
	}
	?>
</body>
</html>
