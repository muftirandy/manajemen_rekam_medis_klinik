<?php
include "../koneksi.php";


$code = $_GET['kode'];
$id = $_GET['id'];
$nip = $_GET['nip'];

if (isset($code)) {

	if ($code == 1){
		
		$sql = "DELETE FROM catatanrekammedis WHERE id = '$id'";
		$query = mysqli_query($connect,$sql);

		if ($query){
			header ("location:home.php?link=10&nip=$nip");
		}else{
			echo "Delete Gagal";

		}

	}elseif ($code == 2) {
		$nip			= $_POST['nip'];
		$id_m			= $_POST['id_m'];
		$id_o			= $_POST['id_o'];
		$tanggal 		= date('Y-m-d');
		$diagnosa		= $_POST['diagnosa'];
		$obat			= $_POST['obat'];
		$terapi		 	= $_POST['terapi'];
		
			$sql1 = mysqli_query($connect,"UPDATE dataobat SET stok = stok - 1 WHERE id = '$id_o'");
			$sql2 = mysqli_query($connect,"UPDATE obatmasuk SET stok = stok - 1 WHERE id = '$id_m'");

			$sql = "INSERT INTO catatanrekammedis VALUES('','$nip','$tanggal', '$diagnosa', '$obat', '$terapi')";
			$query = mysqli_query($connect,$sql);
			
			if ($query) {
			    header("location:home.php?link=10&nip=$nip");
			} else {
				echo mysqli_error($connect);
			    echo "Tambah Gagal";
			}

		}elseif ($code == 3) {


		$id 			= $_POST['id'];
		$nip 			= $_POST['nip'];
		$diagnosa		= $_POST['diagnosa'];
		$obat			= $_POST['obat'];
		$terapi		 	= $_POST['terapi'];

			$sql = "UPDATE catatanrekammedis SET diagnosa = '$diagnosa', obat = '$obat', terapi = '$terapi' WHERE id = '$id'";
			$query = mysqli_query($connect, $sql);
			if ($query){ 
				header("location:home.php?link=10&nip=$nip");
			}else{
				echo "Edit Gagal";
		}
	}
}
?>