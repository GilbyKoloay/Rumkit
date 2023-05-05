<?php
switch($_GET['act'])
{
	  default:
echo "
	  <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                  <div class='card-body'>
                    <h4 class='card-title'>Info Parkiran</h4>

					<div class='table-responsive'>
                      <table class='table table-striped'>
					  <thead>
					  
	  <tr><td>No   <td>Tempat Parkir   <td>Info   
						</thead>
						<tbody>";

	  $no=0;
	  $tampil=mysqli_query($conn,"select * from tempat_parkir");	
	  while($r=mysqli_fetch_array($tampil))
	  {
		$no=$no+1;
		echo "<tr><td>$no
		<td>$r[tempat_parkir]
	    <td>$r[info]
        <td><a href='index2.php?menu=parkir&act=edit&id_parkir=$r[id_parkir]'>Edit </a>";
	  }
    break;
    
 
 case "edit":
      $sql=mysqli_query($conn,"select * from tempat_parkir where id_parkir='$_GET[id_parkir]'");
      $r=mysqli_fetch_array($sql);
 
      echo "
              <div class='col-lg-6 grid-margin stretch-card'>
                 <div class='card'>
                   <div class='card-body'>
                     <h4 class='card-title'>Edit Data Parkir</h4>
 
 
           <form action='aldy_master.php?menu=parkir&act=edit' enctype='multipart/form-data' method=POST>
           <table class=table>
           <input type=hidden name='id_parkir' value='$_GET[id_parkir]'>
           <tr><td>Info		        <td><select name='info' class='form-control' style='width:150px; height: 30px'>
                                          <option value='Available'>Available
                                          <option value='Unavailable'>Unavailable
                                          </select>
           <tr><td><td><input type=submit class='btn btn-secondary btn-rounded btn-fw' name=proses value=UPDATE>
           </table>";
 
      break;
 
 }
 


?>
</table>