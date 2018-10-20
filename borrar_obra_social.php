<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_obra_social = $_POST['id_obra_social'];
$sql_e = "SELECT * FROM obra_social WHERE id_obra_social = '".$id_obra_social."'";  
$query_e = mysql_query($sql_e,$conexion);
$instituto = mysql_fetch_array($query_e);
$nombre = $instituto["nombre"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>BORRAR OBRA SOCIAL</h1>
        	<?php
        	echo "<br><br><br>";
   			$sql = "UPDATE obra_social SET estado = 'B' WHERE id_obra_social = '".$id_obra_social."'";
			$res = mysql_query($sql,$conexion);
			if (mysql_error() == ''){
				echo "<div class=mensaje>La obra social <i><u>".$nombre."</u></i> ha sido eliminada satisfactoriamente.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_obra_social.php"><?php
			}else{
				echo "<div class=mensaje>No se pudo realizar la eliminación de la obra social <i><u>".$nombre."</u></i>.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_obra_social.php"><?php
			}
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
