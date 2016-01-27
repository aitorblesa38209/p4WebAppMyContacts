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
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="icon" type="image/png" href="img/favicon.png"/>
	</head>
		<body>
	<!-- <nav>
			<img src="img/logo.png" alt="MyContacts" width="50px">
			<ul><a href="#" class="contenido_user">Mi perfil</a></ul>
		</nav> -->
		
		<section class="envoltura">
		<header>
			<p><a href="login/logout.php" class="logout" title="Logout"><img src="img/logout_white.png" alt="Logout"></a>
			<?php echo $_SESSION['nombre_usuario']. " " .$_SESSION['apellido_usuario']?></p>
			<h1>Agenda de Contactos</h1>
		</header>
			<?php
				$sql ="SELECT * FROM tbl_contactos WHERE usu_id=$_SESSION[usu_id]";
				$datos = mysqli_query($conexion, $sql);
				if(mysqli_num_rows($datos)!=0){
	            	while ($mostrar = mysqli_fetch_array($datos)) {
						echo "<article class='contenido'>";
						echo utf8_encode("<p>Nombre: $mostrar[con_nombre]</p>");
						echo utf8_encode(" <p>Email: $mostrar[con_mail]</p>");
						echo utf8_encode(" <p>Telefono: $mostrar[con_telefono]</p>");
						echo utf8_encode(" <p>Direccion: $mostrar[con_direccion]</p>");
						echo utf8_encode("<a href='modificar.php' class='modificar'>Modificar</a>");
	            		?>
	            		</article>		
	            		<?php
	            	}
				}else{
	        		echo "<article id='rellena_contenido'>Inserta contactos en tu agenda!</article>";
	        	}	
			?>
		<footer>
			<p>CopyRight &copy; creado por Aitor<p>
			<a href="#"><img src="img/scrolltop.png" alt="top"></a>
		</footer>
		</section>
	</body>
</html>
