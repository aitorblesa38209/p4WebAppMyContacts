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
		<link rel="stylesheet" type="text/css" href="css/registro.css">
		<link rel="icon" type="image/png" href="img/favicon.png"/>
	</head>
		<body>
		<nav>
			<img src="img/logo.png" alt="MyContacts" width="50px">
		</nav>
		
		<section class="envoltura">
		<header>
		
			<p><a href="login/logout.php" class="logout" title="Logout"><img src="img/logout_white.png" alt="Logout"></a>
			<?php echo $_SESSION['nombre_usuario']. " " .$_SESSION['apellido_usuario']?></p>
			<h1>Agenda de Contactos</h1>
		</header>
			<?php
				$sql ="SELECT * FROM tbl_contactos /*INNER JOIN tbl_usuaris ON tbl_usuaris.usu_id = tbl_contactos.usu_id*/ WHERE usu_id=$_SESSION[usu_id]";
				$datos = mysqli_query($conexion, $sql);
				if(mysqli_num_rows($datos)!=0){
	            	while ($mostrar = mysqli_fetch_array($datos)) {
	            	?>
					<article class='contenido'>
						<form name="formulario1" action="modificarproc.php" method="POST">
          					<input type="hidden" name="contacto_id" value="<?php echo $mostrar['con_id']; ?>"><br/>
         					<p>Nombre:<input type="text" name="nombre" size="20" maxlength="25" value="<?php echo $mostrar['con_nombre']; ?>" required></p>
         					<p>Apellido:<input type="text" name="apellido" size="20" maxlength="25" value="<?php echo $mostrar['con_apellido']; ?>" required></p>
          					<p>Email:<input type="email" name="email" value="<?php echo $mostrar['con_mail']; ?>" required></p>
       						<p>Telefono:<input type="tel" name="telefono" pattern="[0-9]{9}" value="<?php echo $mostrar['con_telefono']; ?>" required></p>
       						<p>Direccion:<input type="text" name="direccion" value="<?php echo $mostrar['con_direccion']; ?>"required><br/><br/>
       						<input type="submit" class="modificar" value="Guardar">
        					<a href="bienvenida.php" class="modificar">Volver</a>
        				</form>
	            		
	            	</article>		
	            	<?php
	            	}
				}
			?>
		<footer>
			<p>CopyRight &copy; creado por Aitor<p>
			
		</footer>
		</section>
	</body>
</html>
