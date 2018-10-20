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
        	<h1>GUARDAR KINESIOLOGO</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";
						if (($_POST['ayn']) and ($_SESSION['grabo_kinesiologo'])) {
							foreach($_POST as $os => $valor){								
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}	
							$_SESSION['grabo_kinesiologo'] = false;							
							$sql = "SELECT * FROM kinesiologo WHERE dni = '".$dni."' OR matricula = '".$matricula."' ";
							$query = mysql_query($sql,$conexion);
							$array = @mysql_fetch_array($query);							
							if(mysql_num_rows($query)){
								echo "<div class=mensaje>Ya existe el kinesiólogo <B>".$ayn."</B>. Vuelva a intentarlo.</div>";
								?><meta http-equiv="refresh" content="3;URL=alta_kinesiologo.php"><?php
								@mysql_free_result($query);
							}else{
								$sql2 = "INSERT INTO kinesiologo(ayn, dom_cons, tel_cons, matricula, dni, observacion, dom_part, tel_part, mail, fecha_nac, cuit, sexo, estado, id_especialidad) VALUES ('$ayn', '$domicilio_cons','$telefono_cons', '$matricula', '$dni', '$observaciones', '$domicilio_part', '$telefono_part', '$mail', '$fecha_nac', '$cuit', '$sexo', 'A', '$espe_1')";
								$query2 = mysql_query($sql2,$conexion);							
								if(mysql_error() == ""){
									@mysql_free_result($query2);
									echo "<div class=mensaje>El kinesiólogo <B>".$ayn."</B> se ha guardado satisfactoriamente.</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_kinesiologo.php"><?php
								}else{
									echo "<div class=mensaje>No se pudo guardar el kinesiólogo. El error es: ".mysql_error().".</div>";
									?><meta http-equiv="refresh" content="3;URL=alta_kinesiologo.php"><?php
								}
							}
							mysql_close($conexion);
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=alta_kinesiologo.php"><?php
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
