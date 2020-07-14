<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save']))
{
 // variables for input data
     $Nombre = $_POST['Nombre'];
      $ApellidoP = $_POST['ApellidoP'];
      $ApellidoM = $_POST['ApellidoM'];
      $Correo = $_POST['Correo'];
      $Foto =  $_FILES["Foto"]["name"];
 $file_name = $_FILES["Foto"]["name"];
$file_tmp = $_FILES["Foto"]["tmp_name"];
  if($file_name!=''){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
  }
    // variables for input data

 // sql query for inserting data into database
 
$sql_query="INSERT INTO empleados (`Nombre`,`ApellidoP`,`ApellidoM`,`Correo`,`Foto`) VALUES('".$Nombre."','".$ApellidoP."','".$ApellidoM."','".$Correo."','".$Foto."')";
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysqli_query($con,$sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('empleados added Successfully ');
  window.location.href='index.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while inserting your data');
  </script>
  <?php
 }
 // sql query execution function
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Core PHP Crud functions By Crud Generator</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
        <label>Core PHP Crud functions - <a href="http://www.crudgenerator.in" target="_blank">By Crud Generator</a></label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post" enctype="multipart/form-data" >
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">back to main page</a></td>
    </tr>



      <tr>
    <td>
    <input type="text" class="form-control" id="Nombre" name="Nombre" required placeholder="Nombre">
    </td>
    </tr>
    <tr>
    <td>
    <input type="text" class="form-control" id="ApellidoP" name="ApellidoP" required placeholder="ApellidoP">
    </td>
    </tr>
    <tr>
    <td>
    <input type="text" class="form-control" id="ApellidoM" name="ApellidoM" required placeholder="ApellidoM">
    </td>
    </tr>
    <tr>
    <td>
    <input type="email" class="form-control" id="Correo" name="Correo" required placeholder="Correo">
    </td>
    </tr>
    <tr>
    <td>
    <input type="file" class="form-control" id="Foto" name="Foto" required placeholder="Foto">
    </td>
    </tr>
  



    <tr>
    <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>