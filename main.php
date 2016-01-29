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
	<script type="text/javascript" src="js/maps.js"></script>
      <!-- api de google maps  -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW_5m9Miz3xloHRp1QF3cW5V_I0qoz3RI&callback=initMap" async defer></script>
      <script type="text/javascript">
         window.onload = function(){
            initMap();
         }
      </script>
	</head>
		<body>
		<div id="wrapper">
			<header>
				<div id="izquierda">
					<img src="img/logo.png" alt="Mycontacts"/>
					<h1 id="empresa">My Contacts</h1>
				</div>
				<div id="derecha">
					<?php echo "<a href='modificar_usuario.php?usu_id=$_SESSION[usu_id]'>" .$_SESSION['nombre_usuario']. " " .$_SESSION['apellido_usuario']. "</a>"?> <a href="login/logout.php" title="Logout"><img src="img/logout.png" alt="Logout"></a>

				</div>
			</header>

		<div class="lateral">
			<div id="contenedor_titulo">
				<div id="titulo_contacto">
					<h1>Agenda de Contactos</h1>
				</div>
				<div id="nuevo_contacto">
					<a href="insertar.php" title="Nuevo Contacto"><img src="img/add_user.png" alt="Insertar usuario"/></a>

				</div>
			</div>
		</div>

			<?php
				/*$sql_user ="SELECT * FROM tbl_usuario WHERE usu_id=$_SESSION[usu_id]";
				$datos_user = mysqli_query($conexion, $sql_user);
				$mostrar_user = mysqli_fetch_array($datos_user);
					echo "<article>";
   						echo utf8_decode("<p>Nombre: $mostrar_user[usu_nombre]");
   						echo utf8_encode(" <p>Email: $mostrar_user[usu_mail]</p>");
   						echo utf8_encode(" <p>Telefono: $mostrar_user[usu_telefono]</p>");
   						echo utf8_decode(" <p>Direccion: $mostrar_user[usu_direccion]</p>");
   						echo utf8_encode("<a class='modificar_contacto' href='modificar_usuario.php?usu_id=$mostrar_user[usu_id]'>Modificar</a></p>");
   						echo utf8_encode("<a href='#'>Ver en Mapa</a></p>");
   						echo "<hr>";
   						echo "</article>";*/

				$sql ="SELECT * FROM tbl_contactos WHERE usu_id=$_SESSION[usu_id]";
				$datos = mysqli_query($conexion, $sql);
				if(mysqli_num_rows($datos)!=0){
					echo "<div class='contenido'>";

	            	while ($mostrar = mysqli_fetch_array($datos)) {
   						echo "<article>";
   						echo utf8_decode("<p>Nombre: $mostrar[con_nombre]");
   						echo utf8_encode(" <p>Email: $mostrar[con_mail]</p>");
   						echo utf8_encode(" <p>Telefono: $mostrar[con_telefono]</p>");
   						echo utf8_decode(" <p>Direccion: $mostrar[con_direccion]</p>");
   						echo utf8_encode("<a class='modificar_contacto' href='modificar.php?con_id=$mostrar[con_id]'>Modificar</a></p>");
   						echo utf8_encode("<input name='contactoUbic' type='checkbox' onclick='cargaContenido();'>Ver en Mapa</p>");
   						echo "<hr>";
   						echo "</article>";
   						$json_php[]= $mostrar;
	            	}
	            	echo "</div>";
				}else{
	        		echo "Inserta contactos en tu agenda!";
	        	}
			?>
		<div id="map"></div>
		<footer>
			<p>CopyRight &copy; creado por Aitor y Felipe<p>
            <script type="text/javascript">
               var json = <?php echo json_encode($json_php); ?>;
               mostrar(json);
            </script>
		</footer>
	</body>
</html>
