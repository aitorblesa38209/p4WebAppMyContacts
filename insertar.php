<?php
include('/login/login.php');
include('/login/conexion.php');
if(empty($_SESSION['login_user'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
?>
<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="utf-8">
    <meta name="description" content="sesiones">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/insertar_usuario.css">
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
    <section class="envoltura">
    <header>
      <p><a href="login/logout.php" class="logout" title="Logout"><img src="img/logout_white.png" alt="Logout"></a>
      <?php echo $_SESSION['nombre_usuario']. " " .$_SESSION['apellido_usuario']?></p>
      <h1 id="h1Agenda">Agenda de Contactos</h1>
    </header>
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

    <div class="lateral">
      <div id="contenedor_titulo">
        <div id="titulo_contacto">
          <h1>Agenda de Contactos</h1>
        </div>

      </div>
    </div>
    <div class="contenido">
        <article id="contenido_contacto">
            <form id="formulario_box" action="insertar.proc.php" method="get">
               <p>Nombre:   <input type="text" name="nombre" maxlength="25"required></p>
              <p>Apellidos:<input type="text" name="apellidos" maxlength="50"required></p>
              <p>Email:    <input type="email" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required title="Formato correcto: jose@mycontacts.com" maxlength="50"></p>
              <p>Teléfono: <input type="tel"  name="telefono" pattern="[0-9]{9}" maxlength="9" required></p>
              <p>Direción: <input type="text" name="direccion" id="direccion" maxlength="90" required></p>
              <input type="hidden" id="lat" name="name">
              <input type="hidden" id="lng" name="name">
              <input id="coordenadas" type="text" value="">
              <div id="map" style="width:600px;height:500px;"></div><br/>
              <input type="submit" name="enviar" value="Registrar">
            </form>
        </article>
    </div>
    <div id="map"></div>
    <footer>
      <p>CopyRight &copy; creado por Aitor y Felipe<p>
    </footer>
  </body>
</html>
