<?php
include "../koneksi.php";

$code = $_GET['kode'];
$id = $_GET['id'];

if (isset($code)) {
	
		if ($code == 1) {
			$username 	= $_POST['username'];
			$password 	= $_POST['password_'];
			$id			= $_POST['id'];

				if($password != ''){
					$sql = "UPDATE tb_user SET username = '$username', password = md5('$password') WHERE id = $id";
					$query = mysqli_query($connect, $sql);
						if ($query){ 
							header("location:home.php?link=5");
						}else{

							echo "Edit Gagal";
						}
				}else{
					$sql = "UPDATE tb_user SET username = '$username' WHERE id = $id";
					$query = mysqli_query($connect, $sql);
						if ($query){
							header("location:home.php?link=5");
						}else{
							echo "Edit Gagal";
						}
				}
		}
	}
?>