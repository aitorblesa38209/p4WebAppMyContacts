<?php
include('/login/login.php');
include('/login/conexion.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<!--transformar en html5  -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html">
		<meta charset="utf-8">
		<meta name="description" content="sesiones">
		<link rel="stylesheet" type="text/css" href="css/modificar.css">
		<link rel="icon" type="image/png" href="img/favicon.png"/>
	</head>
		<body>
<<<<<<< HEAD
		<nav>
			<img src="img/logo.png" alt="MyContacts" width="50px">
		</nav>

		<section class="envoltura">
		<header>

			<p><a href="login/logout.php" class="logout" title="Logout"><img src="img/logout_white.png" alt="Logout"></a>
=======
		<header>
		
		<img src="img/logo.png" alt=""/>
			
			<p class="logout"><a href="login/logout.php"  title="Logout"><img src="img/logout_white.png" alt="Logout"></a>
>>>>>>> 7f76b5bb8f1e8406ea7e174c7ecf835b442557cd
			<?php echo $_SESSION['nombre_usuario']. " " .$_SESSION['apellido_usuario']?></p>
		
		</header>
		
		<section class="envoltura">
		<h1>Agenda de Contactos</h1>
			<?php
				$sql ="SELECT * FROM tbl_contactos WHERE con_id=$_REQUEST[con_id]";
				$datos = mysqli_query($conexion, $sql);
				if(mysqli_num_rows($datos)!=0){
	            	while ($mostrar = mysqli_fetch_array($datos)) {
	            	?>
					<article class='contenido'>
						<form name="formulario1" action="modificarproc.php" method="POST">
          					<input type="hidden" name="contacto_id" value="<?php echo $mostrar['con_id']; ?>"><br/>
         					<p>Nombre:<p><input type="text" name="nombre" size="20" maxlength="25" value="<?php echo  utf8_encode($mostrar['con_nombre']); ?>" required>
         					<p>Apellido:<input type="text" name="apellido" size="20" maxlength="25" value="<?php echo utf8_encode($mostrar['con_apellido']); ?>" required></p>
          					<p>Email:<input type="email" name="email" value="<?php echo utf8_encode($mostrar['con_mail']); ?>" required></p>
       						<p>Telefono:<input type="tel" name="telefono" pattern="[0-9]{9}" value="<?php echo utf8_encode($mostrar['con_telefono']); ?>" required></p>
       						<p>Direccion:<input type="text" name="direccion" value="<?php echo utf8_encode($mostrar['con_direccion']); ?>"required><br/><br/>
       						<input type="submit" class="modificar_contacto" value="Guardar">
        					<a href="main.php" class="modificar_contacto">Volver</a>
        				</form>

	            	</article>
	            	<?php
	            	}
				}
			?>
<<<<<<< HEAD
=======
		<footer>
			<p>CopyRight &copy; creado por Aitor y Felipe<p>
			
		</footer>
>>>>>>> 7f76b5bb8f1e8406ea7e174c7ecf835b442557cd
		</section>
      <?php include 'template/footer.php'; ?>
	</body>
</html>
