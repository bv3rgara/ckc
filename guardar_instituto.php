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
        	<h1>GUARDAR INSTITUTO</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";					
						if (($_POST['instituto']) and ($_SESSION['grabo_instituto'])) {
							foreach($_POST as $os => $valor){
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}	
							$_SESSION['grabo_instituto'] = false;							
							$sql = "SELECT * FROM instituto WHERE nombre ='".$instituto."'";
							$query = mysql_query($sql,$conexion);
							$array = @mysql_fetch_array($query);							
							if(mysql_num_rows($query)){
								echo "<div class=mensaje>Ya existe el instituto <B>".$instituto."</B>. Vuelva a intentarlo.</div>";
								?><meta http-equiv="refresh" content="3;URL=alta_instituto.php"><?php
								@mysql_free_result($query);
							}else{
								$sql2 = "INSERT INTO instituto(nombre, direccion, telefono, estado, tipo) VALUES ('$instituto', '$direccion','$telefono',  'A','$tipo')";
								$query2 = mysql_query($sql2,$conexion);
								if(mysql_error() == ""){
									@mysql_free_result($query2);
									echo "<div class=mensaje>El instituto <B>".$instituto."</B> se ha guardado satisfactoriamente.</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_instituto.php"><?php
								}else{
									echo "<div class=mensaje>No se pudo guardar el instituto. El error es: ".mysql_error().".</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_instituto.php"><?php
								}
							}
							mysql_close($conexion);
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=alta_instituto.php"><?php
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
