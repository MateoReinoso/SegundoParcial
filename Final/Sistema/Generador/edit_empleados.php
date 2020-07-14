<?php
include_once 'dbconfig.php';

if(isset($_GET['edit_id']))
{
 $sql_query="SELECT * FROM empleados WHERE id=".$_GET['edit_id'];
 $result_set=mysqli_query($con,$sql_query);
 $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
}
if(isset($_POST['btn-update']))
{
 // variables for input data
     
   $Nombre = $_POST['Nombre'];
          
   $ApellidoP = $_POST['ApellidoP'];
          
   $ApellidoM = $_POST['ApellidoM'];
          
   $Correo = $_POST['Correo'];
          
  if($_FILES["Foto"]["name"]==''){
 $Foto =  $fetched_row['Foto'];
}else{
  $Foto =  $_FILES["Foto"]["name"];
  $file_name = $_FILES["Foto"]["name"];
$file_tmp = $_FILES["Foto"]["tmp_name"];
  if($file_name!=''){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
       
  }
}
       // variables for input data

 // sql query for update data into database
  $sql_query="UPDATE empleados SET `Nombre`='$Nombre',`ApellidoP`='$ApellidoP',`ApellidoM`='$ApellidoM',`Correo`='$Correo',`Foto`='$Foto' WHERE id=".$_GET['edit_id'];

 // sql query for update data into database
 
 // sql query execution function
 if(mysqli_query($con,$sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('empleados updated successfully');
  window.location.href='index.php';
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while updating data');
  </script>
  <?php
 }
 // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
 header("Location: index.php");
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
        <label>Core PHP Crud functions - <a href="http://crudgenerator.in" target="_blank">By Crud Generator</a></label>
    </div>
</div>

<div id="body">
 <div id="content">
    <form method="post" enctype="multipart/form-data">
    <table align="center">
    <tr>
    <td>
    <input type="text" value="<?php echo $fetched_row['Nombre'] ?>" class="form-control" id="Nombre" name="Nombre">
</td>
    </tr>
  <tr>
    <td>
    <input type="text" value="<?php echo $fetched_row['ApellidoP'] ?>" class="form-control" id="ApellidoP" name="ApellidoP">
</td>
    </tr>
  <tr>
    <td>
    <input type="text" value="<?php echo $fetched_row['ApellidoM'] ?>" class="form-control" id="ApellidoM" name="ApellidoM">
</td>
    </tr>
  <tr>
    <td>
    <input type="email" value="<?php echo $fetched_row['Correo'] ?>" class="form-control" id="Correo" name="Correo">
</td>
    </tr>
  <tr>
    <td>
    <input type="file" value="<?php echo $fetched_row['Foto'] ?>" class="form-control" id="Foto" name="Foto">
</td>
    </tr>
      <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>