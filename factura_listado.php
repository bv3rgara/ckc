<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>
<SCRIPT LANGUAGE="JavaScript"> 
<!--

	function validar(form){
		/*Ctrl = form.periodo;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese el periodo a consultar!");
			Ctrl.focus();
			return;    	  
		}*/

		Ctrl = form.id_factura;
		if (Ctrl.value == 0) {
			alert ("Por favor seleccione periodo / obra social a consultar!");
			Ctrl.focus();
			return;    	  
		}

		form.submit();
	}

	function imprimir(){
		var opciones="toolbar=yes, location=yes, directories=yes, status=yes, menubar=yes, scrollbars=yes, resizable=yes, fullscreen=yes";
		window.open('factura_pdf.php',"",opciones);
	}

	-->
</SCRIPT>

<body onload="document.getElementById('id_factura').focus();">
	<div id="site_content">
		<?php  
		include("menu.php");
		?>
		<div id="content">
			<h1>LISTAR FACTURA</h1>
			<div class="datagrid2">
				<div style="padding-right: 30px">
					<FORM NAME="varios" METHOD="POST" ID="varios"/>
						<table>
							<!-- <tr>
								<td><div class="campos">Periodo</div></td>
								<td>
									<select id="periodo" name="periodo" class="textin2">
						                <?php
						                $sql="SELECT distinct(periodo) FROM factura WHERE estado = 'L'";
						                $consulta = mysql_query($sql, $conexion);?>
						                <option value="0">Seleccione Periodo<?php
						                while ($array = mysql_fetch_array($consulta)) {?>
						                    <option value="<?php echo $array['periodo']?>">
						                    	<?php
						                    	$div = explode("-", $array['periodo']);
						                    	echo $div[0]."-".$div[1];
						                    	?>						                    		
						                    </option>
						                    <?php
						                } ?>
						            </select>
								</td>
							</tr> -->
							<tr>
								<td><div class="campos">Periodo / OS</div></td>
								<td>								
									<select id="id_factura" name="id_factura" class="textin2">
						                <?php
						                $sql="SELECT * FROM obra_social os, factura f WHERE os.estado = 'A' AND  f.id_os = os.id_obra_social ORDER BY periodo ASC";
						                $consulta = mysql_query($sql, $conexion);?>
						                <option value="0">Seleccione Periodo / OS<?php
						                while ($array = mysql_fetch_array($consulta)) {?>
						                    <!-- <option value="<?php echo $array['id_obra_social']?>"><?php echo $array['periodo']." (".$array['id_obra_social'].") - ".$array['nombre']; ?></option> -->
						                    <option value="<?php echo $array['id_factura']?>"><?php echo $array['periodo']." / ".$array['nombre']; ?></option>
						                    <?php
						                } ?>
						            </select>
								</td>
							</tr>
						</table>
						<div class="botones">
							<tr>
								<td colspan="2">
									<input type="button" name="guardar" class="botin" value="Listar" onClick="validar(varios)"/>
								</td>
							</tr>
						</div>
					</FORM>
					<?php
					$nro = 0;
					if (@$_REQUEST['id_factura']){
						$id_factura = $_REQUEST['id_factura'];
						$sql_f="SELECT * FROM factura WHERE id_factura = '$id_factura'";
						$consulta_f = mysql_query($sql_f, $conexion);
						$array_f = mysql_fetch_array($consulta_f);
						$periodo = $array_f['periodo'];
						$os = $array_f['id_os'];
						$sql = "SELECT * FROM detalle_factura WHERE periodo = '".$periodo."' AND id_os = '".$os."' AND estado = 'L' ORDER BY id_kinesiologo ASC";  
						$nro = mysql_affected_rows();
						$query = mysql_query($sql,$conexion);

						$sql_f = "SELECT * FROM factura WHERE periodo = '".$periodo."' AND id_os = '".$os."' AND estado = 'L'";  
						$query_f = mysql_query($sql_f,$conexion);
						$fila_f = mysql_fetch_array($query_f);

						if ($nro > 0){?>
							<table id="myTable" class="table table-hover" style="width: 95%;">
								<thead>
									<tr class="active">
										<th a title="Matricula Provincial">Matricula</th>
										<th a style="width: 140px;">KINESIOLOGO</th>
										<th a>SERVICIO</th>
										<th a style="width: 140px;">INSTITUTO</th>
										<th a style="width: 100px;">FECHA</th>
										<th a>HONORARIOS</th>
										<th a>SESION</th>
										<th a style="width: 80px;">TOTAL</th>
										<?php
				                        if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>
			                            	<!-- <th a>ACCION</th> -->
			                            	<?php
				                        }?>
									</tr>
								</thead>
								<tbody>     
									<?php
									$total = 0;								
									while ($fila = mysql_fetch_array($query)) {	
										$sql_k = "SELECT matricula, ayn FROM kinesiologo WHERE id_kinesiologo = '".$fila['id_kinesiologo']."'";  
										$query_k = mysql_query($sql_k,$conexion);  
										$kinesiologo = mysql_fetch_array($query_k);

										$sql_os = "SELECT nombre FROM obra_social WHERE id_obra_social = '".$fila['id_os']."'";  
										$query_os = mysql_query($sql_os,$conexion);  
										$os = mysql_fetch_array($query_os);
										$total = $total + $fila['total'];

										$_SESSION['periodo'] = $periodo;
										$_SESSION['os'] = $fila['id_os'];
										?> 
										<tr title="Número de Factura: <?php echo $fila_f['id_factura'];?>">
											<td><?php echo $kinesiologo[0]; ?></td>                          
											<td><?php echo $kinesiologo[1]; ?></td>                          	
											<td>
												<?php
												if ($fila['tipo'] == 'D') {
													$tipo = "Domiciliario";
												} elseif ($fila['tipo'] == 'I') {
													$tipo = "Internado";
												}
												echo $tipo;
												?>
											</td>
											<?php
											$sql_i = "SELECT nombre FROM instituto WHERE id_instituto = '".$fila['id_instituto']."' AND estado = 'A'";  
											$query_i = mysql_query($sql_i,$conexion);
											$inst = mysql_fetch_array($query_i);
											if ($inst[0]) {
												if (strlen($inst[0]) >= 16) {
													?>
													<td title="<?php echo $inst[0] ?>">
														<?php
														echo substr($inst[0], 0, 16)."...";
														?>
													</td>
													<?php													
												}else{
													?>
													<td title="<?php echo $inst[0] ?>">
														<?php
														echo $inst[0];
														?>
													</td>
													<?php
												}												
											}else {
												?>
												<td style="text-align: center;">
													<?php
													echo "~";
													?>
												</td>
												<?php
											}
											?>										                        
											<td><?php echo $fila['fecha']; ?></td>                          
											<td><?php echo "$ ".$fila['honorario']; ?></td>                          
											<td><?php echo $fila['sesion']; ?></td>                          
											<td><?php echo "$ ".$fila['total']; ?></td>
											<?php
			                            	if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>                  
												<!-- <td>
													<?php 
													if ($fila['estado'] == 'A') {?>
														<input class="imaborrar" type="button" name="dele" title="Borrar" onClick="por_borrar(<?php echo  $fila["id_obra_social"];?>);">		
														<input type="button" name="modi" class="imaeditar" title="Editar" onClick="this.form.action='edicion_obra_social.php?indice_m=<?php echo $fila["id_obra_social"];?>';this.form.submit();"/>
														<?php	
													}elseif ($fila['estado'] == 'B') {?>
														<input type="button" name="reset" class="imareset" title="Hablitar"	onClick="this.form.action='habilitar_obra_social.php?indice_u=<?php echo $fila["id_obra_social"];?>' ;this.form.submit();"/>
														<?php
													}
													?>		                                    
												</td> -->
												<?php
			                            	}?>
										</tr>
										<?php
									}?>
								</tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td colspan="2" style="text-align: right;"><b>TOTAL GENERAL:</b></td>
									<td>
										<?php 
										echo "<b>$ ".number_format($total, 2, '.', '')."</b>";
										?>
									</td>
									<td></td>
								</tr>
								<tr>
									<td colspan="10" style="text-align: center;">
										<input class="botin" name="Imprimir" type="button" id="Imprimir" value="Imprimir" onClick="imprimir()"/>
									</td>
								</tr>
							</table>
							<?php
						}else{
							echo "<div class=mensaje>No posee facturas cargadas de la obra social en dicho periodo!</div>";
						}//$nro
					}else{

					}		
					?>
				</div>  	        	
			</div>
		</div>
	</div>
</body>
<?php  
include("pie.php");
?>