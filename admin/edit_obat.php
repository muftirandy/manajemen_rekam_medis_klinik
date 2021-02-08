 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">EDIT DATA OBAT</li>
      </ol>
        
      <hr>
        <div class="card mb-3">
        <div class="card-header">  
        <center><h2><i class="fa fa-medkit"></i>Edit Data Obat</h2></center>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<form action="proses_obat.php?kode=3" method="POST" class="form" accept-charset="utf-8">

	<?php
	include "../koneksi.php";
		$ido = $_GET['id'];
		$sql = "SELECT * FROM dataobat WHERE id = '$ido'";
		$query = mysqli_query($connect,$sql);
		$value = mysqli_fetch_assoc($query);
    $date = strtotime($value['tanggalmasuk']);
	?>
		<input style="display: none;" type="text" name="id" value="<?php echo $value['id']; ?>">
        <div class="form-group">
        <b><label class="control-label">Nama Obat :</label></b>
        <input type="text" class="form-control" name="namaobat" value="<?php echo $value['namaobat']; ?>">
    </div>
      <div class="form-group">
         <b><label class="control-label">Kategori :</label></b>
        <select name="kategori" class="form-control">
          <option selected="" disabled >~ Pilih Kategori ~</option>
          <?php 
          include "../koneksi.php";
            $sql = "SELECT * FROM kategori";
            $query = mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_assoc($query)) {?>
            <?php
            echo "<option value='$data[id]'";
                
       
            if($data['id'] === $value['kategori'])
            {
                echo "selected='selected'";
          }
  
                echo "> $data[namakategori]  </option>";
            }?>
        </select>
      </div>
    <!--   <div class="form-group">
         <b><label class="control-label">Tanggal Masuk :</label></b>
        <input type="text" id="datepicker" class="form-control" name="tanggalmasuk" value="<?php echo date('d/m/Y', $date); ?>" >
      </div> -->
      <div class="form-group">
         <b><label class="control-label">Stok :</label></b>
        <input type="number" class="form-control" name="stok" value="<?php echo $value['stok']; ?>" readonly>
      </div>
    </div>
        <div>
          <center>
        <button type="submit" class="btn btn-primary" >Edit</button>
        <a href ="home.php?link=3"><button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button></a>
        </form>
      </center>
      </div>
    </div>
