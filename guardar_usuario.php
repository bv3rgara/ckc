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
        	<h1>GUARDAR USUARIO</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";					
						if (($_POST['usuario']) and ($_SESSION['grabo_usuario'])) {
							foreach($_POST as $os => $valor){
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}	
							$_SESSION['grabo_usuario'] = false;							
							$sql = "SELECT * FROM usuarios WHERE doc ='".$dni."'";
							$query = mysql_query($sql,$conexion);
							$array = @mysql_fetch_array($query);							
							if(mysql_num_rows($query)){
								echo "<div class=mensaje>Ya existe el número de DNI <B>".$dni."</B>. Vuelva a intentarlo.</div>";
								?><meta http-equiv="refresh" content="3;URL=alta_usuario.php"><?php
								@mysql_free_result($query);
							}else{
								$sql2 = "INSERT INTO usuarios(doc, apellido, nombre, direccion, usuario, categoria, vence, pass) VALUES ('$dni','$apellido','$nombre','$direccion','$usuario', '$categoria', '0000-00-00', '12345')";
								$query2 = mysql_query($sql2,$conexion);
								if(mysql_error() == ""){
									@mysql_free_result($query2);
									echo "<div class=mensaje>El usuario <B>".$usuario."</B> se ha guardado satisfactoriamente.</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_usuario.php"><?php
								}else{
									echo "<div class=mensaje>No se pudo guardar el usuario. El error es: ".mysql_error().".</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_usuario.php"><?php
								}
							}
							mysql_close($conexion);
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=alta_usuario.php"><?php
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
