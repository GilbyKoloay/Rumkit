<?php
session_start();
include "aldy_koneksi.php";
$conn = mysqli_connect($servername, $username, $password, $database);
$aldy_user_login=@$_POST['aldy_user_login'];
$aldy_password=@$_POST['aldy_password'];
$enpass=md5($aldy_password);
$sql=mysqli_query($conn,"select * from aldy_user where aldy_user_login='$aldy_user_login' and aldy_password='$enpass'");
$r=mysqli_fetch_array($sql);
if (!empty($r['aldy_nama']))
{
  $_SESSION['sukses']=1;
  header('location:index.php');
}
else
{
  echo "Maaf User dan Password Salah.
	   <br>Silahkan Ulangi Lagi
	   <br><a href=index.php>Login </a>";
	   exit;
}


?>