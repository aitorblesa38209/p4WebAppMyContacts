<?php

//Inicializamos la sesion
session_start();
include('conexion.php');
//Variable que muestra el error
$error=""; 

//Si no existe la variable enviamos la variable error al html de index
if (isset($_REQUEST['submit'])) {
	if (empty($_REQUEST['user']) || empty($_REQUEST['pass'])){
		//$error ="<div class='error'>Introduce un Usuario y Contraseña</div>";
	}else{
		//Definimos la variable usuario y password
		$email = $_REQUEST['user'];
		$password = $_REQUEST['pass'];
		$pass = md5($password); 
		//echo $pass . "</br>";

		//Establecemos conexion con el servidor y la Base de datos
		
		$sql = "SELECT * FROM tbl_usuario WHERE usu_mail='$email' AND usu_pass='$pass'";
		$datos = mysqli_query($conexion,$sql);
		//echo "$sql";
		
		//$accesoIN = "INSERT INTO tbl_accesos (email, acceso_login) VALUES ('$email', now())";
		//$datosLogin = mysqli_query($conexion, $accesoIN);
		//Comprobamos si existe una linea y creamos la sesion
		if (mysqli_num_rows($datos) == 1) {
			$pro = mysqli_fetch_array($datos);
			$email_usuario=$pro['usu_mail'];
			$nombre_usuario=$pro['usu_nombre'];
			$apellido_usuario=$pro['usu_apellido'];
			$id_usuario=$pro['usu_id'];


			$_SESSION['nombre_usuario']= $nombre_usuario;
			$_SESSION['apellido_usuario']= $apellido_usuario;
			$_SESSION['login_user'] = $email_usuario;
			$_SESSION['usu_id']=$id_usuario;
	
			/*
			echo $_SESSION['nombre_usuario'] . "</br>";
			echo $_SESSION['login_user'] . "</br>";
			echo $_SESSION['nivel_usuario']. "</br>";
			echo $_SESSION['acceso'];
			echo $_SESSION['usu_id'];*/
			header('location:main.php'); //Llevamos al usuario a su perfil con su sesion
		}else{
			$error ="<div class='error'>Usuario o Contraseña incorrectos</div>";
		}
		mysqli_close($conexion); 
	}
}
?>
















