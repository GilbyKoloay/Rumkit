<?php
switch($_GET['act'])
{
	  default:
echo "

	  <div class='col-lg-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>Data User</h4>

				  <a href='index.php?menu=aldy_user&act=tambah' class='btn btn-success btn-md'>Tambah </a>

				  <div class='table-responsive pt-3'>
                    <table class='table table-bordered'>
                      <thead>

	  
	  
	  <tr><td>NO   <td>User Login   <td>Nama User   <td>Level  <td>Foto   <td>Ubah Data   <td>Hapus Data   
					</thead>
					<tbody>";


	  $no=0;
	  $tampil=mysqli_query($conn,"select * from aldy_user");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[aldy_user_login]
				  <td>$r[aldy_nama]
				  <td>$r[aldy_level]
				  <td><img src='foto_user/$r[aldy_foto]' width='100' height='100'>
				  <td><a href='index.php?menu=aldy_user&act=edit&aldy_id_user=$r[aldy_id_user]'>Edit </a>
				  <td><a href='index.php?menu=aldy_user&act=hapus&aldy_id_user=$r[aldy_id_user]'>Hapus </a>";
	  }
    break;

 case "tambah":
	   echo "
 			<div class='col-md-12 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>  FORM INPUT USER</h4>		
			
			
			
	   		<form action='aldy_master.php?menu=aldy_user&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>User Login		 <td><input type=text name='aldy_user_login' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Password		 <td><input type=text name='aldy_password' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Nama User	     <td><input type=text name='aldy_nama' class='form-control' style='width:500px; height: 30px'>
			<tr><td>Level		     <td><select name='aldy_level' class='form-control' style='width:100px; height: 30px'>
										 <option value='Admin'>Admin
										 <option value='User'>User
										 <option value='Operator'>Operator
										 </select>
			<tr><td>Foto	<td><input type=file name='foto_user' class='form-control' style='width:300px; height: 40px'>
			<tr><td><td><input type=submit name=proses class='btn btn-danger btn-icon-text' value=SIMPAN>
			</table>
			</div>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from aldy_user where aldy_id_user='$_GET[aldy_id_user]'");
	 $r=mysqli_fetch_array($sql);

	 echo "
	 	  <div class='col-lg-6 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>Form Edit User</h4>
	 
		  
		  
		  <form action='aldy_master.php?menu=aldy_user&act=edit' enctype='multipart/form-data' method=POST>
		  <table class=table>
		  <input type=hidden name='aldy_id_user' value='$_GET[aldy_id_user]'>
		  <tr><td>User Login	<td><input type=text name='aldy_user_login' value='$r[aldy_user_login]' class='form-control' style='width:200px; height:								30px'>

		  <tr><td>Password			<td><input type=text name='aldy_password' class='form-control' style='width:200px; height: 30px'>
		  <tr><td>Nama User	        <td><input type=text name='aldy_nama' value='$r[aldy_nama]' class='form-control' style='width:300px; height: 30px'>
		  <tr><td>Level		        <td><select name='aldy_level' class='form-control' style='width:100px; height: 30px'>
										 <option value='$r[aldy_level]' selected>$r[aldy_level]
										 <option value='Admin'>Admin
										 <option value='User'>User
										 <option value='Operator'>Operator
										 </select>
		  <tr><td>Foto     <td><input type=file name='foto_user' class='form-control' style='width:300px; height: 40px'> *kosongkan bila tidak mengganti							foto

		  <tr><td><td><input type=submit name=proses class='btn btn-success btn-icon-text' value=UPDATE>
		  </table>
		  <img src='foto_user/$r[aldy_foto]' width='100'>";

	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from aldy_user where aldy_id_user='$_GET[aldy_id_user]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
	 	  <div class='col-lg-6 grid-margin stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>FORM HAPUS USER</h4>
		  
		  
		  
		  <form action='aldy_master.php?menu=aldy_user&act=hapus' method=POST>
		  <input type=hidden name='aldy_id_user' value='$_GET[aldy_id_user]'>
		  <table class=table>
		  <tr><td>User Login		<td>: $r[aldy_user_login]
		  <tr><td>Nama User	        <td>: $r[aldy_nama]
		  <tr><td>Level		        <td>: $r[aldy_level]
		  <tr><td><td><input type=submit class='btn btn-warning btn-icon-text' name=proses value=HAPUS>
		  </table>";

	break;
}


?>
</table>