<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_aldyharahap_rs";
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
//echo "Koneksi berhasil";
mysqli_close($conn);
?>