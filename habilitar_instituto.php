<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_instituto = $_GET['indice_u'];
$sql_e = "SELECT * FROM instituto WHERE id_instituto = '".$id_instituto."'";  
$query_e = mysql_query($sql_e,$conexion);
$instituto = mysql_fetch_array($query_e);
$nombre = $instituto["usuario"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>HABILITAR INSTITUTO</h1>
        	<?php
        	echo "<br><br><br>";
            $sql = "UPDATE instituto SET estado = 'A' WHERE id_instituto = '".$id_instituto."'";
            $r = mysql_query($sql,$conexion);
            $array = @mysql_fetch_array($r);
            if (mysql_errno() == 0){
                @mysql_free_result($r);
                echo "<div class=mensaje>El instituto <i><u>".$nombre."</u></i> se ha habilitado satisfactoriamente.</div>";?>
                <meta http-equiv="refresh" content="3;URL=listado_instituto.php">               
                <?php   
            }else{
                echo "<div class=mensaje>No se pudo realizar la habilitación del instituto <u><i> ".$nombre."</u></i>.</div>";
                echo "<div class=mensaje>El error es : ".mysql_error().".</div>";
                ?><meta http-equiv="refresh" content="3;URL=listado_instituto.php"><?php
            }
            mysql_close($conexion);
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
