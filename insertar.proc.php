<?php
session_start();

include 'login/conexion.php';

if (!isset($_SESSION)) {
   header('location: index.php');
}

$sql = "INSERT INTO `bd_mycontacts`.`tbl_contactos` (`con_id`, `con_nombre`, `con_apellido`, `con_mail`, `con_telefono`, `con_direccion`, `con_latitud`, `con_longitud`, `usu_id`)
        VALUES (NULL, '$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[mail]', $_REQUEST[telefono], '$_REQUEST[direccion]', $_REQUEST[latitud], $_REQUEST[longitud], $_SESSION[usu_id])";

if(mysqli_query($conexion,$sql)){
   header('location: insertar.php');
}else {
   echo "Ha habido un error";
}

 ?>
