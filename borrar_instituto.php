<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_instituto = $_POST['id_instituto'];
$sql_e = "SELECT * FROM instituto WHERE id_instituto = '".$id_instituto."'";  
$query_e = mysql_query($sql_e,$conexion);
$instituto = mysql_fetch_array($query_e);
$nombre = $instituto["nombre"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>BORRAR INSTITUTO</h1>
        	<?php
        	echo "<br><br><br>";
   			$sql = "UPDATE instituto SET estado = 'B' WHERE id_instituto = '".$id_instituto."'";
			$res = mysql_query($sql,$conexion);
			if (mysql_error() == ''){
				echo "<div class=mensaje>El instituto <i><u>".$nombre."</u></i> ha sido eliminado satisfactoriamente.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_instituto.php"><?php
			}else{
				echo "<div class=mensaje>No se pudo realizar la eliminación del instituto <i><u>".$nombre."</u></i>.</div>";
				?><meta http-equiv="refresh" content="3;URL=listado_instituto.php"><?php
			}
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
