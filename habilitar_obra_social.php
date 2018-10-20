<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_obra_social = $_GET['indice_u'];
$sql_e = "SELECT * FROM obra_social WHERE id_obra_social = '".$id_obra_social."'";  
$query_e = mysql_query($sql_e,$conexion);
$obra_social = mysql_fetch_array($query_e);
$nombre = $obra_social["nombre"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>HABILITAR OBRA SOCIAL</h1>
        	<?php
        	echo "<br><br><br>";
            $sql = "UPDATE obra_social SET estado = 'A' WHERE id_obra_social = '".$id_obra_social."'";
            $r = mysql_query($sql,$conexion);
            $array = @mysql_fetch_array($r);
            if (mysql_errno() == 0){
                @mysql_free_result($r);
                echo "<div class=mensaje>La obra_social <i><u>".$nombre."</u></i> se ha habilitado satisfactoriamente.</div>";?>
                <meta http-equiv="refresh" content="3;URL=listado_obra_social.php">               
                <?php   
            }else{
                echo "<div class=mensaje>No se pudo realizar la habilitación de la obra_social <u><i> ".$nombre."</u></i>.</div>";
                echo "<div class=mensaje>El error es : ".mysql_error().".</div>";
                ?><meta http-equiv="refresh" content="3;URL=listado_obra_social.php"><?php
            }
            mysql_close($conexion);
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
