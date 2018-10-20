<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_especialidad = $_GET['indice_u'];
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
        	<h1>HABILITAR ESPECIALIDAD</h1>
        	<?php
        	echo "<br><br><br>";
            $sql = "UPDATE especialidad SET estado = 'A' WHERE id_especialidad = '".$id_especialidad."'";
            $r = mysql_query($sql,$conexion);
            $array = @mysql_fetch_array($r);
            if (mysql_errno() == 0){
                @mysql_free_result($r);
                echo "<div class=mensaje>Se ha habilitado la especialidad <i><u>".$nombre."</u></i> satisfactoriamente.</div>";?>
                <meta http-equiv="refresh" content="3;URL=listado_especialidad.php">               
                <?php   
            }else{
                echo "<div class=mensaje>No se pudo realizar la habilitación de la especialidad <u><i> ".$nombre."</u></i>.</div>";
                echo "<div class=mensaje>El error es : ".mysql_error().".</div>";
                ?><meta http-equiv="refresh" content="3;URL=listado_especialidad.php"><?php
            }
            mysql_close($conexion);
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
