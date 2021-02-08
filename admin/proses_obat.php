<?php
include "../koneksi.php";

$code = $_GET['kode'];
$id = $_GET['id'];

if (isset($code)) {

	if ($code == 1){
		
		$sql = "DELETE FROM dataobat WHERE id = '$id'";
		$query = mysqli_query($connect,$sql);

		$sq = mysqli_query($connect,"DELETE FROM obatmasuk WHERE namaobat = '$id'");

		if ($sq){
			header ("location:home.php?link=3");
		}else{
				echo mysqli_error($connect);

			echo "Delete Gagal";

		}

	}elseif ($code == 2) {

		$namaobat 		= $_POST['namaobat'];
		$kategori		= $_POST['kategori'];
		$stok			= $_POST['stok'];
		$tanggalmasuk 	= date('Y-m-d');
			$sql = "INSERT INTO dataobat VALUES('', '$namaobat', '$kategori', '$stok', '$tanggalmasuk')";
			$query = mysqli_query($connect,$sql);
			if ($query) {
			    header("location:home.php?link=3");
			} else {
				echo mysqli_error($connect);

			    echo "Tambah Obat Gagal";
			}

		}elseif ($code == 3) {

		$id 			= $_POST['id'];
		$namaobat 		= $_POST['namaobat'];
		$kategori		= $_POST['kategori'];
		$stok			= $_POST['stok'];
		$tanggalmasuk 	= $_POST['tanggalmasuk'];

			$sql = "UPDATE dataobat SET namaobat = '$namaobat', kategori = '$kategori', stok = '$stok' WHERE id = '$id'";
			$query = mysqli_query($connect, $sql);
			if ($query){ 
				header("location:home.php?link=3");
			}else{
				echo mysqli_error($connect);

				echo "Edit Gagal";
		}

		}elseif ($code == 4) {

		$namaobat 		= $_POST['namaobat'];
		$stok			= $_POST['stok'];
		$tanggalmasuk 	= date('Y-m-d');
		$tanggalexpired	= date('Y-m-d',strtotime($_POST['tanggalexpired']));

			$sq = mysqli_query($connect,"INSERT INTO obatmasuk (namaobat, stok ,tanggalmasuk, tanggalexpired) VALUES('$namaobat','$stok','$tanggalmasuk','$tanggalexpired')");

			if ($sq) {				
				$sql = "UPDATE dataobat SET stok = stok + '$stok' WHERE id = '$namaobat'";
				$query = mysqli_query($connect, $sql);
				if ($query){ 
					header("location:home.php?link=11");
				}else{
				echo mysqli_error($connect);
				echo "Gagal";
				}
			}else{
				echo mysqli_error($connect);
			}

		}else if ($code == 5) {
			$idm = $_GET['idm'];
			$ido = $_GET['ido'];
			$stok = $_GET['stok'];

			$sql = mysqli_query($connect,"DELETE FROM obatmasuk WHERE id = '$idm'");
			$sql2 = mysqli_query($connect,"UPDATE dataobat SET stok = stok - '$stok' WHERE id = '$ido'");
			if ($sql && $sql2){ 
					header("location:home.php?link=11");
			}else {
				echo mysqli_error($connect);
			}

		}else if($code == 6){
			$idm 	= $_POST['idm'];
			$namaobat 		= $_POST['namaobat_'];
			$stok			= $_POST['stok_'];
			$tanggalmasuk 	= date('Y-m-d');
			$tanggalexpired	= date('Y-m-d',strtotime($_POST['tanggalexpired_']));

			$cek = mysqli_query($connect,"SELECT * FROM obatmasuk WHERE id = '$idm'"); 
			$data = mysqli_fetch_assoc($cek);
				
			$sql = "UPDATE dataobat SET stok = stok - '$data[stok]' + '$stok' WHERE id = '$namaobat'";
			$query = mysqli_query($connect, $sql);
	
			$sq = mysqli_query($connect,"UPDATE obatmasuk SET namaobat = '$namaobat', stok = '$stok', tanggalexpired = '$tanggalexpired' WHERE id = '$idm'");

			if ($sq){ 
				header("location:home.php?link=11");
			}else{
				echo mysqli_error($connect);
				echo "Edit Gagal";
			}
			
		}else{
			echo 'error';
		}
	}


?>

 <!-- STR_TO_DATE('$tanggalexpired', '%d/%m/%Y')) -->
  <!-- tanggalexpired = STR_TO_DATE('$tanggalexpired', '%d/%m/%Y') -->