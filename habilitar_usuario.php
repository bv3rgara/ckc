<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_usuario = $_GET['indice_u'];
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
        	<h1>HABILITAR USUARIO</h1>
        	<?php
        	echo "<br><br><br>";
            $sql = "UPDATE usuarios SET pass = '12345', vence = '0000-00-00' WHERE id_usuario = '".$id_usuario."'";
            $r = mysql_query($sql,$conexion);
            $array = @mysql_fetch_array($r);
            if (mysql_errno() == 0){
                @mysql_free_result($r);
                echo "<div class=mensaje>El usuario <i><u>".$nombre."</u></i> ha habilitado e satisfactoriamente.</div>";?>
                <meta http-equiv="refresh" content="3;URL=listado_usuario.php">               
                <?php   
            }else{
                echo "<div class=mensaje>No se pudo realizar la habilitación del usuario <u><i> ".$nombre."</u></i>.</div>";
                echo "<div class=mensaje>El error es : ".mysql_error().".</div>";
                ?><meta http-equiv="refresh" content="3;URL=listado_usuario.php"><?php
            }
            mysql_close($conexion);
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
