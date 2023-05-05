<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Data Laporan Bulanan</h4>

					<a href='index2.php?menu=laporan_bulanan&act=tambah' class='btn btn-success'>Tambah </a>

					<div class='table-responsive'>
                      <table class='table table-striped'>
					  <thead>


	  
	  
	  <tr><td>NO   <td>Deskripsi   <td>Nama   <td>Ubah Data   <td>Hapus Data   
						</thead>
						<tbody>";

	  $no=0;
	  $tampil=mysqli_query($conn,"select * from laporan_bulanan");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[bulanan]
				  <td>$r[nama]
				  <td><a href='index2.php?menu=laporan_bulanan&act=edit&id=$r[id]'>Edit </a>
				  <td><a href='index2.php?menu=laporan_bulanan&act=hapus&id=$r[id]'>Hapus </a>";
	  }
    break;

 case "tambah":
	   echo "
 			 
              <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Tambah Data Laporan Harian</h4>
 
 

	   		<form action='aldy_master.php?menu=laporan_bulanan&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>Deskripsi	 <td><input type=text name='harian' class='form-control' style='width:150px; height: 30px'>
			<tr><td>Nama		 <td><input type=text name='nama' class='form-control' style='width:200px; height: 30px'>
			<tr><td><td><input type=submit class='btn btn-dark btn-rounded btn-fw' name=proses value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from laporan_bulanan where id='$_GET[id]'");
	 $r=mysqli_fetch_array($sql);

	 echo "
	 		<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Edit Data laporan_bulanan</h4>


		  <form action='aldy_master.php?menu=laporan_bulanan&act=edit' enctype='multipart/form-data' method=POST>
		  <table class=table>
		  <input type=hidden name='id' value='$_GET[id]'>
		  <tr><td>Deskripsi		<td><input type=text name='bulanan' value='$r[bulanan]' class='form-control' style='width:150px;								height: 30px'>
		  <tr><td>Nama			<td><input type=text name='nama' value='$r[nama]' class='form-control' style='width:200px; height: 30px'>
		  <tr><td><td><input type=submit class='btn btn-secondary btn-rounded btn-fw' name=proses value=UPDATE>
		  </table>";

	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from laporan_bulanan where id='$_GET[id]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
			<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Hapus Data laporan_bulanan</h4>


		  <form action='aldy_master.php?menu=laporan_bulanan&act=hapus' method=POST>
		  <input type=hidden name='id' value='$_GET[id]'>
		  <table class=table>
		  <tr><td>Deskripsi	<td>: $r[bulanan]
		  <tr><td>Nama        <td>: $r[nama]
		  <tr><td><td><input type=submit class='btn btn-warning btn-rounded btn-fw' name=proses value=HAPUS>
		  </table>";

	break;
}


?>
</table>