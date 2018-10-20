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
        	<h1>GUARDAR CIERRE FACTURA</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";
						if (($_POST['id_obra_social']) and ($_SESSION['grabo_factura'])){
							$_SESSION['grabo_factura'] = false;
							foreach($_POST as $factu => $valor){
								$asignacion = "\$".$factu."='".$valor."';"; 
								eval($asignacion);
							}
							$sql_11 = "SELECT * FROM factura WHERE periodo = '$periodo' AND id_os = '".$id_obra_social."'";
							$res_11 = mysql_query($sql_11, $conexion);
							$cant = @mysql_num_rows($res_11);

							$sql_obra = "SELECT id_obra_social, nombre FROM obra_social WHERE id_obra_social = '".$id_obra_social."'";  
							$query_obra = mysql_query($sql_obra,$conexion);  
							$obra = mysql_fetch_array($query_obra);

							if ( $cant == 0){
								$sql_fac = "INSERT INTO factura (id_os, periodo, tipo, nro, usuario, estado) VALUES ('$id_obra_social', '$periodo', '', '', '".$_SESSION['usuario']."', 'L')";
								$query_fac=mysql_query($sql_fac,$conexion);
								if (mysql_error() == "") {
									@mysql_free_result($r2);
									$sql_sel_df = "SELECT * FROM detalle_factura WHERE periodo = '$periodo' AND id_os = '".$id_obra_social."' AND estado = 'P'";
									$query_sel_df = mysql_query($sql_sel_df, $conexion);
									while ($detalle_factura=mysql_fetch_array($query_sel_df)){
										$sql_df="UPDATE detalle_factura SET estado = 'L' WHERE id_detalle_factura = '".$detalle_factura['id_detalle_factura']."'";
										$query_df=mysql_query($sql_df,$conexion);
									}
									echo "<div class=mensaje>La factura fue cerrada correctamente para el periodo ".$periodo." y obra social ".$obra[1].".</div>";
									?><meta http-equiv="refresh" content="3;URL=factura_cierre.php"><?php
								}
							}else{// if se cerro factu
								echo "<div class=mensaje>Para este período (".$periodo.") y obra social (".$obra[1].") seleccionada, la facturación ya ha sido cerrada.</div>";
								?><meta http-equiv="refresh" content="3;URL=factura_cierre.php"><?php
							}
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=factura_cierre.php"><?php
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