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
          <center><h2><i class="fa fa-user-circle-o"></i>Tambah Pasien</h2></center>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<form action="proses_pasien.php?kode=2&id=" method="POST" class="form" accept-charset="utf-8">
	<input style="display: none;" type="text" name="id" value="">
	<div class="form-group">
              <b><label class=" control-label">NIP :</label></b>
              <input type="text" pattern="^[0-9]{1,20}$" class="form-control" name="nip" value="" placeholder="Masukkan NIP" required>
          </div>

          <div class="form-group" >
              <b><label class="control-label"> Nama : </label></b>
              <input type="text" class="form-control" name="nama" value="" placeholder="Masukkan Nama" required >
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
              <b><label class="control-label">Tgl. Lahir : </label></b>
              <input type="text" id="tanggal" class="form-control" name="tanggal" value="" placeholder="Masukkan Tgl. Lahir" required>
          </div>
 
          <div class="form-group">
              <b><label class="control-label">No. Askes :</label></b>
              <input type="number" class="form-control" name="askes" placeholder="Masukkan No. Askes" value="">
          </div>

          <div class="form-group">
              <b><label class="control-label">Unit Kerja :</label></b>
              <input type="text" class="form-control" name="unitkerja" value="" placeholder="Masukkan Unit Kerja">
          </div>

          <div class="form-group">
              <b><label class="control-label">Telepon / No. Handphone :</label></b>
              <input type="number" class="form-control" name="telpon" value="" placeholder="Masukkan No. Telpon/Handphone" required>
          </div>
          
          <div class="form-group">
              <b><label class="control-label">Alamat :</label></b>
              <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" ></textarea>
          </div>
      </div>
      <div>
        <center>
        <button type="submit" class="btn btn-primary" >Tambah</button>
        <a href ="home.php?link=2"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a>
        </form>
      </center>
      </div>
    </div>