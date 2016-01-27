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
      <link rel="stylesheet" type="text/css" href="css/insertar.css">
      <script type="text/javascript" src="js/maps.js"></script>
      <!-- api de google maps  -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW_5m9Miz3xloHRp1QF3cW5V_I0qoz3RI&callback=initMap" async defer></script>
      <script type="text/javascript">
         window.onload = function(){
            initMap();
         }
      </script>
		<body>
		<section class="envoltura">
		<header>
			<p><a href="login/logout.php" class="logout" title="Logout"><img src="img/logout_white.png" alt="Logout"></a>
			<?php echo $_SESSION['nombre_usuario']. " " .$_SESSION['apellido_usuario']?></p>
			<h1 id="h1Agenda">Agenda de Contactos</h1>
		</header>
      <article>
         <form id="formInsertar" action="insertar.proc.php" method="get">
            <p>Nombre:   <input type="text" name="nombre"></p>
            <p>Apellidos:<input type="text" name="apellidos"></p>
            <p>Email:    <input type="mail" name="mail"></p>
            <p>Teléfono: <input type="tel"  name="telefono" pattern="[0-9]{9}"></p>
            <p>Direción: <input type="text" name="direccion"></p>
            <input type="hidden" name="latitud" value="">
            <input type="hidden" name="longitud" value="">
            <div id="map" style="width:300px;height:200px;"></div><br/>
            <input type="submit" name="enviar" value="Enviar">
         </form>
	   </article>
		<footer>
			<p>CopyRight &copy; creado por Aitor<p>
			<a href="#"><img src="img/scrolltop.png" alt="top"></a>
		</footer>
		</section>
	</body>
</html>
