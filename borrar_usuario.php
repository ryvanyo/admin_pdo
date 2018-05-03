<?php
require_once 'functions.php';

//paso 1. conectarse a la base de datos
$conexion = mysql_connect('localhost', 'roger', 'arroyo');
if ($conexion===false) {
	//no se pudo conectar al servidor de base de datos
	header('Location: listar_usuarios.php?error='.urlencode('No es posible establecer una conexi&oacute;n con la base de datos.') );
	exit();
}
//se establece el sistema de codificacion de caracteres de la conexion a utf-8
mysql_set_charset('utf8', $conexion);
//paso 2. seleccionar la base de datos
if(mysql_select_db('tienda', $conexion)==false) {
	//no se pudo seleccionar la base de datos
	//puede ser debido a que la base de datos no existe o el usuario con el que nos
	//conectamos no tiene los suficientes privilegios
	mysql_close($conexion);
	header('Location: listar_usuarios.php?error='.urlencode('No se pudo seleccionar la base de datos.'));
	exit();
}

if (!isset($_GET['id'])) {
	header('Location: listar_usuarios.php?error='.urlencode('No se indicó el usuario que se quiere borrar.'));
	exit();
}

$sql = 'SELECT * FROM `usuario` WHERE `id`='.intval($_GET['id']);
$resp = mysql_query($sql, $conexion);
if ($resp==false) {
	header('Location: listar_usuarios.php?error='.  urlencode(mysql_error()));
	exit();
}

$usuario = mysql_fetch_assoc($resp);
if (empty($usuario)) {
	header('Location: listar_usuarios.php?error='.urlencode('No se encontró el usuario.'));
	exit();
}

$sql = 'DELETE FROM `usuario` WHERE `id`='.$usuario['id'];
$resp = mysql_query($sql, $conexion);
if ($resp) {
	header('Location: listar_usuarios.php?success='.  urlencode('Usuario borrado.'));
} else {
	header('Location: listar_usuarios.php?error='.urlencode(mysql_error()));
}