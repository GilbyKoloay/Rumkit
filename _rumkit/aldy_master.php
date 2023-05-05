<?php
error_reporting(E_ALL ^E_NOTICE ^E_DEPRECATED); 
ini_set('display_errors',0);
include "aldy_koneksi.php";
$conn = mysqli_connect($servername, $username, $password, $database);
$menu=$_GET[menu];
$act=$_GET[act];

//compress image
			function compressedImage($source, $path, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);

            imagejpeg($image, $path, $quality);

			}

//user
if ($menu=='aldy_user' and $act=='tambah')
{
	
	$filename = $_FILES['foto']['name'];
	   $ukuran=$_FILES['foto']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto". time().'.'.$phototest1;
 
       // Location
       $location = "foto/".$new_profle_pic;
       
	   // file extension
       $file_extension = pathinfo($location, PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);
       
		if(in_array($file_extension,$valid_ext))
	
		{  
		   compressedImage($_FILES['foto']['tmp_name'],$location,10);
		}
	else
        {
              echo "<center><br><br><br>Foto Salah";
		      exit;
        }

		$enpass=md5($_POST[password]);
		mysqli_query($conn,"insert into user(username,password,nama,level,foto)
		values('$_POST[username]','$enpass','$_POST[nama]','$_POST[level]','$new_profle_pic')");
	  
		

   header('location:index2.php?menu=aldy_user');
}
else if ($menu=='aldy_user' and $act=='edit')
{
	$filename = $_FILES['foto']['name'];
	   $ukuran=$_FILES['foto']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto". time().'.'.$phototest1;
 
       // Location
       if (!empty($filename))
	   {
	       $location = "foto/".$new_profle_pic;
       	   // file extension
           $file_extension = pathinfo($location, PATHINFO_EXTENSION);
           $file_extension = strtolower($file_extension);
           if(in_array($file_extension,$valid_ext))
		   {  
		      compressedImage($_FILES['foto']['tmp_name'],$location,10);
		   }
	       else
           { 
                echo "<center><br><br><br>Foto Salah";
		        exit;
           }
		   $enpass=md5($_POST[password]);
			mysqli_query($conn,"update user set username='$_POST[username]',
												     password  ='$enpass',
													 nama      ='$_POST[nama]',
													 level     ='$_POST[level]',
													 foto      ='$new_profle_pic'
													 where id='$_POST[id]'");
			   
		}
		else
		{

			$enpass=md5($_POST[password]);
			mysqli_query($conn,"update user set username='$_POST[username]',
												     password  ='$enpass',
													 nama      ='$_POST[nama]',
													 level     ='$_POST[level]'
													 where id='$_POST[id]'");
		 }
			header('location:index2.php?menu=aldy_user');
}
else if ($menu=='aldy_user' and $act=='hapus')
{
	mysqli_query($conn, "delete from user where id='$_POST[id]'");
	header('location:index2.php?menu=aldy_user');
}


//laporan_harian
if ($menu=='laporan_harian' and $act=='tambah')
{
   
   mysqli_query($conn,"insert into laporan_harian(id,harian,nama)
   values('$_POST[id]','$_POST[harian]','$_POST[nama]')");
   header('location:index2.php?menu=laporan_harian');
}
else if ($menu=='laporan_harian' and $act=='edit')
{
	   {
			mysqli_query($conn,"update laporan_harian set harian ='$_POST[harian]',
														  nama	 ='$_POST[nama]',
														  where id='$_POST[id]'");
														
			   
		}
		
			header('location:index2.php?menu=laporan_harian');
}
else if ($menu=='laporan_harian' and $act=='hapus')
{
	mysqli_query($conn, "delete from laporan_harian where id='$_POST[id]'");
	header('location:index2.php?menu=laporan_harian');
}
//laporan_bulanan
if ($menu=='laporan_bulanan' and $act=='tambah')
{
   
	mysqli_query($conn,"insert into laporan_bulanan(id,bulanan,nama)
	values('$_POST[id]','$_POST[harian]','$_POST[nama]')");
	header('location:index2.php?menu=laporan_bulanan');
 }
 else if ($menu=='laporan_bulanan' and $act=='edit')
 {
		{
			 mysqli_query($conn,"update laporan_bulanan set bulanan ='$_POST[bulanan]',
														   nama	 ='$_POST[nama]',
														   where id='$_POST[id]'");
														 
				
		 }
		 
			 header('location:index2.php?menu=laporan_bulanan');
 }
 else if ($menu=='laporan_bulanan' and $act=='hapus')
 {
	 mysqli_query($conn, "delete from laporan_bulanan where id='$_POST[id]'");
	 header('location:index2.php?menu=laporan_bulanan');
 }
//aldy_makanan
if ($menu=='aldy_makanan' and $act=='tambah')
{
	   $filename = $_FILES['foto_makanan']['name'];
	   $ukuran=$_FILES['foto_makanan']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_makanan". time().'.'.$phototest1;
 
       // Location
       $location = "foto_makanan/".$new_profle_pic;
       
	   // file extension
       $file_extension = pathinfo($location, PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);
       if(in_array($file_extension,$valid_ext))
		{  
		   compressedImage($_FILES['foto_makanan']['tmp_name'],$location,10);
		}
	    else
        {
              echo "<center><br><br><br>Foto Salah";
		      exit;
        }
   mysqli_query($conn,"insert into aldy_makanan(aldy_paket,nama,foto)
   values('$_POST[aldy_paket]','$_POST[nama]','$new_profle_pic')");
   header('location:index2.php?menu=aldy_makanan');
}
else if ($menu=='aldy_makanan' and $act=='edit')
{
	   $filename = $_FILES['foto_makanan']['name'];
	   $ukuran=$_FILES['foto_makanan']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_makanan". time().'.'.$phototest1;
 
       // Location
       if (!empty($filename))
	   {
	       $location = "foto_makanan/".$new_profle_pic;
       	   // file extension
           $file_extension = pathinfo($location, PATHINFO_EXTENSION);
           $file_extension = strtolower($file_extension);
           if(in_array($file_extension,$valid_ext))
		   {  
		      compressedImage($_FILES['foto_makanan']['tmp_name'],$location,10);
		   }
	       else
           { 
                echo "<center><br><br><br>Foto Salah";
		        exit;
           }
			mysqli_query($conn,"update aldy_makanan set aldy_paket	  ='$_POST[aldy_paket]',
													   nama	  ='$_POST[nama]',
													   foto      ='$new_profle_pic'
													   where aldy_id_makanan='$_POST[aldy_id_makanan]'");
	   }
	   else
	   {
		   mysqli_query($conn,"update aldy_makanan set aldy_paket	  ='$_POST[aldy_paket]',
													   nama	  ='$_POST[nama]'
													   where aldy_id_makanan='$_POST[aldy_id_makanan]'");
	   }
	header('location:index2.php?menu=aldy_makanan');
}
else if ($menu=='aldy_makanan' and $act=='hapus')
{
	mysqli_query($conn, "delete from aldy_makanan where aldy_id_makanan='$_POST[aldy_id_makanan]'");
	header('location:index2.php?menu=aldy_makanan');
}

//aldy_hotel
if ($menu=='aldy_hotel' and $act=='tambah')
{
   mysqli_query($conn,"insert into aldy_hotel(aldy_nm_hotel,aldy_kelas,nama)
   values('$_POST[aldy_nm_hotel]','$_POST[aldy_kelas]','$_POST[nama]')");
   header('location:index2.php?menu=aldy_hotel');
}
else if ($menu=='aldy_hotel' and $act=='edit')
{
   	mysqli_query($conn,"update aldy_hotel set  aldy_nm_hotel  ='$_POST[aldy_nm_hotel]',
											   aldy_kelas	  ='$_POST[aldy_kelas]',
											   nama     ='$_POST[nama]'
											   where aldy_id_hotel='$_POST[aldy_id_hotel]'");
	header('location:index2.php?menu=aldy_hotel');
}
else if ($menu=='aldy_hotel' and $act=='hapus')
{
	mysqli_query($conn, "delete from aldy_hotel where aldy_id_hotel='$_POST[aldy_id_hotel]'");
	header('location:index2.php?menu=aldy_hotel');
}

?>