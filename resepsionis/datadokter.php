
	 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">DATA DOKTER</li>
      </ol>
        <center><h2><i class="fa fa-user-md"></i> Data Dokter</h2></center>
      <hr>
         <div class="card mb-3">
        <div class="card-header">
           <!--  <a href="home.php?link=16"> <button type="button" class="btn btn-success btn-sm">Tambah Dokter</button></a> -->
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table_pasien" width="100%">
              <thead>
                          <tr>
            <th><center>No</center></th>
            <th><center>Nama Dokter</center></th>
            <th><center>Spesialis</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th><center>Telpon</center></th>
            <th><center>Alamat</center></th>
            <th><center>Jadwal Dokter</center></th>
           <!--  <th><center>Action</center></th> -->
            <th style="display: none;"><center>id</center></th>
            </tr>
        </thead>
                              
                              
             <tbody>
        <?php

          include "../koneksi.php";
            

            $query ="SELECT * FROM data_dokter";
            $sql= mysqli_query($connect,$query);
            $id = 1;


            while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
              
         
          ?>

                <tr>
                <td width="10px"> <?php echo $id;?> </td>
                <td> <?php echo $data['namadokter'];?> </td>
                <td> <?php echo $data['spesialis'];?> </td>
                <td> <?php echo $data['jeniskelamin'];?> </td>
                <td> <?php echo $data['telepon'];?> </td>
                <td> <?php echo $data['alamat'];?> </td>
                <td> <?php echo $data['jadwal'];?> </td>
                <td style="display: none;"> <?php echo $data['id'];?> </td>
                <!-- <td align="pull-right">
                    <a href="home.php?link=17&id=<?php echo $data['id']; ?>" class="btn btn-outline btn-warning btn-sm" title="Edit Data"><span class="fa fa-pencil-square-o"> Edit</span></a>
                    &nbsp
                    <a href="proses_dokter.php?kode=1&id=<?php echo $data['id']; ?>" onclick="return confirm('hapus data?');" class="btn btn-outline btn-danger btn-sm" title="Hapus Data"><span class="fa fa-trash"> Hapus</span></a>
                </td> -->
                

                </tr>
          
            <?php
            $id++;

            }
            ?>
               </tbody>
    </table>

    
    

