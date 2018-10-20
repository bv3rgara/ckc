<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$fecha_server = date("Y-m-d");
$id_usuario = $_POST['id_usuario'];
$sql_e = "SELECT * FROM usuarios WHERE id_usuario = '".$id_usuario."'";  
$query_e = mysql_query($sql_e,$conexion);
$usuarios = mysql_fetch_array($query_e);
$nombre = $usuarios["usuario"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>BORRAR USUARIO</h1>
        	<?php
        	echo "<br><br><br>";
   			$sql = "UPDATE usuarios SET vence = '$fecha_server' WHERE id_usuario = '".$id_usuario."'";
			$res = mysql_query($sql,$conexion);
			if (mysql_error() == ''){
				echo "<div class=mensaje>El usuario <i><u>".$nombre."</u></i> ha sido eliminado satisfactoriamente.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_usuario.php"><?php
			}else{
				echo "<div class=mensaje>No se pudo realizar la eliminación del usuario <i><u>".$nombre."</u></i>.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_usuario.php"><?php
			}
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
