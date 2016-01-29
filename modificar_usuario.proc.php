<?php
include 'login/conexion.php';

$pass_code = md5($_REQUEST['password']);
$sql = "UPDATE tbl_usuario SET usu_nombre='$_REQUEST[nombre]', usu_apellido='$_REQUEST[apellido]', usu_mail='$_REQUEST[email]', usu_telefono='$_REQUEST[telefono]', usu_direccion='$_REQUEST[direccion]', usu_pass='$_REQUEST[$pass_code]'  WHERE usu_id=$_REQUEST[usu_id]";
//echo $pass_code;

$datos = mysqli_query($usuexion, $sql);
header("location: index.php")
?>
