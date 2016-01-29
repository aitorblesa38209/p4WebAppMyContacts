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
		<div id="wrapper">
			<header>
				<div id="izquierda">
					<img src="img/logo.png" alt="Mycontacts"/>
					<h1 id="empresa">My Contacts</h1>
				</div>
				<div id="derecha">
					<?php echo $_SESSION['nombre_usuario']. " " .$_SESSION['apellido_usuario']?> <a href="login/logout.php" title="Logout"><img src="img/logout.png" alt="Logout"></a>
				</div> 
			</header>
		
			<section id="formulario">
			<h1>Agenda de Contactos</h1>
			<?php
				$sql ="SELECT * FROM tbl_usuario WHERE usu_id=$_REQUEST[usu_id]";
				$datos = mysqli_query($conexion, $sql);
				if(mysqli_num_rows($datos)!=0){
	            	while ($mostrar = mysqli_fetch_array($datos)) {
	            	?>
					<article class='contenido'>
						<form id="formulario_box" name="formulario1" action="modificar_usuario.proc.php" method="POST">
          					<input type="hidden" name="usu_id" value="<?php echo $mostrar['usu_id']; ?>"><br/>
         					<input type="text" name="nombre" size="20" maxlength="25" value="<?php echo  utf8_encode($mostrar['usu_nombre']); ?>" required>
         					<input type="text" name="apellido" size="20" maxlength="25" value="<?php echo utf8_encode($mostrar['usu_apellido']); ?>" required>
          					<input type="email" name="email" value="<?php echo utf8_encode($mostrar['usu_mail']); ?>" required>
       						<input type="password" name="password" value="<?php echo utf8_encode($mostrar['usu_pass']); ?>" required>
       						<input type="tel" name="telefono" pattern="[0-9]{9}" value="<?php echo utf8_encode($mostrar['usu_telefono']); ?>" required>
       						<input type="text" name="direccion" value="<?php echo utf8_encode($mostrar['usu_direccion']); ?>"required>
       						<input type="submit" class="modificar_contacto" value="Guardar">
        					<a href="main.php">Volver</a>
        				</form>
	            		
	            	</article>		
	            	<?php
	            	}
				}
			?>
		
		</section>
		<footer>
			<p>CopyRight &copy; creado por Aitor y Felipe<p>
			
		</footer>
	</body>
</html>
