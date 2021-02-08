<?php 
session_start();
if(isset($_SESSION['username']) && $_SESSION['level'] == 3) {
  include "../koneksi.php";
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Swedish Medical Clinic</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/css/sb-admin.min.css">
    <!-- <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../font/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../asset/css/simple-sidebar.css" rel="stylesheet">
    <link href="../asset/css/sb-admin.css" rel="stylesheet">
    <link href="../asset/bootstrap/css/datepicker.css" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="../asset/datatables/jquery.dataTables.css" rel="stylesheet">
    
    <!-- <script  src="../asset/jquery/jquery-1.10.2.min.js" type="text/javascript" ></script>  -->
    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- <script src="../asset/bootstrap/js/bootstrap.min.js"></script> -->

</head>

<body>

    <div id="wrapper">

      <nav class="navbar navbar-dark bg-dark">

          <a  href="#menu-toggle" class="btn btn-primary btn-sm" id="menu-toggle" title="Lihat Menu"><span class="fa fa-bars"></span> Menu</a>
         
            <!--  <div class="panel-body"> -->
              
            <a href="../proses_logout.php"" class="btn btn-danger btn-sm" daonclick="return confirm('Apakah anda yakin ingin keluar ?')" name = "logout" title="Keluar Aplikasi" ><i class="fa fa-sign-out"></i>Logout</a>

                </ul>
            </li>
          </nav>

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav sidebar-dark bg-dark fixed-bottom ">

                <li class="sidebar-brand"><a href="home.php?link=1"><i class="fa fa-hospital-o" aria-hidden="true"></i>
                        Swedish Medical</a>
                </li>
      
                <li title="Data Pasien">
                    <a href="home.php?link=1"><i class="fa fa-home" aria-hidden="true"></i>HOME</a>
                </li>
                

                  <li title="Data Dokter">
                    <a href="home.php?link=15"><i class="fa fa-user-md" aria-hidden="true"></i> Data Dokter</a>
                </li>
                
                <li title="Data Pasien">
                    <a href="home.php?link=2"><i class="fa fa-users" aria-hidden="true"></i> Data Pasien</a>
                </li>
                <li title="Rekam Medis">
                    <a href="home.php?link=4"><i class="fa fa-id-card-o" aria-hidden="true"></i> Rekam Medis</a>
                </li>
                <li title="Ganti Password">
                    <a href=home.php?link=5"><i class="fa fa-gear" aria-hidden="true"></i> Ganti Password</a>
                </li>
              

                            <div class="panel-body" >
      <p class="bg-black" style="padding:10px;color:white;">
        <br>Selamat Datang, <?php echo $_SESSION['username'];?>
        <br>Anda login sebagai : Dokter
      </p>
    </div>
</ul>
            </div>
  <!--                   <div class="list-group">

  <div class="panel panel-success">

    <div  class="panel-heading bg-success">
      <a href="index.php" style="color:white;">Selamat Datang <i class="fa fa-user-o"></i> 
        <?php

                if($level=="owner" ){

                        echo "owner";
                    
                }elseif($level=="admin"){

                        echo "admin";
                }
       
                
               

        

                ?>

       </a>
    </div> -->


 <!--    <div class="panel-body">
      <p class="bg-danger" style="padding:10px;color:white;">
        <a href="logout.php" style="color:white;">Log Out</a>
      </p>
    </div> -->
        <!-- /#sidebar-wrapper -->

        <!-- PHP include -->
       
        <?php

$alamat = $_GET['link'];

if (isset ($alamat)) {
    
        
    if ($alamat == 2) {
        include "datapasien.php";
    }
    elseif ($alamat == 3) {
        include "dataobat.php";
    }
     elseif ($alamat == 4) {
        include "rekammedis.php";
    }
     elseif ($alamat == 5) {
        include "user_edit.php";
    }
      elseif ($alamat == 6) {
        include "tambah_pasien.php";
    }
      elseif ($alamat == 7) {
        include "tambah_obat.php";
    }
      elseif ($alamat == 8) {
        include "edit_obat.php";
    }
      elseif ($alamat == 9) {
        include "edit_pasien.php";
    }
      elseif ($alamat == 10) {
        include "catatanrekammedis.php";
    }
      elseif ($alamat == 11) {
        include "obatmasuk.php";
    }
      elseif ($alamat == 12) {
        include "tambah_rekammedis.php";
    }
      elseif ($alamat == 13) {
        include "edit_rekammedis.php";
    }
      elseif ($alamat == 14) {
        include "user_management.php";
    }
       elseif ($alamat == 15) {
        include "datadokter.php";
    }
      elseif ($alamat == 16) {
        include "tambah_dokter.php";
    }
     elseif ($alamat == 17) {
        include "edit_dokter.php";
    }

else { ?>

<!-- Page Content -->

  <div id="page-content-wrapper">
 <ol class="breadcrumb">
  <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active"><i class="fa fa-user"></i>
           Selamat Datang, <?php echo $_SESSION['username'];?>
        </li>
      </ol>
      <center><img src="../img/logo2.jpg" style="width:400px;"></center>
       <!-- <center><h2>SWEDISH MEDICAL KLINIK</h2></center>  -->
      <hr>
        <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-users"></i>
              </div>
              <div class="mr-5">Data Pasien</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="home.php?link=2">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-id-card-o"></i>
              </div>
              <div class="mr-5">Rekam Medis</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="home.php?link=4">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-user-md"></i>
              </div>
              <div class="mr-5">Data Dokter</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="home.php?link=15">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Page-Content-END -->

        <?php }
    }

?>


    </div>

<!-- PHP Include END -->

<!-- /#page-content-wrapper -->

    
<!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../asset/bootstrap/js/bootstrap.min.js"></script> -->
     <!-- Core plugin JavaScript-->
    <script src="../asset/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin.min.js"></script>
    <script src="../asset/bootstrap/js/bootstrap-datepicker.js"></script>
    <script src="../asset/datatables/dataTables.bootstrap.js"></script>

   

<script>
  
    
  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

 <style>
    .datepicker{z-index:1151;}
 </style>

<script>
    $(function(){
    $("#datepicker, #tanggal, #tanggalmasuk").datepicker({
    format:'dd-mm-yyyy'
    });
    });
 </script>

 <script type="text/javascript">
    $(document).ready(function(){
        $("#table_pasien, #table_obat, #table_rekammedis, #table_catatan_rekammedis, #table_user").DataTable()
    });
</script>

</body>

</html>

<?php }else{
    header ("location:../index.php");
    
}
?>