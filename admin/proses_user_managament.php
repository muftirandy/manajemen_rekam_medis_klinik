<?php
include "../koneksi.php";

$code = $_GET['kode'];
$id = $_GET['id'];

if (isset($code)) {
	if ($code == 1){
		$sql = "DELETE FROM tb_user WHERE id = '$id'";
		$query = mysqli_query($connect,$sql);

		if ($query){
			header ("location:home.php?link=14");
		}else{
			echo "Delete Gagal";

		}
			}elseif ($code == 2) {

		$username 		    = $_POST['username'];
		$password           = md5($_POST['password']);
		$level 		    	= $_POST['level'];
			$sql = "INSERT INTO tb_user VALUES('', '$username','$password','$level')";
			$query = mysqli_query($connect,$sql);
			if ($query) {
			    header("location:home.php?link=14");
			} else {
			    echo "Tambah Pasien Gagal";
			}

		}elseif ($code == 3) {
		$id 				= $_POST['id'];
		$username 		    = $_POST['username'];
		$password           = $_POST['password_'];
		$level 		    	= $_POST['level'];

			if($password != "") {
				$sql = "UPDATE tb_user SET username = '$username', password = md5('$password'), level = '$level' WHERE id = '$id'";
			}else{
				$sql = "UPDATE tb_user SET username = '$username', level = '$level' WHERE id = '$id'";
			}
			$query = mysqli_query($connect, $sql);
			if ($query){ 
				header("location:home.php?link=14");
			} else {
			    echo "Edit Gagal";
			}
			 }
		}
?>