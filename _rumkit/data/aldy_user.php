<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Data User</h4>

					<a href='index2.php?menu=aldy_user&act=tambah' class='btn btn-success'>Tambah </a>

					<div class='table-responsive'>

                      <table class='table table-striped'>
					  <thead>


	  
	  
	  <tr><td>NO   <td>Username   <td>Nama   <td>Level  <td>Foto   <td>Ubah Data   <td>Hapus Data   
						</thead>
						<tbody>";

	  $no=0;
	  $tampil=mysqli_query($conn,"select * from user");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
				  <td>$r[username]
				  <td>$r[nama]
				  <td>$r[level]
				  <td><img src='foto_user/$r[foto_user]' width='100'>
				  <td><a href='index2.php?menu=aldy_user&act=edit&id=$r[id]'>Edit </a>
				  <td><a href='index2.php?menu=aldy_user&act=hapus&id=$r[id]'>Hapus </a>";
	  }
    break;

 case "tambah":
	   echo "
              <div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Tambah Data User</h4>
 
	   		<form action='aldy_master.php?menu=aldy_user&act=tambah' enctype='multipart/form-data' method=POST>
			<table class=table>
			<tr><td>Username		 <td><input type=text name='username' class='form-control' style='width:150px; height: 30px'>
			<tr><td>Password		 <td><input type=text name='password' class='form-control' style='width:200px; height: 30px'>
			<tr><td>Nama	         <td><input type=text name='nama' class='form-control' style='width:350px; height: 30px'>
			<tr><td>Level		     <td><select name='level' class='form-control' style='width:100px; height: 30px'>
										 <option value='Admin'>Admin
										 <option value='User'>User
										 </select>
			<tr><td>Foto	<td><input type=file name='foto' class='form-control' style='width:300px; height: 40px'>
			<tr><td><td><input type=submit class='btn btn-dark btn-rounded btn-fw' name=proses value=SIMPAN>
			</table>";
	   break;

case "edit":
	 $sql=mysqli_query($conn,"select * from user where id='$_GET[id]'");
	 $r=mysqli_fetch_array($sql);

	 echo "
	 		<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Edit Data User</h4>


		  <form action='aldy_master.php?menu=aldy_user&act=edit' enctype='multipart/form-data' method=POST>
		  <table class=table>
		  <input type=hidden name='id' value='$_GET[id]'>
		  <tr><td>User Login		<td><input type=text name='username' value='$r[username]' class='form-control' style='width:150px;								height: 30px'>
		  <tr><td>Password			<td><input type=text name='password' class='form-control' style='width:200px; height: 30px'>
		  <tr><td>Nama User	        <td><input type=text name='nama' value='$r[nama]' class='form-control' style='width:350px; height: 30px'>
		  <tr><td>Level		        <td><select name='level' class='form-control' style='width:100px; height: 30px'>
										 <option value='$r[level]' selected>$r[level]
										 <option value='Admin'>Admin
										 <option value='User'>User
										 </select>
		  <tr><td>Foto     <td><input type=file name='foto' class='form-control' style='width:300px; height: 40px'> *kosongkan bila tidak mengganti							foto
		  <tr><td><td><input type=submit class='btn btn-secondary btn-rounded btn-fw' name=proses value=UPDATE>
		  </table>
		  <img src='foto_user/$r[foto_user]' width='100' height='100'>";

	 break;

case "hapus":
	 $sql=mysqli_query($conn,"select * from user where id='$_GET[id]'");
	 $r=mysqli_fetch_array($sql);
	 echo "
			<div class='col-lg-6 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Hapus Data User</h4>


		  <form action='aldy_master.php?menu=aldy_user&act=hapus' method=POST>
		  <input type=hidden name='id' value='$_GET[id]'>
		  <table class=table>
		  <tr><td>User Login		<td>: $r[username]
		  <tr><td>Nama User	        <td>: $r[nama]
		  <tr><td>Level		        <td>: $r[level]
		  <tr><td><td><input type=submit class='btn btn-warning btn-rounded btn-fw' name=proses value=HAPUS>
		  </table>";

	break;
}


?>
</table>