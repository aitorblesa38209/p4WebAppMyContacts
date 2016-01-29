<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="sesiones">
		<meta name="keywords" content="HTML5, CSS3, JavaScript">
		<link rel="stylesheet" type="text/css" href="/css/registro_usuarios.css">
		<title>My Contacts</title>
		<link rel="icon" type="image/png" href="/img/favicon.png"/>
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
				<h1>Registro de Usuario</h1>
					<form id="formulario_box" action="registro_usuarios.proc.php" method="POST">
						<input name="nombre" type="text" placeholder="Nombre" required>
						<input name="apellido" type="text" placeholder="Apellido" required>
						<input name="email" type="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required title="Formato correcto: xxx.xxx@dominio.com">
						<input name="pass" type="password" placeholder="Contraseña" required>
						<input name="telefono" type="tel" pattern="[0-9]{9}" placeholder="Telefono" required title="Formato correcto: 123456789">
						<input name="direccion" type="text" placeholder="Direccion" required>
						<input name="submit" type="submit" value="Crear"></input>
					</form>
				<input name="submit" type="submit" value="Volver" onclick="location.href='index.php'"></input>
			</section>

	<footer>
		<p>CopyRight &copy; creado por Aitor y Felipe<p>
	</footer>
	</body>
</html>
