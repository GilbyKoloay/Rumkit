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

//aldy_user
if ($menu=='aldy_user' and $act=='tambah')
{
	   $filename = $_FILES['foto_user']['name'];
	   $ukuran=$_FILES['foto_user']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_user". time().'.'.$phototest1;
 
       // Location
       $location = "foto_user/".$new_profle_pic;
       
	   // file extension
       $file_extension = pathinfo($location, PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);
       if(in_array($file_extension,$valid_ext))
		{  
		   compressedImage($_FILES['foto_user']['tmp_name'],$location,10);
		}
	    else
        {
              echo "<center><br><br><br>Foto Salah";
		      exit;
        }
   $enpass=md5($_POST[aldy_password]);
   mysqli_query($conn,"insert into aldy_user(aldy_user_login,aldy_password,aldy_nama,aldy_level,aldy_foto)
   values('$_POST[aldy_user_login]','$enpass','$_POST[aldy_nama]','$_POST[aldy_level]','$new_profle_pic')");
   header('location:index.php?menu=aldy_user');
}
else if ($menu=='aldy_user' and $act=='edit')
{
	$filename = $_FILES['foto_user']['name'];
	   $ukuran=$_FILES['foto_user']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_user". time().'.'.$phototest1;
 
       // Location
       if (!empty($filename))
	   {
	       $location = "foto_user/".$new_profle_pic;
       	   // file extension
           $file_extension = pathinfo($location, PATHINFO_EXTENSION);
           $file_extension = strtolower($file_extension);
           if(in_array($file_extension,$valid_ext))
		   {  
		      compressedImage($_FILES['foto_user']['tmp_name'],$location,10);
		   }
	       else
           { 
                echo "<center><br><br><br>Foto Salah";
		        exit;
           }
		   $enpass=md5($_POST[aldy_password]);
			mysqli_query($conn,"update aldy_user set aldy_user_login='$_POST[aldy_user_login]',
												     aldy_password  ='$enpass',
													 aldy_nama      ='$_POST[aldy_nama]',
													 aldy_level     ='$_POST[aldy_level]',
													 aldy_foto      ='$new_profle_pic'
													 where aldy_id_user='$_POST[aldy_id_user]'");
			   
		}
		else
		{

			$enpass=md5($_POST[aldy_password]);
			mysqli_query($conn,"update aldy_user set aldy_user_login='$_POST[aldy_user_login]',
												     aldy_password  ='$enpass',
													 aldy_nama      ='$_POST[aldy_nama]',
													 aldy_level     ='$_POST[aldy_level]'
													 where aldy_id_user='$_POST[aldy_id_user]'");
		 }
			header('location:index.php?menu=aldy_user');
}
else if ($menu=='aldy_user' and $act=='hapus')
{
	mysqli_query($conn, "delete from aldy_user where aldy_id_user='$_POST[aldy_id_user]'");
	header('location:index.php?menu=aldy_user');
}

//aldy_dokter
if ($menu=='aldy_dokter' and $act=='tambah')
{
	   $filename = $_FILES['foto_dokter']['name'];
	   $ukuran=$_FILES['foto_dokter']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_dokter". time().'.'.$phototest1;
 
       // Location
       $location = "foto_dokter/".$new_profle_pic;
       
	   // file extension
       $file_extension = pathinfo($location, PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);
       if(in_array($file_extension,$valid_ext))
		{  
		   compressedImage($_FILES['foto_dokter']['tmp_name'],$location,10);
		}
	    else
        {
              echo "<center><br><br><br>Foto Salah";
		      exit;
        }
   mysqli_query($conn,"insert into aldy_dokter(aldy_kd_dokter,aldy_nm_dokter,aldy_alamat,aldy_jekel,aldy_no_hp,aldy_spesialis,aldy_foto)
   values('$_POST[aldy_kd_dokter]','$_POST[aldy_nm_dokter]','$_POST[aldy_alamat]','$_POST[aldy_jekel]','$_POST[aldy_no_hp]','$_POST[aldy_spesialis]',
   '$new_profle_pic')");
   header('location:index.php?menu=aldy_dokter');
}
else if ($menu=='aldy_dokter' and $act=='edit')
{
    $filename = $_FILES['foto_dokter']['name'];
	   $ukuran=$_FILES['foto_dokter']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_dokter". time().'.'.$phototest1;
 
       // Location
       if (!empty($filename))
	   {
	       $location = "foto_dokter/".$new_profle_pic;
       	   // file extension
           $file_extension = pathinfo($location, PATHINFO_EXTENSION);
           $file_extension = strtolower($file_extension);
           if(in_array($file_extension,$valid_ext))
		   {  
		      compressedImage($_FILES['foto_dokter']['tmp_name'],$location,10);
		   }
	       else
           { 
                echo "<center><br><br><br>Foto Salah";
		        exit;
           }
			$ori=$_POST['aldy_kd_dokter_ori'];
			$changed=$_POST['aldy_kd_dokter'];
			mysqli_query($conn,"update aldy_dokter set aldy_kd_dokter  ='$changed',
													   aldy_nm_dokter  ='$_POST[aldy_nm_dokter]',
													   aldy_alamat     ='$_POST[aldy_alamat]',
													   aldy_jekel      ='$_POST[aldy_jekel]',
													   aldy_no_hp      ='$_POST[aldy_no_hp]',
													   aldy_spesialis  ='$_POST[aldy_spesialis]',
													   aldy_foto       ='$new_profle_pic'
													   where aldy_kd_dokter='$ori'");
	   }
	   else
	   {
		    $ori=$_POST['aldy_kd_dokter_ori'];
			$changed=$_POST['aldy_kd_dokter'];
			mysqli_query($conn,"update aldy_dokter set aldy_kd_dokter  ='$changed',
													   aldy_nm_dokter  ='$_POST[aldy_nm_dokter]',
													   aldy_alamat     ='$_POST[aldy_alamat]',
													   aldy_jekel      ='$_POST[aldy_jekel]',
													   aldy_no_hp      ='$_POST[aldy_no_hp]',
													   aldy_spesialis  ='$_POST[aldy_spesialis]'
													   where aldy_kd_dokter='$ori'");
	   }
	header('location:index.php?menu=aldy_dokter');
}
else if ($menu=='aldy_dokter' and $act=='hapus')
{
	mysqli_query($conn, "delete from aldy_dokter where aldy_kd_dokter='$_POST[aldy_kd_dokter]'");
	header('location:index.php?menu=aldy_dokter');
}

//aldy_pasien
if ($menu=='aldy_pasien' and $act=='tambah')
{
   mysqli_query($conn,"insert into aldy_pasien(aldy_no_rm,aldy_nm_pasien,aldy_al_pasien,aldy_diagnosa)
   values('$_POST[aldy_no_rm]','$_POST[aldy_nm_pasien]','$_POST[aldy_al_pasien]','$_POST[aldy_diagnosa]')");
   header('location:index.php?menu=aldy_pasien');
}
else if ($menu=='aldy_pasien' and $act=='edit')
{
    $ori=$_POST['aldy_no_rm_ori'];
	$changed=$_POST['aldy_no_rm'];
	mysqli_query($conn,"update aldy_pasien set aldy_no_rm	   ='$changed',
											   aldy_nm_pasien  ='$_POST[aldy_nm_pasien]',
											   aldy_al_pasien  ='$_POST[aldy_al_pasien]',
											   aldy_diagnosa   ='$_POST[aldy_diagnosa]'
											   where aldy_no_rm='$ori'");
	header('location:index.php?menu=aldy_pasien');
}
else if ($menu=='aldy_pasien' and $act=='hapus')
{
	mysqli_query($conn, "delete from aldy_pasien where aldy_no_rm='$_POST[aldy_no_rm]'");
	header('location:index.php?menu=aldy_pasien');
}

//aldy_info
if ($menu=='aldy_info' and $act=='tambah')
{
	   $filename = $_FILES['foto_info']['name'];
	   $ukuran=$_FILES['foto_info']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_info". time().'.'.$phototest1;
 
       // Location
       $location = "foto_info/".$new_profle_pic;
       
	   // file extension
       $file_extension = pathinfo($location, PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);
       if(in_array($file_extension,$valid_ext))
		{  
		   compressedImage($_FILES['foto_info']['tmp_name'],$location,10);
		}
	    else
        {
              echo "<center><br><br><br>Foto Salah";
		      exit;
        }
   mysqli_query($conn,"insert into aldy_info(aldy_id_info,aldy_judul,aldy_isi_info,aldy_foto)
   values('$_POST[aldy_id_info]','$_POST[aldy_judul]','$_POST[aldy_isi_info]','$new_profle_pic')");
   header('location:index.php?menu=aldy_info');
}
else if ($menu=='aldy_info' and $act=='edit')
{
	   $filename = $_FILES['foto_info']['name'];
	   $ukuran=$_FILES['foto_info']['size'];
       $valid_ext = array('png','jpeg','jpg');
  	   $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
	   $phototest1 = strtolower($photoExt1);
	 	  
	   $new_profle_pic ="foto_info". time().'.'.$phototest1;
 
       // Location
       if (!empty($filename))
	   {
	       $location = "foto_info/".$new_profle_pic;
       	   // file extension
           $file_extension = pathinfo($location, PATHINFO_EXTENSION);
           $file_extension = strtolower($file_extension);
           if(in_array($file_extension,$valid_ext))
		   {  
		      compressedImage($_FILES['foto_info']['tmp_name'],$location,10);
		   }
	       else
           { 
                echo "<center><br><br><br>Foto Salah";
		        exit;
           }
			$ori=$_POST['aldy_id_info_ori'];
			$changed=$_POST['aldy_id_info'];
			mysqli_query($conn,"update aldy_info set   aldy_id_info	  ='$changed',
													   aldy_judul	  ='$_POST[aldy_judul]',
													   aldy_isi_info  ='$_POST[aldy_isi_info]',
													   aldy_foto      ='$new_profle_pic'
													   where aldy_id_info='$ori'");
	   }
	   else
	   {
		    $ori=$_POST['aldy_id_info_ori'];
			$changed=$_POST['aldy_id_info'];
			mysqli_query($conn,"update aldy_info set   aldy_id_info	  ='$changed',
													   aldy_judul	  ='$_POST[aldy_judul]',
													   aldy_isi_info  ='$_POST[aldy_isi_info]',
													   where aldy_id_info='$ori'");
	   }
	header('location:index.php?menu=aldy_info');
}
else if ($menu=='aldy_info' and $act=='hapus')
{
	mysqli_query($conn, "delete from aldy_info where aldy_id_info='$_POST[aldy_id_info]'");
	header('location:index.php?menu=aldy_info');
}

//aldy_obat
if ($menu=='aldy_obat' and $act=='tambah')
{
   mysqli_query($conn,"insert into aldy_obat(aldy_kd_obat,aldy_nm_obat,aldy_harga)
   values('$_POST[aldy_kd_obat]','$_POST[aldy_nm_obat]','$_POST[aldy_harga]')");
   header('location:index.php?menu=aldy_obat');
}
else if ($menu=='aldy_obat' and $act=='edit')
{
    $ori=$_POST['aldy_kd_obat_ori'];
	$changed=$_POST['aldy_kd_obat'];
	mysqli_query($conn,"update aldy_obat set   aldy_kd_obat	  ='$changed',
											   aldy_nm_obat	  ='$_POST[aldy_nm_obat]',
											   aldy_harga     ='$_POST[aldy_harga]'
											   where aldy_kd_obat='$ori'");
	header('location:index.php?menu=aldy_obat');
}
else if ($menu=='aldy_obat' and $act=='hapus')
{
	mysqli_query($conn, "delete from aldy_obat where aldy_kd_obat='$_POST[aldy_kd_obat]'");
	header('location:index.php?menu=aldy_obat');
}

?>