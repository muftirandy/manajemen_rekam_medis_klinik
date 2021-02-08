 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">EDIT DATA PASIEN</li>
      </ol>
      <hr>
      <div class="card mb-3">
        <div class="card-header"> 
          <center><h2><i class="fa fa-user-circle-o"></i>Edit Data Pasien</h2></center>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<form action="proses_pasien.php?kode=3" method="POST" class="form" accept-charset="utf-8">

	<?php
	include "../koneksi.php";
		$id = $_GET['id'];
		$sql = "SELECT * FROM data_pasien WHERE id = '$id'";
		$query = mysqli_query($connect,$sql);
		$value = mysqli_fetch_assoc($query);
    $date = strtotime($value['tanggal']);
	?>
	<input style="display: none;" type="text" name="id" value="<?php echo $value['id']; ?>">
        <div class="form-group">
     		   <b><label class="control-label">NIP :</label></b>
              <input type="number"  class="form-control" name="nip" value="<?php echo $value['nip']; ?>" readonly>
  		</div>

 	 <div class="form-group">
              <b><label class="control-label">Nama :</label></b>
              <input type="text"  class="form-control" name="nama" value="<?php echo $value['nama']; ?>">
  		</div>
       <div class="form-group">
        <b><label> Jenis Kelamin :</label></b>
        <select name="jeniskelamin" class="form-control" value="">
          <option selected="" ><?php echo $value['jeniskelamin']; ?></option>}
          <option> Pria</option>
          <option> Wanita</option>
        </select>
      </div>

	<div class="form-group">
              <b><label class="control-label">Tgl. Lahir :</label></b>
              <input type="text" id="tanggal" class="form-control" name="tanggal" value="<?php echo date('d/m/Y', $date); ?>">
  		</div>

 	<div class="form-group">
              <b><label class="control-label">No. Askes :</label></b>
              <input type="number" class="form-control" name="askes" value="<?php echo $value['askes']; ?>">
          </div>

 	<div class="form-group">
              <b><label class="control-label">Unit Kerja :</label></b>
              <input type="text"  class="form-control" name="unitkerja" value="<?php echo $value['unitkerja']; ?>">
  		</div>
  
 	   <div class="form-group">
              <b><label class="control-label">Telepon :</label></b>
              <input type="number" class="form-control" name="telpon" value="<?php echo $value['telpon']; ?>">
          </div>
        </div>
  
    <div class="form-group">
              <b><label class="control-label">Alamat :</label></b>
              <textarea name="alamat" class="form-control"><?php echo $value['alamat']; ?></textarea>
          </div>
      </div>

      <div>
      	<center>
          <button type="submit" class="btn btn-primary">Edit</button>
          <a href ="home.php?link=2"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
</center>
      </div>
    </div>

  </div>
</div>
