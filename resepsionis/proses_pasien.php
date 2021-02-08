<?php
include "../koneksi.php";

$code = $_GET['kode'];
$id = $_GET['id'];

if (isset($code)) {
	if ($code == 1){
		$sql = "DELETE FROM data_pasien WHERE id = '$id'";
		$query = mysqli_query($connect,$sql);

		if ($query){
			header ("location:home.php?link=2");
		}else{
			echo "Delete Gagal";

		}
			}elseif ($code == 2) {

		$nip 			= $_POST['nip'];
		$nama 			= $_POST['nama'];
		$jeniskelamin 	= $_POST['jeniskelamin'];
		$tanggal		= date('Y-m-d',strtotime($_POST['tanggal']));
		$askes 			= $_POST['askes'];
		$unitkerja 		= $_POST['unitkerja'];
		$telpon			= $_POST['telpon'];
		$alamat			= $_POST['alamat'];
			$cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM data_pasien WHERE nip ='$nip'"));
			if ($cek > 0){
				echo "<script>window.alert('NIP sudah ada')
			window.location='home.php?link=6' </script>";
			}else{
			$sql = "INSERT INTO data_pasien VALUES('', '$nip', '$nama', '$jeniskelamin', '$tanggal', '$askes', '$unitkerja', '$telpon', '$alamat')";
			$query = mysqli_query($connect,$sql);
			if ($query) {
			    header("location:home.php?link=2");
			} else {
				echo mysqli_error($connect);

			    echo "Tambah Pasien Gagal";
			}
		}

		}elseif ($code == 3) {

		$id 		= $_POST['id'];
		$nip 		= $_POST['nip'];
		$nama 		= $_POST['nama'];
		$jeniskelamin 	= $_POST['jeniskelamin'];
		$tanggal	= date('Y-m-d',strtotime($_POST['tanggal']));
		$askes 		= $_POST['askes'];
		$unitkerja 	= $_POST['unitkerja'];
		$telpon		= $_POST['telpon'];
		$alamat		= $_POST['alamat'];

			$sql = "UPDATE data_pasien SET nip = '$nip', nama = '$nama', jeniskelamin = '$jeniskelamin', tanggal = '$tanggal', askes = '$askes', unitkerja = '$unitkerja', telpon = '$telpon', alamat = '$alamat' WHERE id = '$id'";
			$query = mysqli_query($connect, $sql);
			if ($query){ 
				header("location:home.php?link=2");
			} else {
			    echo "edit Gagal";
			}

			 }
		}
?>