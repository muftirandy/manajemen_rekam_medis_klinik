   <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">REKAM MEDIS</li>
      </ol>
      <center><h2><i class="fa fa-id-card-o"></i>Rekam Medis</i></h2></center>
      <hr>

 <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table_rekammedis" width="100%" cellspacing="0">
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
            

            $query ="SELECT * FROM data_pasien";
            $sql= mysqli_query($connect,$query);
            $id = 1;


            while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
              
         
          ?>

                <tr>
                <td> <?php echo $id;?> </td>
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
                    <a href="home.php?link=10&nip=<?php echo $data['nip'];?>" class="btn btn-outline btn-warning btn-sm" title="Pilih"><span>Pilih</span></a>
                

                </tr>
          
            <?php
            $id++;

            }
            ?>
               </tbody>
    </table>

    