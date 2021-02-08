
	 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">DATA PASIEN</li>
      </ol>
        <center><h2><i class="fa fa-users"></i>Data Pasien</h2></center>
      <hr>
         <div class="card mb-3">
        <div class="card-header">
            <a href="home.php?link=6"> <button type="button" class="btn btn-success btn-sm">Tambah Pasien</button></a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table_pasien" width="100%">
              <thead>
                          <tr>
            <th><center>No</center></th>
            <th><center>NIP</center></th>
            <th><center>Nama</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th><center>Tgl. Lahir</center></th>
            <th><center>No. Askes</center></th>
            <th><center>Unit Kerja</center></th>
            <th><center>Telepon</center></th>
            <th><center>Alamat</center></th>
            <th><center>Action</center></th>
            <th style="display: none;"><center>id</center></th>
            </tr>
        </thead>
                              
                              
             <tbody>
        <?php

          include "../koneksi.php";
            

            $query ="SELECT * FROM data_pasien ORDER BY id DESC";
            $sql= mysqli_query($connect,$query);
            $id = 1;


            while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
              
         
          ?>

                <tr>
                <td width="10px"> <?php echo $id;?> </td>
                <td> <?php echo $data['nip'];?> </td>
                <td> <?php echo $data['nama'];?> </td>
                <td> <?php echo $data['jeniskelamin'];?> </td>
                <td> <?php echo date('d-m-Y',strtotime($data['tanggal']));?> </td>
                <td> <?php echo $data['askes'];?> </td>
                <td> <?php echo $data['unitkerja'];?> </td>
                <td> <?php echo $data['telpon'];?> </td>
                <td> <?php echo $data['alamat'];?> </td>
                <td style="display: none;"> <?php echo $data['id'];?> </td>
                <td align="pull-right">
                    <a href="home.php?link=9&id=<?php echo $data['id']; ?>" class="btn btn-outline btn-warning btn-sm" title="Edit Data"><span class="fa fa-pencil-square-o"> Edit</span></a>
                    &nbsp
                    <!-- <a href="proses_pasien.php?kode=1&id=<?php echo $data['id']; ?>" onclick="return confirm('hapus data?');" class="btn btn-outline btn-danger btn-sm" title="Hapus Data"><span class="fa fa-trash"> Hapus</span></a>
                    &nbsp -->
                    <a href="print_pasien.php?id=<?php echo $data['id'];?>"  class="btn btn-outline btn-success btn-sm" title="Hapus Data">Print</a>
                </td>
                

                </tr>
          
            <?php
            $id++;

            }
            ?>
               </tbody>
    </table>

    
    

