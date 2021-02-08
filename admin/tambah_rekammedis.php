 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">TAMBAH REKAM MEDIS</li>
      </ol>
      <hr>
      <div class="card mb-3">
        <div class="card-header"> 
          <center><h2><i class="fa fa-id-card-o""></i>Tambah Rekam Medis</h2></center>
        </div>
        <div class="mcard-body">
       
       <form action="proses_rekammedis.php?kode=2&id=" method="POST" class="form" accept-charset="utf-8">
        <?php
  
          include "../koneksi.php";

          $nip  = $_GET['nip'];

          $query = "SELECT * FROM data_pasien WHERE nip='$nip'";
          $sql = mysqli_query($connect,$query);
          $data = mysqli_fetch_array($sql,MYSQLI_BOTH);


        ?>
        <input type="hidden" name="nip" value=" <?php echo $data['nip']; ?>">

      <div class="form-group">
        <b><label> Diagnosa :</label></b>
        <input type="text" class="form-control" name="diagnosa" value="">
      </div>
      <div class="form-group">
        <b><label> Obat : </label></b>
        <input type="text" class="form-control" name="obat" value="">
      </div>
      <div class="form-group">
        <b><label> Terapi :</label></b>
        <input type="text" class="form-control" name="terapi" value="">
      </div>


     </div>
    <div>
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a href ="home.php?link=10&nip=<?php echo $data['nip']; ?>"> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
      </div>
    </div>

  </div>
</div>
