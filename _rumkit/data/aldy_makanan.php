<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Makanan</h4>

					<a href='index.php?menu=aldy_makanan&act=tambah' class='btn btn-success'>Tambah </a>

					<div class='table-responsive'>
                      <table class='table table-striped'>
					  <thead>

	  
	  
	  <tr><td>NO   <td>Paket Makanan   <td>Harga   <td>Foto   <td>Ubah Data   <td>Hapus Data   
						</thead>
						<tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_makanan");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[aldy_paket]
				  <td>$r[aldy_harga]
				  <td><img src='foto_makanan/$r[aldy_foto]' width='100'>
				  <td><a href='index.php?menu=aldy_makanan&act=edit&aldy_id_makanan=$r[aldy_id_makanan]'>Edit </a>
				  <td><a href='index.php?menu=aldy_makanan&act=hapus&aldy_id_makanan=$r[aldy_id_makanan]'>Hapus </a>";
	  }
    break;

 case "tambah":
	   echo "
				<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Tambah Data Makanan</h4>

	   		<form action='aldy_master.php?menu=aldy_makanan&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>Paket Makanan		 <td><select name='aldy_paket' class='form-control' style='width:100px; height: 30px'>
										 <option value='Deluxe'>Deluxe
										 <option value='Superior'>Superior
										 <option value='Standart'>Standart
										 </select>
			<tr><td>Harga			     <td><input type=text name='aldy_harga' class='form-control' style='width:250px; height: 30px'>
			<tr><td>Foto				 <td><input type=file name='foto_makanan' class='form-control' style='width:200px; height: 40px'>
			<tr><td><td><input type=submit class='btn btn-dark btn-rounded btn-fw' name=proses value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_makanan where aldy_id_makanan='$_GET[aldy_id_makanan]'");
	 $r=mysqli_fetch_array($sql);

	 echo "<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Edit Data Makanan</h4>

		  <form action='aldy_master.php?menu=aldy_makanan&act=edit' enctype='multipart/form-data' method=POST>
		  <table class=table>
		  <input type=hidden name='aldy_id_makanan' value='$_GET[aldy_id_makanan]'>
		  <tr><td>Paket Makanan			 <td><select name='aldy_paket' class='form-control' style='width:100px; height: 30px'>
										 <option value='$r[aldy_paket]' selected>$r[aldy_paket]
										 <option value='Deluxe'>Deluxe
										 <option value='Superior'>Superior
										 <option value='Standart'>Standart
										 </select>
		  <tr><td>Harga		        <td><input type=text name='aldy_harga' value='$r[aldy_harga]' class='form-control' style='width:250px; height: 30px'>
		  <tr><td>Foto			    <td><input type=file name='foto_makanan' class='form-control' style='width:300px; height: 40px'> *kosongkan bila tidak									mengganti foto
		  <tr><td><td><input type=submit class='btn btn-secondary btn-rounded btn-fw' name=proses value=UPDATE>
		  </table>
		  <img src='foto_makanan/$r[aldy_foto]' width='100' height='100'>";

	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_makanan where aldy_id_makanan='$_GET[aldy_id_makanan]'");
	 $r=mysqli_fetch_array($sql);
	 echo "<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Hapus Data Makanan</h4>

		  <form action='aldy_master.php?menu=aldy_makanan&act=hapus' method=POST>
		  <input type=hidden name='aldy_id_makanan' value='$_GET[aldy_id_makanan]'>
		  <table class=table>
		  <tr><td>Paket Makanan		<td>: $r[aldy_paket]
		  <tr><td>Harga		        <td>: $r[aldy_harga]
		  <tr><td><td><input type=submit class='btn btn-warning btn-rounded btn-fw' name=proses value=HAPUS>
		  </table>";

	break;
}


?>
</table>