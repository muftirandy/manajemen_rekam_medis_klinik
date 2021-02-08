   <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">OBAT MASUK</li>
      </ol>
      <center><h2><i class="fa fa-medkit"></i> Obat Masuk</i></h2></center>
      <hr>
        </div>
        <div class="card-body">
          <div class="table-responsive">
<form class="form" action="proses_obat.php?kode=4&id=" method="POST" accept-charset="utf-8">
	<div class="form-group">
        <b><label class="control-label"> Nama Obat :</label></b>
        <select name="namaobat" class="form-control" required>
          <option value="" selected="" disabled >~ Pilih Obat ~</option>
          <?php 
          include "../koneksi.php";
            $sql = "SELECT * FROM dataobat";
            $query = mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_assoc($query)) { ?>
                
          <option value="<?php echo $data['id'] ?>" > <?php echo $data['namaobat'] ?></option>
           <?php }
           ?>
        </select>
      </div>
    
      <div class="form-group">
        <b><label class="control-label"> Tanggal Expired :</label></b>
        <input type="text" id="datepicker" class="form-control" name="tanggalexpired" value="" placeholder="Masukkan Tanggal expired" required>
      </div>
      <div class="form-group">
        <b><label class="control-label"> Stok :</label></b>
        <input type="number" class="form-control" name="stok" value="" placeholder="Masukkan Stok" required>
      </div>
    </div>
        <div>
          <center>
        <button type="submit" class="btn btn-primary" >Tambah</button>
        </form>
      </center>
      </div>
    </div>

<!--    <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">DATA OBAT</li>
      </ol> -->
      <hr>
       <center><h2><i class="fa fa-medkit"></i>Detail Data Obat</h2></center>

         <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
            <table id="table_obat" class="table table-bordered table-striped" width="100%">
              <thead>
                          <tr>
            <th style="display: none;"><center>No</center></th>
            <th style="display: none;"><center>No</center></th>
            <th style="display: none;"><center>No</center></th>
            <th><center>No</center></th>
            <th><center>Nama Obat</center></th>
            <th><center>Kategori</center></th>
            <th><center>Tgl. Masuk</center></th>
            <th><center>Tgl. Expired</center></th>
            <th><center>Stok</center></th>
            <th><center>Action</center></th>
            </tr>
        </thead>
                              
                              
             <tbody>
        <?php

          include "../koneksi.php";
            

            $query = "SELECT 
            a.*,
            c.*,
            b.*,
            c.namaobat as nm_obat,
            a.namaobat as ido, 
            a.tanggalmasuk as tgl_msk, 
            a.stok as s_masuk,
            a.id as idm
            FROM obatmasuk a 
            LEFT JOIN dataobat c ON a.namaobat = c.id
            LEFT JOIN kategori b ON c.kategori = b.id ORDER BY nm_obat, tanggalexpired ASC";
            $sql = mysqli_query($connect,$query);
            $id = 1;

            echo mysqli_error($connect);
            while( $data = mysqli_fetch_array($sql)){
                       
        ?>
              <tr>
              <td style="display: none;"><?php echo $data['idm']; ?></td>
              <td style="display: none;"><?php echo $data['ido']; ?></td>
              <td style="display: none;"><?php echo $data['s_masuk']; ?></td>
              <td> <?php echo $id;?></td>
              <td> <?php echo $data['nm_obat'];?> </td>
              <td> <?php echo $data['namakategori'];?> </td>
              <td> <?php echo date('d-m-Y',strtotime($data['tgl_msk']));?> </td>
              <td> <?php echo date('d-m-Y',strtotime($data['tanggalexpired']));?>
                   <?php  
                    $masaaktif = "$data[tanggalexpired]"; 
                    $sekarang = date("d-m-Y"); 
                    $masaberlaku = strtotime($masaaktif) - strtotime($sekarang); 
                    ?> 
                    <?php  
                    if($masaberlaku/(24*60*60)<1) 
                    { 
                    echo "<font color='red'><font size=1>Sudah  Habis!!!"; 
                    } 
                    else if($masaberlaku/(24*60*60)<30) 
                    { 
                    echo "".$masaberlaku/(24*60*60)." hari lagi"; 
                    echo " 
                    <font color='blue'><font size=1><b>Masa Berlaku akan Habis!!!</b></font>"; 
                    } 
                    ?>
                     </td>
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
              <a href="#" class="btn btn-outline btn-warning btn-sm" data-target="#edit" data-toggle="modal" title="Edit Data"><span class="fa fa-pencil-square-o"> Edit</span></a>
                    &nbsp
              <a href="proses_obat.php?kode=5&idm=<?php echo $data['idm'] ?>&ido=<?php echo $data['ido'] ?>&stok=<?php echo $data['s_masuk'] ?>" onclick="return confirm('hapus data?');" class="btn btn-outline btn-danger btn-sm" title="Hapus Data"><span class="fa fa-trash"> Hapus</span></a>
              </td>
              </tr>
          
            <?php
            $id++;

              }
            ?>
               </tbody>
    </table>

    <!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form action="proses_obat.php?kode=6" method="POST" class="form" accept-charset="utf-8">
      <input style="display: none;" type="text" name="ido" id="ido" value="">
      <input style="display: none;" type="text" name="idm" id="idm" value="">
      <div class="form-group">
        <b><label class="control-label"> Nama Obat :</label></b>
        <select name="namaobat_" id="namao" class="form-control" required>
          <option value="" selected="" disabled >~ Pilih Obat ~</option>
          <?php 
          include "../koneksi.php";
            $sql = "SELECT * FROM dataobat";
            $query = mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_assoc($query)) { ?>
          <option value="<?php echo $data['id'] ?>" > <?php echo $data['namaobat'] ?></option>
           <?php }
           ?>
        </select>
      </div>
    
      <div class="form-group">
        <b><label class="control-label"> Tanggal Expired :</label></b>
        <input type="text" id="datepicker" class="form-control exp" name="tanggalexpired_" value="" placeholder="Masukkan Tanggal expired" required>
      </div>
      <div class="form-group">
        <b><label class="control-label"> Stok :</label></b>
        <input type="number" class="form-control stok" name="stok_" value="" placeholder="Masukkan Stok" readonly>
      </div>
    <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Edit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
      </div>
    </div>

  </div>
</div>

<script>
$(".btn[data-target='#edit']").on('click',function(){
 $("#idm").val($(this).closest('tr').children()[0].textContent);
 $("#ido").val($(this).closest('tr').children()[1].textContent);
  $("#namao").val($(this).closest('tr').children()[1].textContent);
  $(".exp").val($(this).closest('tr').children()[6].textContent);
  $(".stok").val($(this).closest('tr').children()[2].textContent);
});
</script>



