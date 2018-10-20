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
        	<h1>GUARDAR OBRA SOCIAL</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";
						if (($_POST['nombre_obra']) and ($_SESSION['grabo_obra_social'])) {
							foreach($_POST as $os => $valor){
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}	
							$_SESSION['grabo_obra_social'] = false;							
							$sql = "SELECT * FROM obra_social WHERE nombre ='".$nombre_obra."'";
							$query = mysql_query($sql,$conexion);
							$array = @mysql_fetch_array($query);							
							if(mysql_num_rows($query)){
								echo "<div class=mensaje>Ya existe la obra social <B>".$nombre_obra."</B>. Vuelva a intentarlo.</div>";
								?><meta http-equiv="refresh" content="3;URL=alta_obra_social.php"><?php
								@mysql_free_result($query);
							}else{
								$sql2 = "INSERT INTO obra_social(nombre, direccion, telefono, estado, clasificacion, cuit) VALUES ('$nombre_obra', '$direccion','$telefono',  'A','$clasificacion', '$cuit')";
								$query2 = mysql_query($sql2,$conexion);
								if(mysql_error() == ""){
									@mysql_free_result($query2);
									echo "<div class=mensaje>La obra social <B>".$nombre_obra."</B> se ha guardado satisfactoriamente.</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_obra_social.php"><?php
								}else{
									echo "<div class=mensaje>No se pudo guardar la obra social. El error es: ".mysql_error().".</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_obra_social.php"><?php
								}
							}
							mysql_close($conexion);
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=alta_obra_social.php"><?php
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
