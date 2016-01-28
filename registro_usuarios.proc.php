<?php
session_start();

include 'login/conexion.php';

if (!isset($_SESSION)) {
   header('location: index.php');
}

$pass_md5 = md5($_REQUEST['pass']);
$sql = "INSERT INTO `bd_mycontacts`.`tbl_usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_mail`, `usu_telefono`,  `usu_pass`, `usu_direccion`)
        VALUES (NULL, '$_REQUEST[nombre]', '$_REQUEST[apellido]', '$_REQUEST[email]', $_REQUEST[telefono],  '$pass_md5', '$_REQUEST[direccion]')";

//echo $pass_md5;

if(mysqli_query($conexion,$sql)){
   header('location: index.php');
}else {
   echo "Ha habido un error";
}

 ?>
