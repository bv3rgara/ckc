 <?php
$servidor = "localhost"; 
$usuario  = "admin";
$password = "admin123";
$base_de_datos = "ckc";

$conexion = mysql_connect ($servidor,$usuario,$password) or die ('Imposible conectarse con la BD.');
	if (! $conexion){echo "No se pudo conectar con el servidor MySQL";exit();}
	if (! mysql_select_db($base_de_datos)){echo "No se pudo conectar con la base de datos";exit();
}
?>