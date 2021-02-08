<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Data Pasien'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../MPDF57/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru

 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();

$dari		= date('Y-m-d', strtotime($_POST['dari']));
$sampai		= date('Y-m-d', strtotime($_POST['sampai']));
$fill_askes = $_POST['fill_askes'];

$query = "SELECT * FROM data_pasien ";

		if(isset($_POST['fill_askes']) && $_POST['fill_askes'] == '1'){
			if(isset($_POST['dari'], $_POST['sampai']) && $_POST['dari'] != '' && $_POST['sampai'] != ''){
				$query .= ' WHERE askes != "" AND tgl_daftar >= "'.$dari.'" AND tgl_daftar <= "'.$sampai.'"';
			}else{
			$query .= ' WHERE askes != "" ';
			}
		}elseif(isset($_POST['fill_askes']) && $_POST['fill_askes'] == '2'){
			if(isset($_POST['dari'], $_POST['sampai']) && $_POST['dari'] != '' && $_POST['sampai'] != ''){
				$query .= ' WHERE askes = "" AND tgl_daftar >= "'.$dari.'" AND tgl_daftar <= "'.$sampai.'"';
			}else{
			$query .= ' WHERE askes = "" ';
			}
		}elseif(isset($_POST['fill_askes']) && $_POST['fill_askes'] == '0'){
			if(isset($_POST['dari'], $_POST['sampai']) && $_POST['dari'] != '' && $_POST['sampai'] != ''){
				$query .= ' WHERE tgl_daftar >= "'.$dari.'" AND tgl_daftar <= "'.$sampai.'"';
			}else{
			$query .= '';
			}
		}

?>
<title>Data Pasien</title>
<style type="text/css">
	table.tab > tbody > th{
		border: 1px solid black;
		border-collapse: collapse;
	}
	#myTable tr td:nth-child(1), #myTable th:nth-child(1) {
    display: none;
}
</style>
<body>
	<TABLE WIDTH="100%">
    <TR>
    <TD ALIGN="CENTER" WIDTH="60%"><FONT SIZE="6"><b>Data Pasien</b><BR>
     
<!-- 021 2936 8953<BR> -->
    </TD>
    </TR>

    <tr>
    	
    </tr>
    </TABLE>
    <hr size="5" color="black">
	<p align="center">Data <?php
	if($fill_askes == 0){
		echo 'Seluruh';
	}
	?> 
	Pasien Terdaftar Dari Tanggal <?= date('d-m-Y', strtotime($dari)); ?> - <?php 
	echo date('d-m-Y', strtotime($sampai))." ";
	if($fill_askes == 0){
		echo '';
	}elseif($fill_askes == 1){
		echo 'Pengguna Askes';
	}else{
		echo 'Tidak menggunakan Askes';
	}
	?></p>

	<table id="myTable" border="1" style="border-collapse: collapse;" class="tab" align="center" width="100%">
		<thead>
            <tr>
				<th><center>No</center></th>
				<th><center>NIP</center></th>
				<th><center>Nama</center></th>
				<th><center>Jenis Kelamin</center></th>
				<th><center>Tgl. Lahir</center></th>
				<th><center>No. Askes</center></th>
				<th><center>Unit Kerja</center></th>
				<th><center>Telepon</center></th>
				<th><center>Alamat</center></th>
				<th><center>Tanggal Terdaftar</center></th>
            </tr>
        </thead>
		<tbody>
		<?php
		
		include '../koneksi.php';
		//Tampilkan Data
		$no = 1;
		
		$sql = mysqli_query($connect,$query) or die(mysqli_error($connect));
		
		while($result = mysqli_fetch_array($sql)){?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $result['nip']; ?></td>
				<td><?php echo $result['nama']; ?></td>
				<td><?php echo $result['jeniskelamin']; ?></td>
				<td><?php echo $result['tanggal']; ?></td>
				<td><?php echo $result['askes']; ?></td>
				<td><?php echo $result['unitkerja']; ?></td>
				<td><?php echo $result['telpon']; ?></td>
				<td><?php echo $result['alamat']; ?></td>
				<td><?php echo $result['tgl_daftar']; ?></td>
			</tr>
		<?php $no++; 
		}
		?>	
		</tbody>
	</table>
	</body>
<?php
 
$mpdf->setFooter('{PAGENO}');
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>