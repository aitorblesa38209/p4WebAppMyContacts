<?php
	include('login/login.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="wrapper">
	<header>
		<div id="izquierda">
			<img src="img/logo.png" alt="Mycontacts"/>
		<h1 id="empresa">My Contacts</h1>
		</div>
		<!-- <div id="derecha">
			Aitor Blesa <a href="login/logout.php" title="Logout"><img src="img/logout.png" alt="Logout"></a>
		</div> -->
	</header>
	<section id="formulario">
		<h1>Accede a tu Agenda</h1>
					<form id="formulario_box" method="POST">
						<input name="user" type="text" placeholder="Email" required title="Formato correcto: xxx.xxx@dominio.com">
						<input name="pass" type="password" placeholder="Contraseña" required>
						<input name="submit" type="submit" value="Login"></input>
					</form>
				<input name="submit" type="submit" value="Regístrate" onclick="location.href='registro_usuarios.php'"></input>

				<?php echo $error ;?>
	</section>
	<footer>
		<p>CopyRight &copy; creado por Aitor y Felipe<p>
	</footer>
	</div>
</body>
</html>