 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">EDIT DATA Dokter</li>
      </ol>
      <hr>
      <div class="card mb-3">
        <div class="card-header"> 
          <center><h2><i class="fa fa-user-md"></i> Edit Data Dokter</h2></center>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<form action="proses_dokter.php?kode=3" method="POST" class="form" accept-charset="utf-8">

	<?php
	include "../koneksi.php";
		$id = $_GET['id'];
		$sql = "SELECT * FROM data_dokter WHERE id = '$id'";
    $query = mysqli_query($connect,$sql);
    $value = mysqli_fetch_assoc($query);
    $sql2 = "SELECT * FROM tb_user WHERE id = '$id'";
    $user = mysqli_fetch_assoc(mysqli_query($connect,$sql2));
	
  ?>
	<input style="display: none;" type="text" name="id" value="<?php echo $value['id']; ?>">
  <input style="display: none;" type="text" name="id" value="<?php echo $value['id']; ?>">
  <div class="group">
    <b><label>Username : </label></b>
    <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
  </div>
  <div class="form-group">
    <b><label>Password : </label></b>
    <input type="password" class="form-control" name="password">
        <div class="form-group">
     		   <b><label class="control-label">Nama Dokter:</label></b>
              <input type="text"  class="form-control" name="namadokter" value="<?php echo $value['namadokter']; ?>">
  		</div>

 	    <div class="form-group">
        <b><label> Spesialis :</label></b>
        <select name="spesialis" class="form-control">
          <option selected=""><?php echo $value['spesialis']; ?></option>}
          <option> Dokter Umum</option>
          <option> Dokter Mata</option>
          <option> Dokter Konservasi Gigi</option>
          <option> Dokter Telinga Hidung Tenggorok</option>
        </select>
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
              <b><label class="control-label">Telepon :</label></b>
              <input type="number" name="telepon" class="form-control" value="<?php echo $value['telepon']; ?>">
          </div>

 	<div class="form-group">
              <b><label class="control-label">Alamat :</label></b>
              <textarea  class="form-control" name="alamat"><?php echo $value['alamat']; ?></textarea>
  		</div>
  
 	   <div class="form-group">
              <b><label class="control-label">Jadwal Dokter :</label></b>
              <textarea  class="form-control" name="jadwal"><?php echo strip_tags($value['jadwal']); ?></textarea>
          </div>
        </div>
      </div>

      <div>
      	<center>
          <button type="submit" class="btn btn-primary">Edit</button>
          <a href ="home.php?link=15"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
</center>
      </div>
    </div>

  </div>
</div>
