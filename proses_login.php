	<?php

include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tb_user WHERE username = '$username' AND password = md5('$password')";
$sql = mysqli_query($connect,$query);

	if(mysqli_num_rows($sql) > 0) {

	 $data = mysqli_fetch_assoc($sql);

	 // set session
	 session_start();
	 $_SESSION['user_id']	= $data['id'];
	 $_SESSION["username"] = $data['username'];
	 $_SESSION["level"] = $data['level'];
	 // end session
if ($data['level'] == 1) {
		header("location: admin/home.php?link=0");
	}
elseif ($data['level'] == 2) {
		header("location: resepsionis/home.php?link=0");
	}
elseif ($data['level'] == 3) {
		header("location: dokter/home.php?link=0");
	}


} else {
		header("location: index.php");
	}
?>