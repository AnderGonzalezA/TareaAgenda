<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tarea agenda</title>
</head>
<body>
<form method="POST" action="tareaAgenda.php">
	<label>Nombre</label><input type="text" name="dueño" id="nombre"><br>
	<input type="submit" name="abrir" value="Abrir agenda">
</form>
</body>
</html>