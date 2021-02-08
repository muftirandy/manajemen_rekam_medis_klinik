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
            $data = array();
            while ($isi = mysqli_fetch_array($sql)) {
                $data[] = $isi;
            }
            echo json_encode(array('data' => $data));

   ?>