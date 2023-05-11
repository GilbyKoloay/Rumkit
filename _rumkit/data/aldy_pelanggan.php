<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Data Pelanggan</h4>

					<a href='index.php?menu=aldy_pelanggan&act=tambah' class='btn btn-success'>Tambah </a>

					<div class='table-responsive'>
                      <table class='table table-striped'>
					  <thead>


	  
	  
	  <tr><td>NO  <td>No KTP  <td>Nama Pelanggan  <td>Alamat  <td>No HP  <td>Foto  <td>Ubah Data  <td>Hapus Data  
					</thead>
						<tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_pelanggan");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[aldy_no_ktp]
				  <td>$r[aldy_nama]
				  <td>$r[aldy_alamat]
				  <td>$r[aldy_no_hp]
				  <td><img src='foto_pelanggan/$r[aldy_foto]' width=100>
				  <td><a href='index.php?menu=aldy_pelanggan&act=edit&aldy_no_ktp=$r[aldy_no_ktp]'>Edit </a>
				  <td><a href='index.php?menu=aldy_pelanggan&act=hapus&aldy_no_ktp=$r[aldy_no_ktp]'>Hapus </a>";
	  }
    break;

 case "tambah":
	   echo "
			 <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Tambah Data Pelanggan</h4>

	   		<form action='aldy_master.php?menu=aldy_pelanggan&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>No KTP			 <td><input type=text name='aldy_no_ktp' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Nama Pelanggan	 <td><input type=text name='aldy_nama' class='form-control' style='width:300px; height: 30px'>
			<tr><td>Alamat		     <td><input type=text name='aldy_alamat' class='form-control' style='width:400px; height: 30px'>
			<tr><td>Nomor Hp	     <td><input type=text name='aldy_no_hp' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Foto			 <td><input type=file name='foto_pelanggan' class='form-control' style='width:200px; height: 40px'>			
			<tr><td><td><input type=submit class='btn btn-dark btn-rounded btn-fw' name=proses value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_pelanggan where aldy_no_ktp='$_GET[aldy_no_ktp]'");
	 $r=mysqli_fetch_array($sql);

		echo "
			  <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Edit Data Pelanggan</h4>

			 <form action='aldy_master.php?menu=aldy_pelanggan&act=edit' enctype='multipart/form-data' method=POST>
			 <table class=table>
			 <input type=hidden name='aldy_no_ktp_ori' value='$_GET[aldy_no_ktp]'>
			 <tr><td>No KTP				<td><input type=text name='aldy_no_ktp' value='$r[aldy_no_ktp]' class='form-control' style='width:200px; height:									30px'>
			 <tr><td>Nama Pelanggan		<td><input type=text name='aldy_nama' value='$r[aldy_nama]' class='form-control' style='width:300px; height: 30px'>
			 <tr><td>Alamat				<td><input type=text name='aldy_alamat' value='$r[aldy_alamat]' class='form-control' style='width:400px; height:									30px'>
			 <tr><td>Nomor HP			<td><input type=text name='aldy_no_hp' value='$r[aldy_no_hp]' class='form-control' style='width:200px; height:									30px'>
			 <tr><td>Foto			    <td><input type=file name='foto_pelanggan' class='form-control' style='width:200px; height: 40px'> *kosongkan bila tidak mengganti foto
						
			<tr><td><td><input type=submit class='btn btn-secondary btn-rounded btn-fw' name=proses value=UPDATE>
			</table>
			<img src='foto_pelanggan/$r[aldy_foto]' width='100' height='100'>";
	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_pelanggan where aldy_no_ktp='$_GET[aldy_no_ktp]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
			<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Hapus Data Pelanggan</h4>

			
		  <form action='aldy_master.php?menu=aldy_pelanggan&act=hapus' method=POST>
		  <input type=hidden name='aldy_no_ktp' value='$_GET[aldy_no_ktp]'>
		  <table class=table>
		  <tr><td>No KTP			<td>: $r[aldy_no_ktp]
		  <tr><td>Nama Pelanggan	<td>: $r[aldy_nama]
		  <tr><td>Alamat	        <td>: $r[aldy_alamat]
		  <tr><td>Nomor HP		    <td>: $r[aldy_no_hp]
		  <tr><td><td><input type=submit class='btn btn-warning btn-rounded btn-fw' name=proses value=HAPUS>
		  </table>";

	break;
}
?>
</table>