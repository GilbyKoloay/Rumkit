<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>INFO RUMAH SAKIT</h4>

				  <a href='index.php?menu=aldy_info&act=tambah' class='btn btn-success btn-md'>Tambah </a>

				  <div class='table-responsive pt-3'>
                    <table class='table table-bordered'>
                      <thead>

	  
	  <tr><td>Id Info  <td>Judul  <td>Isi  <td>Foto  <td>Ubah Data  <td>Hapus Data  
						</thead>
						<tbody>";
	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_info");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$r[aldy_id_info]
				  <td>$r[aldy_judul]
				  <td>$r[aldy_isi_info]
				  <td><img src='foto_info/$r[aldy_foto]' width=300	>
				  <td><a href='index.php?menu=aldy_info&act=edit&aldy_id_info=$r[aldy_id_info]'>Edit </a>
				  <td><a href='index.php?menu=aldy_info&act=hapus&aldy_id_info=$r[aldy_id_info]'>Hapus </a>";
	  }
    break;

case "tambah":
	   echo "
			<div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM INPUT INFO RS</h4>
			
			
			
	   		<form action='aldy_master.php?menu=aldy_info&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>Id Info			 <td><input type=int name='aldy_id_info' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Judul			 <td><input type=text name='aldy_judul' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Isi				 <td><input type=longtext name='aldy_isi_info'class='form-control'>
			<tr><td>Foto			 <td><input type=file name='foto_info' class='form-control' style='width:300px; height: 40px'>			
			<tr><td><td><input type=submit name=proses class='btn btn-danger btn-icon-text' value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_info where aldy_id_info='$_GET[aldy_id_info]'");
	 $r=mysqli_fetch_array($sql);

		echo "
			 <div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM EDIT INFO RS</h4>
			 
			 
			 
			 <form action='aldy_master.php?menu=aldy_info&act=edit' enctype='multipart/form-data' method=POST>
			 <table class=table>
			 <input type=hidden name='aldy_id_info_ori' value='$_GET[aldy_id_info]'>
			 <tr><td>Id Info		 <td><input type=int name='aldy_id_info' value='$r[aldy_id_info]' class='form-control' style='width:200px; height:								 30px'>
			 <tr><td>Judul			 <td><input type=text name='aldy_judul' value='$r[aldy_judul]' class='form-control' style='width:200px; height: 30px'>
			 <tr><td>Isi			 <td><input type=longtext name='aldy_isi_info' value='$r[aldy_isi_info]'class='form-control'>
			 <tr><td>Foto		     <td><input type=file name='foto_info' class='form-control' style='width:300px; height: 40px'> *kosongkan bila tidak								 mengganti foto
			 			
			 <tr><td><td><input type=submit name=proses class='btn btn-success btn-icon-text' value=UPDATE>
			 </table>
			 <img src='foto_info/$r[aldy_foto]' width='100'>";
	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_info where aldy_id_info='$_GET[aldy_id_info]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
	 	  <div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM HAPUS INFO</h4>
	 
	 
		  
		  <form action='aldy_master.php?menu=aldy_info&act=hapus' method=POST>
		  <input type=hidden name='aldy_id_info' value='$_GET[aldy_id_info]'>
		  <table class=table>
		  <tr><td>Judul	   	 <td>: $r[aldy_judul]
		  <tr><td>Isi	     <td>: $r[aldy_isi_info]
		  <tr><td><td><input type=submit name=proses class='btn btn-warning btn-icon-text' value=HAPUS>
		  </table>";

	break;

}
?>