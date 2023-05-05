<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Data Hotel</h4>

					<a href='index.php?menu=aldy_hotel&act=tambah' class='btn btn-success'>Tambah </a>

					<div class='table-responsive'>
                      <table class='table table-striped'>
					  <thead>

	  
	  
	  <tr><td>No  <td>Nama Hotel  <td>Kelas  <td>Harga  <td>Ubah Data  <td>Hapus Data  
					</thead>
						<tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_hotel");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[aldy_nm_hotel]
				  <td>$r[aldy_kelas]
				  <td>$r[aldy_harga]
				  
				  <td><a href='index.php?menu=aldy_hotel&act=edit&aldy_id_hotel=$r[aldy_id_hotel]'>Edit </a>
				  <td><a href='index.php?menu=aldy_hotel&act=hapus&aldy_id_hotel=$r[aldy_id_hotel]'>Hapus </a>";
	  }
    break;

case "tambah":
	   echo "
			  <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Tambah Data Hotel</h4>

	   		<form action='aldy_master.php?menu=aldy_hotel&act=tambah' method=POST>
			<table class=table>
			<tr><td>Nama hotel		 <td><input type=text name='aldy_nm_hotel' class='form-control' style='width:300px; height: 30px'>
			<tr><td>Kelas	     	 <td><select name='aldy_kelas' class='form-control' style='width:100px; height: 30px'>
										 <option value='VVIP'>VVIP
										 <option value='VIP'>VIP
										 <option value='Standart'>Standart
										 </select>
			<tr><td>Harga	     	 <td><input type=text name='aldy_harga' class='form-control' style='width:280px; height: 30px'>
						
			<tr><td><td><input type=submit class='btn btn-dark btn-rounded btn-fw' name=proses value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_hotel where aldy_id_hotel='$_GET[aldy_id_hotel]'");
	 $r=mysqli_fetch_array($sql);

		echo "
			   <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Edit Data Hotel</h4>


			 <form action='aldy_master.php?menu=aldy_hotel&act=edit' method=POST>
			 <table class=table>
			 <input type=hidden name='aldy_id_hotel' value='$_GET[aldy_id_hotel]'>
			 <tr><td>Nama hotel		 <td><input type=text name='aldy_nm_hotel' value='$r[aldy_nm_hotel]' class='form-control' style='width:300px; height:								 30px'>
			 <tr><td>Kelas			 <td><select name='aldy_kelas' class='form-control' style='width:100px; height: 30px'>
										 <option value='$r[aldy_kelas]' selected>$r[aldy_kelas]
										 <option value='VVIP'>VVIP
										 <option value='VIP'>VIP
										 <option value='Standart'>Standart
										 </select>
			 <tr><td>Harga			 <td><input type=text name='aldy_harga' value='$r[aldy_harga]' class='form-control' style='width:280px; height: 30px'>
			 			
			 <tr><td><td><input type=submit class='btn btn-secondary btn-rounded btn-fw' name=proses value=UPDATE>
			 </table>";
	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_hotel where aldy_id_hotel='$_GET[aldy_id_hotel]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
			<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Hapus Data Hotel</h4>
		
		  <form action='aldy_master.php?menu=aldy_hotel&act=hapus' method=POST>
		  <input type=hidden name='aldy_id_hotel' value='$_GET[aldy_id_hotel]'>
		  <table class=table>
		  <tr><td>Nama hotel  <td>: $r[aldy_nm_hotel]
		  <tr><td>Kelas		  <td>: $r[aldy_kelas]
		  <tr><td>Harga	      <td>: $r[aldy_harga]
		  <tr><td><td><input type=submit class='btn btn-warning btn-rounded btn-fw' name=proses value=HAPUS>
		  </table>";

	break;

}
?>