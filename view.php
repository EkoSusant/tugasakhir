<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("connection.php");


$result = mysqli_query($mysqli, "SELECT * FROM member WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Beranda</a> | <a href="add.html">Tambah Data Member</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Nama</td>
			<td>Gender</td>
			<td>Alamat</td>
			<td>Opsi</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nama']."</td>";
			echo "<td>".$res['gender']."</td>";
			echo "<td>".$res['alamat']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Anda yakin akan menghapusnya?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
