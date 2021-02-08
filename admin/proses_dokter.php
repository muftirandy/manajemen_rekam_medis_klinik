<?php
include "../koneksi.php";

$code = $_GET['kode'];
$id = $_GET['id'];

if (isset($code)) {
	if ($code == 1){
		$sql = "DELETE FROM data_dokter WHERE id = '$id'";
		$query = mysqli_query($connect,$sql);
		$sq = mysqli_query($connect,"DELETE FROM tb_user WHERE id = '$id'");

		if ($sq){
			header ("location:home.php?link=15");
		}else{
			echo "Delete Gagal";

		}
			}elseif ($code == 2) {

		$namadokter 		= $_POST['namadokter'];
		$spesialis 			= $_POST['spesialis'];
		$jeniskelamin		= $_POST['jeniskelamin'];
		$telepon 			= $_POST['telepon'];
		$alamat 			= $_POST['alamat'];
		$jadwal				= nl2br(htmlentities($_POST ['jadwal'], ENT_QUOTES, 'UTF-8'));
		$username			= $_POST['username'];
		$pass				= $_POST['password'];

			$sq = mysqli_query($connect,"INSERT INTO tb_user VALUES('','$username',md5('$pass'),'3')");
			$in_id = mysqli_insert_id($connect);

			$sql = "INSERT INTO data_dokter VALUES('$in_id', '$namadokter', '$spesialis', '$jeniskelamin', '$telepon', '$alamat', '$jadwal')";
			$query = mysqli_query($connect,$sql);
			if ($query) {
			    header("location:home.php?link=15");
			} else {
				echo mysqli_error($connect);
			    echo "Tambah Pasien Gagal";
			}

		}elseif ($code == 3) {

		$id 				= $_POST['id'];
		$namadokter 		= $_POST['namadokter'];
		$spesialis 			= $_POST['spesialis'];
		$jeniskelamin		= $_POST['jeniskelamin'];
		$telepon 			= $_POST['telepon'];
		$alamat 			= $_POST['alamat'];
		$jadwal				= nl2br(htmlentities($_POST ['jadwal'], ENT_QUOTES, 'UTF-8'));
		$username 		    = $_POST['username'];
		$password          	= $_POST['password'];

			if($password != "") {
				$sq = "UPDATE tb_user SET username = '$username', password = md5('$password') WHERE id = '$id'";
			}else{
				$sq = "UPDATE tb_user SET username = '$username' WHERE id = '$id'";
				}
				$query1 = mysqli_query($connect, $sq);
				$sql = "UPDATE data_dokter SET namadokter = '$namadokter', spesialis = '$spesialis', jeniskelamin = '$jeniskelamin', telepon = '$telepon', alamat = '$alamat', jadwal = '$jadwal' WHERE id = '$id'";

			$query = mysqli_query($connect, $sql);
			if ($query){ 
				header("location:home.php?link=15");
			} else {
				echo mysqli_error($connect);
			    echo "edit Gagal";
			}

			 }
		}
	
?>