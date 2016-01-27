<?php
include 'login/conexion.php';

$sql = "UPDATE tbl_contactos SET con_nombre='$_REQUEST[nombre]', con_apellido='$_REQUEST[apellido]', con_mail='$_REQUEST[email]', con_telefono='$_REQUEST[telefono]', con_direccion='$_REQUEST[direccion]'   WHERE con_id=$_REQUEST[contacto_id]";

//echo $sql;
$datos = mysqli_query($conexion, $sql);
header("location: bienvenida.php")
?>
