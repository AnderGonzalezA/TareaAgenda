<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tarea agenda</title>
</head>
<body>
	<h1>Agenda Web</h1>
<form method="POST" action="#">
	<label>Nombre</label><input type="text" name="nombre" id="nombre"
	<?php
		if (isset($_POST["nombre"]) && trim($_POST["nombre"]) != ""){
			echo("value = '" . $_POST["nombre"]) . "'";
		}
	?>><br>
	<label>Correo electronico</label><input type="email" name="correo" id="correo"
	<?php
		if (isset($_POST["correo"]) && trim($_POST["correo"]) != ""){
			echo("value = '" . $_POST["correo"]) . "'";
		}
	?>>
	<input type="submit" name="enviar" value="Enviar">
</form><br><br>
<ul>
	<?php
		//session_start();
		if (isset($_SESSION["usuarios"])){
			$usuarios = $_SESSION["usuarios"];
			if ($_POST["enviar"]){
				if (trim($_POST["nombre"]) != "" && trim($_POST["correo"]) != ""){
					$usuarioRepetido = false;
					for ($i = 0; $i<count($usuarios); $i++){
						if ($usuarios[$i]["nombre"] == $_POST["nombre"]){
							$usuarioRepetido = true;
							$usuarios[$i]["correo"] = $_POST["correo"];
						}
					}
					if (!$usuarioRepetido){
						$persona = array("nombre" => $_POST["nombre"], "correo" => $_POST["correo"]);
						array_push($usuarios, $persona);
					}
				}else if (trim($_POST["nombre"]) != ""){
					for ($i = 0; $i<count($usuarios); $i++){
						if ($usuarios[$i]["nombre"] == $_POST["nombre"]){
							unset($usuarios[$i]);
						}
					}
				}else{
					echo("Inserta como mínimo el nombre");
				}
				$_SESSION["usuarios"] = $usuarios;
			}
			foreach ($usuarios as $persona) {
				echo($persona["nombre"] . " " . $persona["correo"] . "<br>");
			}
		}else{
			$usuarios = array();
			$_SESSION["usuarios"] = $usuarios;
		}
	?>
</ul>
</body>
</html>