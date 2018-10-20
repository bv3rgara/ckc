<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_kinesiologo = $_GET['indice_u'];
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
        	<h1>HABILITAR KINESIOLOGO</h1>
        	<?php
        	echo "<br><br><br>";
            $sql = "UPDATE kinesiologo SET estado = 'A' WHERE id_kinesiologo = '".$id_kinesiologo."'";
            $r = mysql_query($sql,$conexion);
            $array = @mysql_fetch_array($r);
            if (mysql_errno() == 0){
                @mysql_free_result($r);
                echo "<div class=mensaje>El kinesiólogo <i><u>".$nombre."</u></i> se ha habilitado satisfactoriamente.</div>";?>
                <meta http-equiv="refresh" content="3;URL=listado_kinesiologo.php">               
                <?php   
            }else{
                echo "<div class=mensaje>No se pudo realizar la habilitación del kinesiólogo <u><i> ".$nombre."</u></i>.</div>";
                echo "<div class=mensaje>El error es : ".mysql_error().".</div>";
                ?><meta http-equiv="refresh" content="3;URL=listado_kinesiologo.php"><?php
            }
            mysql_close($conexion);
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
