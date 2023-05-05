<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>DATA PASIEN</h4>

				  <a href='index.php?menu=aldy_pasien&act=tambah' class='btn btn-success btn-md'>Tambah </a>

				  <div class='table-responsive pt-3'>
                    <table class='table table-bordered'>
                      <thead>


	  
	  
	  <tr><td>NO  <td>No Ruangan  <td>Nama Pasien  <td>Alamat Pasien  <td>Diagnosa  <td>Ubah Data  <td>Hapus Data  
					</thead>
					<tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_Pasien");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[aldy_no_rm]
				  <td>$r[aldy_nm_pasien]
				  <td>$r[aldy_al_pasien]
				  <td>$r[aldy_diagnosa]
				  <td><a href='index.php?menu=aldy_pasien&act=edit&aldy_no_rm=$r[aldy_no_rm]'>Edit </a>
				  <td><a href='index.php?menu=aldy_pasien&act=hapus&aldy_no_rm=$r[aldy_no_rm]'>Hapus </a>";
	  }
    break;

case "tambah":
	   echo "
			<div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM INPUT PASIEN</h4>
			
			
	   		<form action='aldy_master.php?menu=aldy_pasien&act=tambah' method=POST>
			<table class=table>
			<tr><td>No Ruangan		 <td><input type=text name='aldy_no_rm' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Nama Pasien		 <td><input type=text name='aldy_nm_pasien' class='form-control' style='width:300px; height: 30px'>
			<tr><td>Alamat		     <td><input type=text name='aldy_al_pasien' class='form-control' style='width:500px; height: 30px'>
			<tr><td>Diagnosa	     <td><input type=text name='aldy_diagnosa' class='form-control' style='width:200px; height: 30px'>
			
			<tr><td><td><input type=submit name=proses class='btn btn-danger btn-icon-text' value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_pasien where aldy_no_rm='$_GET[aldy_no_rm]'");
	 $r=mysqli_fetch_array($sql);

		echo "
			 <div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM EDIT PASIEN</h4>
			 
			 
			 
			 <form action='aldy_master.php?menu=aldy_pasien&act=edit' method=POST>
			 <table class=table>
			 <input type=hidden name='aldy_no_rm_ori' value='$_GET[aldy_no_rm]'>
			 <tr><td>No Ruangan			 <td><input type=text name='aldy_no_rm' value='$r[aldy_no_rm]' class='form-control' style='width:200px; height:									 30px'>
			 <tr><td>Nama Pasien		 <td><input type=text name='aldy_nm_pasien' value='$r[aldy_nm_pasien]' class='form-control' style='width:300px;									 height: 30px'>
			 <tr><td>Alamat				 <td><input type=text name='aldy_al_pasien' value='$r[aldy_al_pasien]' class='form-control' style='width:500px;									 height: 30px'>
			 <tr><td>Diagnosa			 <td><input type=text name='aldy_diagnosa' value='$r[aldy_diagnosa]' class='form-control' style='width:200px;									 height: 30px'>
			
			 <tr><td><td><input type=submit name=proses class='btn btn-success btn-icon-text' value=UPDATE>
			 </table>";
	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_pasien where aldy_no_rm='$_GET[aldy_no_rm]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
		  <div class='col-lg-6 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM HAPUS PASIEN</h4>
	 
	 
		  
		  <form action='aldy_master.php?menu=aldy_pasien&act=hapus' method=POST>
		  <input type=hidden name='aldy_no_rm' value='$_GET[aldy_no_rm]'>
		  <table class=table>
		  <tr><td>No Ruangan	   	 <td>: $r[aldy_no_rm]
		  <tr><td>Nama Pasien	     <td>: $r[aldy_nm_pasien]
		  <tr><td>Alamat			 <td>: $r[aldy_al_pasien]
		  <tr><td>Diagnosa		     <td>: $r[aldy_diagnosa]
		  <tr><td><td><input type=submit name=proses class='btn btn-warning btn-icon-text' value=HAPUS>
		  </table>";

	break;

}
?>