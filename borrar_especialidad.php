<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_especialidad = $_POST['id_especialidad'];
$sql_e = "SELECT * FROM especialidad WHERE id_especialidad = '".$id_especialidad."'";  
$query_e = mysql_query($sql_e,$conexion);
$especialidad = mysql_fetch_array($query_e);
$nombre = $especialidad["nombre"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>BORRAR ESPECIALIDAD</h1>
        	<?php
        	echo "<br><br><br>";
   			$sql = "UPDATE especialidad SET estado = 'B' WHERE id_especialidad = '".$id_especialidad."'";
			$res = mysql_query($sql,$conexion);
			if (mysql_error() == ''){
				echo "<div class=mensaje>La especialidad <i><u>".$nombre."</u></i> ha sido eliminado satisfactoriamente.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_especialidad.php"><?php
			}else{
				echo "<div class=mensaje>No se pudo realizar la eliminación de la especialidad <i><u>".$nombre."</u></i>.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_especialidad.php"><?php
			}
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
