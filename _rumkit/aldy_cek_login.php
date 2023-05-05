<?php
session_start();
include "aldy_koneksi.php";
$conn = mysqli_connect($servername, $username, $password, $database);
$username=@$_POST['username'];
$password=@$_POST['password'];
$enpass=md5($password);
$sql=mysqli_query($conn,"select * from user where username='$username' and password='$enpass'");
$r=mysqli_fetch_array($sql);
if (!empty($r['nama']))
{
  $_SESSION['sukses']=1;
  header('location:index2.php');
}
else
{
  
  echo"<tr><td>Maaf User dan Password Salah.
	   <br>Silahkan Ulangi Lagi
	   <br><a href=index.php>Login </a>";
	   exit;
}


?>