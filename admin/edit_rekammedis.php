 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">EDIT REKAM MEDIS</li>
      </ol>
        
      <hr>
        <div class="card mb-3">
        <div class="card-header">  
        <center><h2><i class="fa fa-id-card-o"></i>Edit Rekam Medis</h2></center>
        </div>
          <div class="card-body">
          <div class="table-responsive">
<form action="proses_rekammedis.php?kode=3" method="POST" class="form" accept-charset="utf-8">
  
  <?php
  include "../koneksi.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM catatan_rekammedis WHERE id = '$id'";
    $query = mysqli_query($connect,$sql);
    $value = mysqli_fetch_assoc($query);
    ?>
        <input type="hidden" name="nip" value=" <?php echo $value['nip']; ?>">
        <input type="hidden" name="id" value=" <?php echo $value['id']; ?>">

      <div class="form-group">
        <b><label> Diagnosa :</label></b>
        <input type="text" class="form-control" name="diagnosa" value="<?php echo $value['diagnosa']; ?>">
      </div>
      <div class="form-group">
        <b><label> Obat : </label></b>
        <input type="text" class="form-control" name="obat" value="<?php echo $value['obat']; ?>">
      </div>
      <div class="form-group">
        <b><label> Terapi :</label></b>
        <input type="text" class="form-control" name="terapi" value="<?php echo $value['terapi']; ?>">
      </div>


     </div>
    <div>
          <button type="submit" class="btn btn-primary">Edit</button>
          <a href ="home.php?link=10&nip=<?php echo $data['nip']; ?>"> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
      </div>
    </div>

  </div>
</div>
