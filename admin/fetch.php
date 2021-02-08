<?php
    include "koneksi.php";
    $column = array('nip', 'nama', 'jeniskelamin', 'tanggal', 'askes', 'unitkerja', 'telpon', 'alamat');

    $query = "SELECT * FROM data_pasien ";

    if(isset($_POST['fill_askes']) && $_POST['fill_askes'] == 1){
        if(isset($_POST['dari'], $_POST['sampai']) && $_POST['dari'] != '' && $_POST['sampai'] != ''){
            $dari	= date('Y-m-d',strtotime($_POST['dari']));
            $sampai	= date('Y-m-d',strtotime($_POST['sampai']));
            $query .= ' WHERE askes != "" AND tgl_daftar >= "'.$dari.'" AND tgl_daftar <= "'.$sampai.'"';
        }else{
        $query .= ' WHERE askes != "" ';
        }
    }elseif(isset($_POST['fill_askes']) && $_POST['fill_askes'] == 2){
        if(isset($_POST['dari'], $_POST['sampai']) && $_POST['dari'] != '' && $_POST['sampai'] != ''){
            $dari	= date('Y-m-d',strtotime($_POST['dari']));
            $sampai	= date('Y-m-d',strtotime($_POST['sampai']));
            $query .= ' WHERE askes = "" AND tgl_daftar >= "'.$dari.'" AND tgl_daftar <= "'.$sampai.'"';
        }else{
        $query .= ' WHERE askes = "" ';
        }
    }elseif(isset($_POST['fill_askes']) && $_POST['fill_askes'] == 0){
        if(isset($_POST['dari'], $_POST['sampai']) && $_POST['dari'] != '' && $_POST['sampai'] != ''){
            $dari	= date('Y-m-d',strtotime($_POST['dari']));
            $sampai	= date('Y-m-d',strtotime($_POST['sampai']));
            $query .= ' WHERE tgl_daftar >= "'.$dari.'" AND tgl_daftar <= "'.$sampai.'"';
        }else{
        $query .= '';
        }
    }

    if(isset($_POST['order'])){
        $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
    }else{
        $query .= 'ORDER BY id ASC ';
    }

    $query1 = '';

    if($_POST["length"] != -1){
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }



    $statement = $connect->prepare($query);

    $statement->execute();

    $statement = $connect->prepare($query . $query1);

    $statement->execute();

    $result = $statement->fetchAll();


    $id = 1;
    $data = array();

    foreach($result as $row){
        $sub_array = array();
        $sub_array[] = $id;
        $sub_array[] = $row['nip'];
        $sub_array[] = $row['nama'];
        $sub_array[] = $row['jeniskelamin'];
        $sub_array[] = date('d-m-Y', strtotime($row['tanggal']));
        $sub_array[] = $row['askes'];
        $sub_array[] = $row['unitkerja'];
        $sub_array[] = $row['telpon'];
        $sub_array[] = $row['alamat'];
        $sub_array[] = $row['tgl_daftar'];
        $data[] = $sub_array;
        $id++;
    }

    $output = array(
        "query" => $query,
        "data" => $data
    );

    echo json_encode($output);
?>