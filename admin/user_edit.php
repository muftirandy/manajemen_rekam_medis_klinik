 <div id="page-content-wrapper">
 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?link=1">Swedish Medical</a>
        </li>
        <li class="breadcrumb-item active">EDIT USER</li>
      </ol>
        <h2><i class="fa fa-gear"></i> Akun</h2>
      <hr>
<form action="proses_user.php?kode=1" method="POST" class="form" accept-charset="utf-8">

	<?php
	include "../koneksi.php";
		$user = $_SESSION['user_id'];
		$sql = "SELECT * FROM tb_user WHERE id = '$user'";
		$query = mysqli_query($connect,$sql);
		$value = mysqli_fetch_assoc($query);
	?>

	<input style="display: none;" type="text" name="id" value="<?php echo $value['id']; ?>">
	<div class="group">
		<label>Username : </label>
		<input type="text" class="form-control" name="username" value="<?php echo $value['username']; ?>">
	</div>
	<div class="form-group">
		<label>Password : </label>
		<input type="password" class="form-control" name="password_">
	</div>
	<button type="submit" class="btn btn-primary pull-right" onclick="alert('edit sukses!');" >Edit</button>
</form>
</div>
</div>