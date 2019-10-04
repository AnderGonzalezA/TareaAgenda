<!DOCTYPE html>
<html>
<head>
	<title>Tarea agenda</title>
</head>
<body>
	<h1>Agenda Web</h1>
<form method="POST" action="#">
	<label>Nombre</label><input type="text" name="nombre" id="nombre"><br>
	<label>Correo electronico</label><input type="email" name="correo" id="correo">
	<input type="submit" name="enviar" value="Enviar">
</form><br><br>
<ul>
	<?php
		session_start();
		if (isset($_SESSION["usuarios"])){
			echo("una vez creada la sesion");
			$usuarios = $_SESSION["usuarios"];
			if ($_POST["enviar"]){
				if (isset($_POST["nombre"]) && isset($_POST["correo"]) && trim($_POST["nombre"]) != '' && trim($_POST["correo"]) != ""){
					$usuarios[$_POST["nombre"]] = $_POST["correo"];
					echo(count($usuarios));
				}else if (!isset($_POST["correo"]) || trim($_POST["correo"]) == ""){
					unset($usuarios[$_POST["nombre"]]);
					$usuarios = array_values($usuarios);
					$_SESSION["usuarios"] = $usuarios;
				}else{
					echo("Inserta el nombre");
				}
			}
			foreach ($usuarios as $key => $value) {
				echo($key . " " . $value . "<br>");
			}
		}else{
			echo("sin crear sesion");
			$usuarios = array();
			$_SESSION["usuarios"] = $usuarios;
		}
	?>
</ul>
</body>
</html>