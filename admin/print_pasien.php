<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Swedish Medical Clinic</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/css/sb-admin.min.css">
    <!-- <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../font/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../asset/css/simple-sidebar.css" rel="stylesheet">
    <link href="../asset/css/sb-admin.css" rel="stylesheet">
    <link href="../asset/bootstrap/css/datepicker.css" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="../asset/datatables/jquery.dataTables.css" rel="stylesheet">
    
    <!-- <script  src="../asset/jquery/jquery-1.10.2.min.js" type="text/javascript" ></script>  -->
    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- <script src="../asset/bootstrap/js/bootstrap.min.js"></script> -->

</head>

<body onload="window.print();">
	<center>
		<img src="../img/header.jpg">
		<H4>Data Pasien</H4>
		<!-- <h3><?php echo $data['nip']; ?></h3> -->


<?php
	
	include "../koneksi.php";

	$id  = $_GET['id'];

	$query = "SELECT * FROM data_pasien WHERE id = '$id'";
	$sql = mysqli_query($connect,$query);
	$data = mysqli_fetch_array($sql,MYSQLI_BOTH);


?>

<input style="display: none;" type="text" name="id" value="<?php echo $value['id']; ?>">
<div class="row">
	<div class="container">
		<br>
		<br>
			<table class="table">
				<tr>
					<th><center>NIP</center></th>
					<td>:</td>
					<td width="400"> <?php echo $data['nip']; ?> </td>
				</tr>
				<tr>
					<th><center>Nama Pasien</center></th>
					<td>:</td>
					<td> <?php echo $data['nama']; ?> </td>
				</tr>
				<tr>
					<th><center>Tgl. Lahir</center></th>
					<td>:</td>
					<td> <?php echo date('d-m-Y',strtotime($data['tanggal']));?> </td>
				</tr>
				<tr>
					<th><center>No. Askes</center></th>
					<td>:</td>
					<td> <?php echo $data['askes']; ?> </td>
				</tr>
				<tr>
					<th><center>Unit Kerja</center></th>
					<td>:</td>
					<td> <?php echo $data['unitkerja']; ?> </td>
				</tr>
				<tr>
					<th><center>No. Telephone</center></th>
					<td>:</td>
					<td> <?php echo $data['telpon']; ?> </td>
				</tr>
				<tr>
					<th><center>Alamat</center></th>
					<td>:</td>
					<td> <?php echo $data['alamat']; ?> </td>
				</tr>
			
		</table>
		<br>
		<br>
		<br>
		<br>
	</div>
	</div>
</div>

    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../asset/bootstrap/js/bootstrap.min.js"></script> -->
     <!-- Core plugin JavaScript-->
    <script src="../asset/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin.min.js"></script>
    <script src="../asset/bootstrap/js/bootstrap-datepicker.js"></script>
    <script src="../asset/datatables/dataTables.bootstrap.js"></script>

	</center>
</body>
</html>