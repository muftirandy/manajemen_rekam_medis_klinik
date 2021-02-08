
<?php
include "../koneksi.php";

session_start();

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
		$id_m			= explode(',', $_POST['id_m']);
		$id_o			= explode(',', $_POST['id_o']);
		$obat			= $_POST['obat'];
		$tanggal 		= date('Y-m-d');
		$keluhan		= nl2br(htmlentities($_POST ['keluhan'], ENT_QUOTES, 'UTF-8'));
		$pemeriksaan	= nl2br(htmlentities($_POST ['pemeriksaan'], ENT_QUOTES, 'UTF-8'));
		$diagnosa		= nl2br(htmlentities($_POST ['diagnosa'], ENT_QUOTES, 'UTF-8'));
		$dokter			= $_SESSION['user_id'];
		$terapi		 	= nl2br(htmlentities($_POST ['terapi'], ENT_QUOTES, 'UTF-8'));
					
			for ($i = 0; $i < count($id_m); $i++) {
				$sql1 = mysqli_query($connect,"UPDATE dataobat SET stok = stok - 1 WHERE id = '$id_o[$i]'");
				$sql2 = mysqli_query($connect,"UPDATE obatmasuk SET stok = stok - 1 WHERE id = '$id_m[$i]'");				
			}

			$sql = "INSERT INTO catatanrekammedis VALUES('','$nip','$tanggal', '$dokter', '$keluhan', '$pemeriksaan', '$diagnosa', '$obat', '$terapi')";
			$query = mysqli_query($connect,$sql);
			
			echo mysqli_error($connect);

			if ($query) {
			    header("location:home.php?link=10&nip=$nip");
			} else {
				echo mysqli_error($connect);
			    echo "Tambah Gagal";
			}

		}elseif ($code == 3) {

		$id 			= $_POST['id'];
		$id_m			= explode(',', $_POST['id_m']);
		$id_o			= explode(',', $_POST['id_o']);
		$nip 			= $_POST['nip'];
		$keluhan		= $_POST['keluhan'];
		$pemeriksaan	= $_POST['pemeriksaan'];
		$diagnosa		= $_POST['diagnosa'];
		$obat			= $_POST['obat'];
		$terapi		 	= $_POST['terapi'];

			$sql = "UPDATE catatanrekammedis SET keluhan = '$keluhan', pemeriksaan= '$pemeriksaan' diagnosa = '$diagnosa', obat = '$obat', terapi = '$terapi' WHERE id = '$id'";
			$query = mysqli_query($connect, $sql);
			if ($query){ 
				header("location:home.php?link=10&nip=$nip");
			}else{
				echo "Edit Gagal";
			}
	}else{
		$data = $_POST['ido[]'];
		print_r($data);
	}
}
?>