<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_klinik";

$connect = mysqli_connect($servername, $username, $password, $db);
if (!$connect){
	die("connection failed:" . mysqli_connect_error());
}
?>