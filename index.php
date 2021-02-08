<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LOGIN</title>
  <!-- Bootstrap core CSS-->
  <link href="asset/bootstrap/css/bootstrap2.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body style="background-image: url(img/bg.jpg); background-size: 100%">
  <div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-sm-12">    
    <div class="card card-login mx-auto mt-5">
      <div align="center" class="card-header" style = "background-color: #3333ff; color: white;" >LOGIN</div>
      <div class="card-body">
       <form action="proses_login.php" method="POST" class="form">
          <div class="form-group">
            <label for="exampleInputEmail1"> <i class="fa fa-user" aria-hidden="true"></i> UserName</label>
              <input type="text" name="username" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"> <i class="fa fa-key" aria-hidden="true"></i> Password</label>
            <input type="password" name="password" class="form-control" required="">
          </div>
          <center><button type="submit" class="btn btn-primarypull"> <i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN </button>
        </center>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="asset/bootstrap/jquery/jquery.min.js"></script>
  <script src="asset/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="asset/bootstrap/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>