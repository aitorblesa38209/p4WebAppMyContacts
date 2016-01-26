<?php

include('conexion.php');
session_start();
$accesoOUT = "UPDATE tbl_accesos SET acceso_logout=now() WHERE id_acceso=$_SESSION[acceso]";
$datos = mysqli_query($conexion, $accesoOUT);
if(session_destroy()){
	header('Location:../index.php'); // Redirecting To Home Page
}
?>