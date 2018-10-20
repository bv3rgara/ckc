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
        	<h1>GUARDAR ESPECIALIDAD</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";				
						if (($_POST['especialidad']) and ($_SESSION['grabo_especialidad'])) {
							foreach($_POST as $os => $valor){
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}	
							$_SESSION['grabo_especialidad'] = false;							
							$sql = "SELECT * FROM especialidad WHERE nombre ='".$especialidad."'";
							$query = mysql_query($sql,$conexion);
							$array = @mysql_fetch_array($query);							
							if(mysql_num_rows($query)){
								echo "<div class=mensaje>Ya existe la especialidad <B>".$especialidad."</B>. Vuelva a intentarlo.</div>";
								?><meta http-equiv="refresh" content="3;URL=alta_especialidad.php"><?php
								@mysql_free_result($query);
							}else{
								$sql2 = "INSERT INTO especialidad(nombre, estado, descripcion) VALUES ('$especialidad','A','$descripcion')";
								$query2 = mysql_query($sql2,$conexion);
								if(mysql_error() == ""){
									@mysql_free_result($query2);
									echo "<div class=mensaje>La especialidad <B>".$especialidad."</B> se ha guardado satisfactoriamente.</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_especialidad.php"><?php
								}else{
									echo "<div class=mensaje>No se pudo guardar la especialidad. El error es: ".mysql_error().".</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_especialidad.php"><?php
								}
							}
							mysql_close($conexion);
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=alta_especialidad.php"><?php
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
