 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">DATA PASIEN</li>
      </ol>
        
      <hr>
        <div class="card mb-3">
        <div class="card-header"> 
          <center><h2><i class="fa fa-user-md"></i> Tambah Dokter</h2></center>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<form action="proses_dokter.php?kode=2&id=" method="POST" class="form" accept-charset="utf-8">
	<input style="display: none;" type="text" name="id" value="">
  <div class="form-group">
        <b><label> UserName :</label></b>
        <input type="text" class="form-control" name="username" value="" placeholder="Masukkan Username" required>
      </div>
      <div class="form-group">
       <b><label> Password :</label></b>
        <input type="password" class="form-control" name="password" value="" placeholder="Masukkan Password" required>
      </div>
	<div class="form-group">
              <b><label class=" control-label">Nama Dokter :</label></b>
              <input type="text" class="form-control" name="namadokter" value="" placeholder="Masukkan Nama Dokter" required>
          </div>

            <div class="form-group">
        <b><label> Spesialis :</label></b>
        <select name="spesialis" class="form-control" required>
          <option selected="" disabled >~ Pilih Spesialis ~</option>}
          <option> Dokter Umum</option>
          <option> Dokter Mata</option>
          <option> Dokter Konservasi Gigi</option>
          <option> Dokter Telinga Hidung Tenggorok</option>
        </select>
      </div>
    <div class="form-group">
        <b><label> Jenis Kelamin :</label></b>
        <select name="jeniskelamin" class="form-control" required>
          <option selected="" disabled >~ Pilih ~</option>}
          <option> Pria</option>
          <option> Wanita</option>
        </select>
      </div>
 
          <div class="form-group">
              <b><label class="control-label">Telepon :</label></b>
              <input type="number" name="telepon" class="form-control"  placeholder="Masukkan No. Telepon" value="">
          </div>
          
          <div class="form-group">
              <b><label class="control-label">Alamat :</label></b>
              <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" ></textarea>
          </div>
                <div class="form-group">
              <b><label class="control-label">Jadwal Dokter :</label></b>
              <textarea name="jadwal" class="form-control" placeholder="Masukkan Jadwal Dokter" ></textarea>
          </div>
      </div>
      <div>
        <center>
        <button type="submit" class="btn btn-primary" >Tambah</button>
        <a href ="home.php?link=15"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a>
        </form>
      </center>
      </div>
    </div>