<?php
	include('login/login.php');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="sesiones">
		<meta name="keywords" content="HTML5, CSS3, JavaScript">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>My Contacts</title>
		<link rel="icon" type="image/png" href="img/favicon.png"/>
	</head>
	<body>
	<header>
		<nav>
			<img src="img/logo.png" alt="MyContacts" width="50px">
		</nav>
		
	</header>
			<section>
				<h1>Accede a tu Agenda</h1>
					<form id="formulario_box" method="POST">
						<input name="user" type="text" placeholder="Email">
						<input name="pass" type="password" placeholder="Contraseña">
						<input name="submit" type="submit" value="Login"></input>
					</form>
				<input name="submit" type="submit" value="Regístrate" onclick="location.href='registro.php'"></input>

				<?php echo $error ;?>
			</section>

	<footer>
		<p>CopyRight &copy; creado por Aitor y Felipe<p>
	</footer>
	</body>
</html>
