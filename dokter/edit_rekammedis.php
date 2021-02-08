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
        <input type="text" hidden="" name="id_o" class="id_o" value="">
        <input type="text" hidden="" name="id_m" class="id_m" value="">
      <div class="form-group">
        <b><label> Diagnosa :</label></b>
        <textarea class="form-control" name="diagnosa" value="" style="width:500px;"><?php echo $value['diagnosa']; ?></textarea>
      </div>
      <div class="form-group">
        <b><label> Obat : </label></b>
        <textarea class="form-control obat" id="pil_obat" placeholder="obat" name="obat" wrap="hard" style="width:500px;"><?php echo $value['obat'] ?></textarea>
      </div>
      <div class="form-group">
        <b><label> Diagnosa :</label></b>
        <textarea class="form-control" name="terapi" value="" style="width:500px;"><?php echo $value['terapi']; ?></textarea>
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
                <td align="pull-right" id="ckobat">
                    <input type="checkbox"  name="ido[]" onchange=" if (this.checked){
                    $('#idm<?php echo $data['id_m'] ?>').attr('checked', true);
                    $('#nmobat<?php echo $data['id_m'] ?>').attr('checked', true);
                    }else{
                      $('#idm<?php echo $data['id_m'] ?>').attr('checked', false);
                      $('#nmobat<?php echo $data['id_m'] ?>').attr('checked', false);
                    }" value="<?php echo $data['id_o'] ?>">
                    <input type="checkbox" hidden name="idm[]" id="idm<?php echo $data['id_m'] ?>" value="<?php echo $data['id_m'] ?>">
                    <input type="checkbox" hidden name="nmobat[]" id="nmobat<?php echo $data['id_m'] ?>" value="<?php echo $data['namaobat'] ?>">
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
        <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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