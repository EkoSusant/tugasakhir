<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nama = $_POST['nama'];
	$gender = $_POST['gender'];
	$alamat = $_POST['alamat'];	
	

	if(empty($nama) || empty($gender) || empty($alamat)) {
				
		if(empty($nama)) {
			echo "<font color='red'>nama field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}
		
		if(empty($alamat)) {
			echo "<font color='red'>alamat field is empty.</font><br/>";
		}		
	} else {	
		
		$result = mysqli_query($mysqli, "UPDATE member SET nama='$nama', gender='$gender', alamat='$alamat' WHERE id=$id");
		
	
		header("Location: view.php");
	}
}
?>
<?php

$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM member WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nama = $res['nama'];
	$gender = $res['gender'];
	$alamat = $res['alamat'];
}
?>
<html>
<head>	
	<title>Edit data member</title>
</head>

<body>
	<a href="index.php">Beranda</a> | <a href="view.php">Lihat Data Member</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
			</tr>
			<tr> 
				<td>gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
			</tr>
			<tr> 
				<td>alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
