<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>GUARDAR CONTRASEÑA</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";					
						if ($_POST['contrasena'] && $_POST['contrasena2']){
							foreach($_POST as $os => $valor){
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}
							$sql_5="UPDATE usuarios SET pass = '$contrasena' WHERE  id_usuario = '".$_SESSION['id']."'";
							$r_5=mysql_query($sql_5,$conexion);
							if (mysql_error() == "") {
								echo "<div class=mensaje>El cambio de contraseña se realizo con éxito.</div>";
								?><meta http-equiv="refresh" content="3;URL=inicio.php"><?php
							}
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=inicio.php"><?php
						}
						?>
					</table>					
				</div>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
