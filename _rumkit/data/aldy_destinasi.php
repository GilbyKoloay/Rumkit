<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Destinasi Wisata</h4>

					<a href='index.php?menu=aldy_destinasi&act=tambah' class='btn btn-success'>Tambah </a>
					
					<div class='table-responsive'>
                      <table class='table table-striped'>
					  <thead>
	  
	  				
	  
	  <tr><td>NO  <td>Kode Destinasi  <td>Tujuan  <td>Harga  <td>Hari  <td>Foto  <td>Ubah Data  <td>Hapus Data  
						</thead>
						<tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_destinasi");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[aldy_kd_destinasi]
				  <td>$r[aldy_tujuan]
				  <td>$r[aldy_harga]
				  <td>$r[aldy_hari]
				  <td><img src='foto_destinasi/$r[aldy_foto]' width=100>
				  <td><a href='index.php?menu=aldy_destinasi&act=edit&aldy_kd_destinasi=$r[aldy_kd_destinasi]'>Edit </a>
				  <td><a href='index.php?menu=aldy_destinasi&act=hapus&aldy_kd_destinasi=$r[aldy_kd_destinasi]'>Hapus </a>";
	  }
    break;

 case "tambah":
	   echo "
			  <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Tambah Data Destinasi</h4>

	   		<form action='aldy_master.php?menu=aldy_destinasi&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>Kode Destinasi	 <td><input type=text name='aldy_kd_destinasi' class='form-control' style='width:100px; height: 30px'>
			<tr><td>Tujuan			 <td><input type=text name='aldy_tujuan' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Harga		     <td><input type=int name='aldy_harga' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Hari		     <td><input type=text name='aldy_hari' class='form-control' style='width:270px; height: 30px'>
			<tr><td>Foto			 <td><input type=file name='foto_destinasi' class='form-control' style='width:200px; height: 40px'>			
			<tr><td><td><input type=submit class='btn btn-dark btn-rounded btn-fw' name=proses value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_destinasi where aldy_kd_destinasi='$_GET[aldy_kd_destinasi]'");
	 $r=mysqli_fetch_array($sql);

		echo "
			  <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Edit Data Destinasi</h4>

			 <form action='aldy_master.php?menu=aldy_destinasi&act=edit' enctype='multipart/form-data' method=POST>
			 <table class=table>
			 <input type=hidden name='aldy_kd_destinasi_ori' value='$_GET[aldy_kd_destinasi]'>
			 <tr><td>Kode Destinasi		<td><input type=text name='aldy_kd_destinasi' value='$r[aldy_kd_destinasi]' class='form-control'												style='width:100px; height: 30px'>
			 <tr><td>Tujuan				<td><input type=text name='aldy_tujuan' value='$r[aldy_tujuan]' class='form-control' style='width:200px; height:									30px'>
			 <tr><td>Harga			    <td><input type=int name='aldy_harga' value='$r[aldy_harga]' class='form-control' style='width:200px; height:									30px'>
			 <tr><td>Hari				 <td><input type=text name='aldy_hari' value='$r[aldy_hari]' class='form-control' style='width:270px; height:									30px'>
			 <tr><td>Foto			    <td><input type=file name='foto_destinasi' class='form-control' style='width:200px; height: 40px'> *kosongkan bila									tidak mengganti foto
						
			<tr><td><td><input type=submit class='btn btn-secondary btn-rounded btn-fw' name=proses value=UPDATE>
			</table>
			<img src='foto_destinasi/$r[aldy_foto]' width='100' height='100'>";
	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_destinasi where aldy_kd_destinasi='$_GET[aldy_kd_destinasi]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
			<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Hapus Data Destinasi</h4>

		  <form action='aldy_master.php?menu=aldy_destinasi&act=hapus' method=POST>
		  <input type=hidden name='aldy_kd_destinasi' value='$_GET[aldy_kd_destinasi]'>
		  <table class=table>
		  <tr><td>Kode Destinasi	<td>: $r[aldy_kd_destinasi]
		  <tr><td>Tujuan			<td>: $r[aldy_tujuan]
		  <tr><td>Harga		        <td>: $r[aldy_harga]
		  <tr><td>Hari		        <td>: $r[aldy_hari]
		  <tr><td><td><input type=submit class='btn btn-warning btn-rounded btn-fw' name=proses value=HAPUS>
		  </table>";

	break;
}
?>
</table>