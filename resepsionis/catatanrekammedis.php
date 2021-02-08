   <div id="page-content-wrapper">

 <ol class="breadcrumb">

        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">CATATAN RESEP OBAT</li>
        

    </ol>

      <center><h4><i class="fa fa-id-card-o"></i> Catatan Resep Obat</i></h4></center>
      <hr>

      <?php
  
  include "../koneksi.php";

  $nip  = $_GET['nip'];

  $query = "SELECT * FROM data_pasien WHERE nip='$nip'";
  $sql = mysqli_query($connect,$query);
  $data = mysqli_fetch_array($sql,MYSQLI_BOTH);


?>

      <div id="page-content-wrapper">
 

<a href="home.php?link=4" = class="btn btn-danger btn-bg" name = "Kembali" title="Kembali">Kembali</a>
</div>
      

<div class="col-md-6">
      <table class="table table-striped">
        <tr>
          <th>NIP</th>
          <td>:</td>
          <td width="400"> <?php echo $data['nip']; ?> </td>
        </tr>
        <tr>
          <th>Nama Pasien</th>
          <td>:</td>
          <td> <?php echo $data['nama']; ?> </td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>:</td>
          <td> <?php echo $data['jeniskelamin']; ?> </td>
        </tr>
        <tr>
          <th>Tgl. Lahir</th>
          <td>:</td>
          <td> <?php echo ucfirst($data['tanggal']); ?> </td>
        </tr>
        <tr>
          <th>No. Askes</th>
          <td>:</td>
          <td> <?php echo $data['askes']; ?> </td>
        </tr>
        <tr>
          <th>Unit Kerja</th>
          <td>:</td>
          <td> <?php echo $data['unitkerja']; ?> </td>
        </tr>
        <tr>
          <th>No. Telephone</th>
          <td>:</td>
          <td> <?php echo $data['telpon']; ?> </td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>:</td>
          <td> <?php echo $data['alamat']; ?> </td>
        </tr>
      
    </table>
  </div>
</div>


<!--  <div id="page-content-wrapper">
  <div class="col-md-12">
    <h4>Catatan Anamnese</h4>
    <hr>
    <form method="POST" class="form" action="proses_rekammedis.php?nip=<?php echo $_GET['nip'] ?>&kode=2&id=">
      <input type="text" hidden="" name="id_o" class="id_o" value="">
      <input type="text" hidden="" name="id_m" class="id_m" value="">

      <input type="hidden" name="nip" value="<?php echo $_GET['nip']; ?>" >
      <input type="hidden" name="dokter" value="<?php echo $d['namadokter']; ?>">
      <div class="form-group">
        <textarea class="form-control" name="diagnosa" placeholder="Diagnosa" style="width:500px;"></textarea>
      </div>
      <div class="form-group">
        <textarea class="form-control obat" id="pil_obat" placeholder="obat" name="obat" wrap="hard" style="width:500px;"></textarea> -->
      <!-- <input type="text" class="form-control obat" name="obat" id="pil_obat" placeholder="Obat" value="" style="width:500px;"> -->
<!--       </div>
       <div class="form-group">
        <textarea type="text" class="form-control" name="terapi" placeholder="Terapi" style="width:500px;"></textarea>
      </div>
      

      <div class="form-group">
      <?php
  
          include "../koneksi.php";

          $nip  = $_GET['nip'];

          $query = "SELECT * FROM data_pasien WHERE nip='$nip'";
          $sql = mysqli_query($connect,$query);
          $data = mysqli_fetch_array($sql,MYSQLI_BOTH);


        ?>
        <button type="submit" class="btn btn-primary" name="save">Submit</button>
      </div>
    </form>
    
  </div>
</div>  --> 

 <div id="page-content-wrapper">
   <div class="col-md-12">
<!--         <div class="card-header">  
         <a href="home.php?link=12&nip=<?php echo $data['nip'];?>"> <button type="button" class="btn btn-success btn-sm" data-toggle="modal">Tambah</button></a>
        </div> -->
<!--         <div class="card-body"> -->
          <div class="table-responsive">
            <h4> Resep Obat </h4>
            <table class="table table-bordered table-striped" id="table_catatan_rekammedis" width="100%" cellspacing="0">
                <thead>
                          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Dokter</th>
            <!-- <th>Diagnosa</th> -->
            <th>Obat</th>
            <th>Terapi</th>
           <th>Action</th>
            <th style="display: none;">id</th>
            </tr>
        </thead>
                              
                              
             <tbody>
        <?php

          include "../koneksi.php";
            
            $nip= $_GET['nip'];
            $query ="SELECT a.*, b.namadokter as dokter FROM catatanrekammedis a LEFT JOIN data_dokter b ON a.namadokter=b.id WHERE a.nip='$nip' ORDER BY a.id DESC";
            $sql= mysqli_query($connect,$query);
            $id = 1;


            while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
              
         
          ?>

                <tr>
                <td width="10px"> <?php echo $id;?> </td>
                <td width="100x"> <?php echo date('d-m-Y',strtotime($data['tanggal']));?> </td>
                <td width="200px"> <?php echo $data['dokter'];?> </td>
                <!-- <td width="200px"> <?php echo $data['diagnosa'];?> </td> -->
                <td width="200px"> <?php echo $data['obat'];?> </td>
                <td> <?php echo $data['terapi'];?> </td>
                <td style="display: none;"> <?php echo $data['id'];?> </td>
                 <td align="pull-right" width="200px">
                    <!-- <a href="home.php?link=13&nip=<?php echo $data['nip']; ?>&id=<?php echo $data['id']; ?>" class="btn btn-outline btn-warning btn-sm" title="Edit Data"><span class="fa fa-pencil-square-o"> Edit</span></a>
                    &nbsp -->
                    <a href="print_rekammedis.php?nip=<?php echo $data['nip'];?>&id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm " title="Print"><i class="fa fa-print"></i> PRINT</a>
                    <!-- &nbsp
                    <a href="proses_rekammedis.php?kode=1&nip=<?php echo $data['nip']; ?>&id=<?php echo $data['id']; ?>" onclick="return confirm('hapus data?');" class="btn btn-outline btn-danger btn-sm" title="Hapus Data"><span class="fa fa-trash"> Hapus</span></a> -->
                  
                </td>
                

                </tr>
          
            <?php
            $id++;

            }
            ?>
               </tbody>
    </table>

<div id="pilih_obat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
    <!--     <a href="home.php?link=12"> <button type="button" class="btn btn-success btn-sm">&times;</button> -->
        <h4 class="modal-title">Pilih Obat</h4>
      </div>
      <div class="modal-body">  
 <div class="card-body">
          <div class="table-responsive">
        <form action="" method="POST" id="getobat">
            <table id="table_obat" class="display" width="100%">
              <thead>
                          <tr>
            <th><center>No</center></th>
            <th><center>Nama Obat</center></th>
            <th><center>Kategori</center></th>
            <th><center>Tgl Expired</center></th>
            <th><center>Stok</center></th>
            <th><center>Action</center></th>
            </tr>
        </thead>
                              
                              
        <tbody>
          
        <?php

          include "../koneksi.php";
            

            $query ="SELECT a.*,
            c.*, 
            b.*, 
            a.id as id_m , 
            c.namaobat as nm_obat, 
            a.tanggalmasuk as tgl_msk, 
            a.stok as s_masuk,
            a.namaobat as id_o 
            FROM obatmasuk a 
            LEFT JOIN dataobat c ON a.namaobat = c.id
            LEFT JOIN kategori b ON c.kategori = b.id ";
            $sql= mysqli_query($connect,$query);
            $id = 1;


            while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
              
         
        ?>
                <tr>
                <td> <?php echo $id;?> </td>
                <td> <?php echo $data['nm_obat'];?> </td>
                <td> <?php echo $data['namakategori'];?> </td>
                <td> <?php echo date('d-m-Y',strtotime($data['tanggalexpired']));?> </td>
                <td> 
                <?php
                if ($data ['s_masuk'] <= '1'){
                  echo "Stok Habis";
                }else
                {
                echo $data['s_masuk'];
                }
                ?> 
              </td>
                <td align="pull-right">
                    <div id="ckobat">
                    <input type="checkbox" hidden="" name="idm[]" id="idm<?php echo $data['id_m'] ?>" value="<?php echo $data['id_m'] ?>">
                      
                    <input type="checkbox" name="ido[]" onchange="
                    if (this.checked){
                    $('#idm<?php echo $data['id_m'] ?>').attr('checked', true);
                    $('#nmobat<?php echo $data['id_m'] ?>').attr('checked', true);
                    }else{
                      $('#idm<?php echo $data['id_m'] ?>').attr('checked', false);
                      $('#nmobat<?php echo $data['id_m'] ?>').attr('checked', false);
                    }" value="<?php echo $data['id_o'] ?>">
                    <input type="checkbox" hidden="" name="nmobat[]" id="nmobat<?php echo $data['id_m'] ?>" value="<?php echo $data['namaobat'] ?>">
                    </div>
                </td>
                

                </tr>
          
            <?php
            $id++;

            }
            ?>
               </tbody>
    </table>

     </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-info" onclick="sub();">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript"> 
  $('#pil_obat').focus(function(){
      //open bootsrap modal
      $("#pilih_obat").modal({
         show: true
      });
  });


function sub(){
  event.preventDefault();
  var obat = [];
  var id1 = [];
  var id2 = [];
  var nm_obat = [];
  $('#ckobat input:checked').map(function(){
      obat.push($(this).val());
  });

  var x = 0;
  var i = 0;
  for(i; i<obat.length;i++){
    switch(x){
      case 0:
        id1.push(obat[i]);
        break;
      case 1:
        id2.push(obat[i]);
        break;
      case 2:
        nm_obat.push(obat[i]);
        break; 
    }

    if(x==2){
      x=0;
    }else{
      x++;
    }
  }
  var ido ='';
  $.each(id1, function(index, val) {
      ido += ','+val;
  });
  $('.id_o').val(ido);

  var idm ='';
  $.each(id2, function(index, val) {
      idm += ','+val;
  });
  $('.id_m').val(idm);

  var nm ='';
  $.each(nm_obat, function(index, val) {
      nm += ' -'+val;
  });
  $('.obat').val(nm);

  $('#pilih_obat').modal('hide');
}
</script>