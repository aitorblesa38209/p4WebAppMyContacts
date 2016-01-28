<?php
include('/login/login.php');
include('/login/conexion.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
  //array para guardar la información de la base de datos en formato json


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
            initMap(json);
         }
      </script>
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
                  //El array json_mostrar guardará el contenido extraido de la variable mostrar
                  $json_php[] = $mostrar;
						echo utf8_encode("<a href='modificar.php' class='modificar'>Modificar</a>");
	            	echo "</article>";
               }
                  echo "<div id='map' style='width:600px;height:500px;'></div><br/>";
				}else{
	        		echo "<article id='rellena_contenido'>Inserta contactos en tu agenda!</article>";
	        	}

			?>
		</section>
      <script type="text/javascript">
         var json_js = <?php echo json_encode($json_php); ?>;
      </script>
      <?php include 'template/footer.php'; ?>
	</body>
</html>
