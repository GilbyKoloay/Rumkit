<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>Data Dokter</h4>

				  <a href='index.php?menu=aldy_dokter&act=tambah' class='btn btn-success btn-md'>Tambah </a>

				  <div class='table-responsive pt-3'>
                    <table class='table table-bordered'>
                      <thead>


	  
	  
	  <tr><td>NO  <td>Kode Dokter  <td>Nama Dokter  <td>Alamat  <td>Jenis Kelamin  <td>No HP  <td>Spesialis  <td>Foto  <td>Ubah Data  <td>Hapus Data  
				  </thead>
				  <tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_dokter");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[aldy_kd_dokter]
				  <td>$r[aldy_nm_dokter]
				  <td>$r[aldy_alamat]
				  <td>$r[aldy_jekel]
				  <td>$r[aldy_no_hp]
				  <td>$r[aldy_spesialis]
				  <td><img src='foto_dokter/$r[aldy_foto]' width=100>
				  <td><a href='index.php?menu=aldy_dokter&act=edit&aldy_kd_dokter=$r[aldy_kd_dokter]'>Edit </a>
				  <td><a href='index.php?menu=aldy_dokter&act=hapus&aldy_kd_dokter=$r[aldy_kd_dokter]'>Hapus </a>";
	  }
    break;

 case "tambah":
	   echo "
 			<div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM INPUT DOKTER</h4>
			
			
	   		<form action='aldy_master.php?menu=aldy_dokter&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>Kode Dokter		 <td><input type=text name='aldy_kd_dokter' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Nama Dokter		 <td><input type=text name='aldy_nm_dokter' class='form-control' style='width:300px; height: 30px'>
			<tr><td>Alamat		     <td><input type=text name='aldy_alamat' class='form-control' style='width:500px; height: 30px'>
			<tr><td>Jenis Kelamin	 <td><select name='aldy_jekel' class='form-control' style='width:200px; height: 30px'>
										 <option value='Pria'>Pria
										 <option value='Wanita'>Wanita
										 </select>
			<tr><td>Nomor Hp	     <td><input type=text name='aldy_no_hp' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Spesialis	     <td><input type=text name='aldy_spesialis' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Foto	<td><input type=file name='foto_dokter' class='form-control' style='width:300px; height: 40px'>			
			<tr><td><td><input type=submit name=proses class='btn btn-danger btn-icon-text' value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_dokter where aldy_kd_dokter='$_GET[aldy_kd_dokter]'");
	 $r=mysqli_fetch_array($sql);

		echo "
			 <div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM EDIT DOKTER</h4>
			 
			 
			 
			 <form action='aldy_master.php?menu=aldy_dokter&act=edit' enctype='multipart/form-data' method=POST>
			 <table class=table>
			 <input type=hidden name='aldy_kd_dokter_ori' value='$_GET[aldy_kd_dokter]'>
			 <tr><td>Kode Dokter		<td><input type=text name='aldy_kd_dokter' value='$r[aldy_kd_dokter]' class='form-control' style='width:200px;									height: 30px'>
			 <tr><td>Nama Dokter		<td><input type=text name='aldy_nm_dokter' value='$r[aldy_nm_dokter]' class='form-control' style='width:300px;									height: 30px'>
			 <tr><td>Alamat				<td><input type=text name='aldy_alamat' value='$r[aldy_alamat]' class='form-control' style='width:500px; height:									30px'>
			 <tr><td>Jenis Kelamin		<td><select name='aldy_jekel' class='form-control' style='width:200px; height: 30px'>
										 <option value='$r[aldy_jekel]' selected>$r[aldy_jekel]
										 <option value='Pria'>Pria
										 <option value='Wanita'>Wanita
										 </select>
			<tr><td>Nomor HP			<td><input type=text name='aldy_no_hp' value='$r[aldy_no_hp]' class='form-control' style='width:200px; height:									 30px'>
			<tr><td>Spesialis			<td><input type=text name='aldy_spesialis' value='$r[aldy_spesialis]' class='form-control' style='width:200px;									 height: 30px'>
			<tr><td>Foto     <td><input type=file name='foto_dokter' class='form-control' style='width:300px; height: 40px'> *kosongkan bila tidak mengganti foto
						
			<tr><td><td><input type=submit name=proses class='btn btn-success btn-icon-text' value=UPDATE>
			</table>
			<img src='foto_dokter/$r[aldy_foto]' width='100'>";
	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_dokter where aldy_kd_dokter='$_GET[aldy_kd_dokter]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
	 	  <div class='col-lg-6 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM HAPUS DOKTER</h4>
		  
		  
		  <form action='aldy_master.php?menu=aldy_dokter&act=hapus' method=POST>
		  <input type=hidden name='aldy_kd_dokter' value='$_GET[aldy_kd_dokter]'>
		  <table class=table>
		  <tr><td>Kode Dokter		<td>: $r[aldy_kd_dokter]
		  <tr><td>Nama Dokter		<td>: $r[aldy_nm_dokter]
		  <tr><td>Alamat	        <td>: $r[aldy_alamat]
		  <tr><td>Jenis Kelamin     <td>: $r[aldy_jekel]
		  <tr><td>Nomor HP		    <td>: $r[aldy_no_hp]
		  <tr><td>Spesialis         <td>: $r[aldy_spesialis]
		  <tr><td><td><input type=submit name=proses class='btn btn-warning btn-icon-text' value=HAPUS>
		  </table>";

	break;
}
?>
</table>