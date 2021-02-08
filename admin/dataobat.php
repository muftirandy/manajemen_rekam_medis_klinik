
   <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">DATA OBAT</li>
      </ol>
       <center><h2><i class="fa fa-medkit"></i>Data Obat</h2></center>
      <hr>

         <div class="card mb-3">
        <div class="card-header">  
         <a href="home.php?link=7"> <button type="button" class="btn btn-success btn-sm">Tambah Obat</button></a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="table_obat" class="table table-bordered table-striped" width="100%">
              <thead>
                          <tr>
            <th><center>No</center></th>
            <th><center>Nama Obat</center></th>
            <th><center>Kategori</center></th>
            <!-- <th><center>Tgl. Masuk</center></th> -->
            <th><center>Stok</center></th>
            <th><center>Action</center></th>
            <th style="display: none;"><center>id</center></th>
            <th style="display: none;"><center>id</center></th>
            </tr>
        </thead>
                              
                              
             <tbody>
        <?php

          include "../koneksi.php";
            

            $query ="SELECT *,b.id as idk,a.id as ido FROM dataobat a LEFT JOIN kategori b ON a.kategori = b.id";
            $sql= mysqli_query($connect,$query);
            $id = 1;


            while( $data = mysqli_fetch_array ($sql,MYSQLI_BOTH)){
              
         
        ?>

                <tr>
                <td> <?php echo $id;?> </td>
                <td> <?php echo $data['namaobat'];?> </td>
                <td> <?php echo $data['namakategori'];?> </td>
                <!-- <td> <?php echo date('d-m-Y',strtotime($data['tanggalmasuk']));?> </td> -->
                 <td> 
                <?php
                if ($data ['stok'] <= '1'){
                  echo "Stok Habis";
                }else
                {
                echo $data['stok'];
                }
                ?> 
              </td>
                <td style="display: none;"> <?php echo $data['ido'];?> </td>
                <td style="display: none;"> <?php echo $data['kategori'];?> </td>
                <td align="pull-right">
                    <a href="home.php?link=8&id=<?php echo $data['ido']; ?>" class="btn btn-outline btn-success btn-sm" title="Edit Data"><span class="fa fa-pencil-square-o"> Edit</span></a>
                      &nbsp
                    <a href="proses_obat.php?kode=1&id=<?php echo $data['ido']; ?>" onclick="return confirm('hapus data?');" class="btn btn-outline btn-danger btn-sm" title="Hapus Data"><span class="fa fa-trash"> Hapus</span></a>
                </td>
                

                </tr>
          
            <?php
            $id++;

            }
            ?>
               </tbody>
    </table>

