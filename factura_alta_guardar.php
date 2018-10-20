ñ{-<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>GUARDAR ALTA FACTURA</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";
						if (($_POST['id_kinesiologo']) and ($_SESSION['grabo_factura'])){
							$_SESSION['grabo_factura'] = false;
							foreach($_POST as $factu => $valor){
								$asignacion = "\$".$factu."='".$valor."';"; 
								eval($asignacion);
							}
							$periodo = $anio_p."-".$mes_p;
							$sql1 = "SELECT * FROM factura WHERE periodo = '$periodo' AND id_os = '$id_obra_social'"; 
							$consulta1=mysql_query($sql1,$conexion);
							$cant = @mysql_num_rows($consulta1);
							if ($cant == 0){
								$periodo = $anio_p."-".$mes_p;
								$sql = "INSERT INTO detalle_factura (periodo, id_kinesiologo, id_os, tipo, id_instituto, dni_paciente, nya_paciente, honorario, sesion, total, fecha, estado, usuario) VALUES ('$periodo', '$id_kinesiologo', '$id_obra_social', '$tpo_serv', '$id_instituto', '$dni_p', '$nom_ape_p', '$honorarios', '$sesion', '$total', '$fecha_practica', 'P', '".$_SESSION['usuario']."')";
								$query = mysql_query($sql,$conexion);
								$id = mysql_insert_id();					
								if(mysql_error() == ""){
									@mysql_free_result($query2);
									echo "<div class=mensaje>La orden número ".$id." se ha guardado satisfactoriamente.</div>";
									?><meta http-equiv="refresh" content="3;URL=factura_alta.php"><?php
								}else{
									echo "<div class=mensaje>No se pudo guardar la orden. El error es: ".mysql_error().".</div>";
									?><meta http-equiv="refresh" content="3;URL=factura_alta.php"><?php
								}
								mysql_close($conexion);
							}else{// if cierre de facturacion
								echo "<div class=mensaje>Para este período y para la obra social seleccionada, la facturación ya ha sido cerrada.</div>";
								?><meta http-equiv="refresh" content="3;URL=factura_alta.php"><?php
							}
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=factura_alta.php"><?php
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