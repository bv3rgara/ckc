<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$fecha_server = date("Y-m-d");
$id_kinesiologo = $_POST['id_kinesiologo'];
$sql_e = "SELECT * FROM kinesiologo WHERE id_kinesiologo = '".$id_kinesiologo."'";  
$query_e = mysql_query($sql_e,$conexion);
$kinesiologo = mysql_fetch_array($query_e);
$nombre = $kinesiologo["ayn"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>BORRAR KINESIOLOGO</h1>
        	<?php
        	echo "<br><br><br>";
   			$sql = "UPDATE kinesiologo SET estado = 'B' WHERE id_kinesiologo = '".$id_kinesiologo."'";
            $res = mysql_query($sql,$conexion);
			if (mysql_error() == ''){
				echo "<div class=mensaje>El kinesiólogo <i><u>".$nombre."</u></i> ha sido eliminado satisfactoriamente.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_kinesiologo.php"><?php
			}else{
				echo "<div class=mensaje>No se pudo realizar la eliminación del kinesiólogo <i><u>".$nombre."</u></i>.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_kinesiologo.php"><?php
			}
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
