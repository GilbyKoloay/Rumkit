<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>DATA OBAT</h4>

				  <a href='index.php?menu=aldy_obat&act=tambah' class='btn btn-success btn-md'>Tambah </a>

				  <div class='table-responsive pt-3'>
                    <table class='table table-bordered'>
                      <thead>
	  
	  
	  
	  <tr><td>Kode Obat  <td>Nama Obat  <td>Harga  <td>Ubah Data  <td>Hapus Data  
						</thead>
						<tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_obat");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$r[aldy_kd_obat]
				  <td>$r[aldy_nm_obat]
				  <td>$r[aldy_harga]
				  
				  <td><a href='index.php?menu=aldy_obat&act=edit&aldy_kd_obat=$r[aldy_kd_obat]'>Edit </a>
				  <td><a href='index.php?menu=aldy_obat&act=hapus&aldy_kd_obat=$r[aldy_kd_obat]'>Hapus </a>";
	  }
    break;

case "tambah":
	   echo "
			<div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM INPUT OBAT</h4>
			
			
	   		<form action='aldy_master.php?menu=aldy_obat&act=tambah' method=POST>
			<table class=table>
			<tr><td>Kode Obat		 <td><input type=text name='aldy_kd_obat' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Nama Obat		 <td><input type=text name='aldy_nm_obat' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Harga	     	 <td><input type=int name='aldy_harga' class='form-control' style='width:200px; height: 30px'>
						
			<tr><td><td><input type=submit name=proses class='btn btn-danger btn-icon-text' value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_obat where aldy_kd_obat='$_GET[aldy_kd_obat]'");
	 $r=mysqli_fetch_array($sql);

		echo "
			 <div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM EDIT OBAT</h4>
			 
			 
			 
			 <form action='aldy_master.php?menu=aldy_obat&act=edit' method=POST>
			 <table class=table>
			 <input type=hidden name='aldy_kd_obat_ori' value='$_GET[aldy_kd_obat]'>
			 <tr><td>Kode Obat		 <td><input type=text name='aldy_kd_obat' value='$r[aldy_kd_obat]' class='form-control' style='width:200px; height:								 30px'>
			 <tr><td>Nama Obat		 <td><input type=text name='aldy_nm_obat' value='$r[aldy_nm_obat]' class='form-control' style='width:200px; height:								 30px'>
			 <tr><td>Harga			 <td><input type=int name='aldy_harga' value='$r[aldy_harga]' class='form-control' style='width:200px; height: 30px'>
			 			
			 <tr><td><td><input type=submit name=proses class='btn btn-success btn-icon-text' value=UPDATE>
			 </table>";
	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_obat where aldy_kd_obat='$_GET[aldy_kd_obat]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
	 	  <div class='col-lg-6 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM HAPUS OBAT</h4>
	 
	 
		  
		  <form action='aldy_master.php?menu=aldy_obat&act=hapus' method=POST>
		  <input type=hidden name='aldy_kd_obat' value='$_GET[aldy_kd_obat]'>
		  <table class=table>
		  <tr><td>Kode Obat  <td>: $r[aldy_kd_obat]
		  <tr><td>Nama Obat  <td>: $r[aldy_nm_obat]
		  <tr><td>Harga	     <td>: $r[aldy_harga]
		  <tr><td><td><input type=submit name=proses class='btn btn-warning btn-icon-text' value=HAPUS>
		  </table>";

	break;

}
?>