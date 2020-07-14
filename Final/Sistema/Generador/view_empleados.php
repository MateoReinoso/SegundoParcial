<?php
include_once 'dbconfig.php';

if(isset($_GET['view_id']))
{
 $sql_query="SELECT * FROM empleados WHERE id=".$_GET['view_id'];
 $result_set=mysqli_query($con,$sql_query);
 $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
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

 <table align="center">
   <tr>
   <th colspan="5">Nombre: <?php echo $fetched_row['Nombre'] ?></th>
</tr>
 <tr>
   <th colspan="5">ApellidoP: <?php echo $fetched_row['ApellidoP'] ?></th>
</tr>
 <tr>
   <th colspan="5">ApellidoM: <?php echo $fetched_row['ApellidoM'] ?></th>
</tr>
 <tr>
   <th colspan="5">Correo: <?php echo $fetched_row['Correo'] ?></th>
</tr>
 </table>
</center>
</body>
</html>