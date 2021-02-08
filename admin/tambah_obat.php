 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">DATA OBAT</li>
      </ol>
      <hr>
         <div class="card mb-3">
        <div class="card-header">  
       <center><h2><i class="fa fa-medkit"></i>Tambah Obat</h2></center>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<form class="form" action="proses_obat.php?kode=2&id=" method="POST" accept-charset="utf-8">
	<input style="display: none;" type="text" name="id" value="<?php echo $value['id']; ?>">
	<div class="form-group">
                <div class="form-group">
        <b><label class="control-label"> Nama Obat :</label></b>
        <input type="text" class="form-control" name="namaobat" value="" placeholder="Masukkan Nama Obat" required>
      </div>
      <div class="form-group">
        <b><label class="control-label"> Kategori :</label></b>
        <select name="kategori" class="form-control" required>
          <option value="" selected="" disabled >~ Pilih Kategori ~</option>
          <?php 
          include "../koneksi.php";
            $sql = "SELECT * FROM kategori";
            $query = mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_assoc($query)) { ?>
                
          <option value="<?php echo $data['id'] ?>" > <?php echo $data['namakategori'] ?></option>
           <?php }
           ?>
        </select>
      </div>
    
    </div>
        <div>
          <center>
        <button type="submit" class="btn btn-primary" >Tambah</button>
        <a href ="home.php?link=3"><button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button></a>
        </form>
      </center>
      </div>
    </div>
