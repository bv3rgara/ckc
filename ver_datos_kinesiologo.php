<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_kinesiologo'] = true;
?>

<body onload="document.getElementById('ayn').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>ALTA KINESIOLOGO</h1>
        	<form name="formAltaKinesiologo" action="guardar_kinesiologo.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Apellido y Nombre</div></td>
							<td><input  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" name="ayn" id="ayn" class="textin" value="" maxlength="80"/></td>
						</tr>
						<tr>
							<td><div class="campos">Domicilo&nbsp;del&nbsp;Consultorio</div></td>
							<td><input type="text" name="domicilio_cons" id="domicilio_cons" class="textin" value="" maxlength="60"/></td>
						</tr>				
						<tr>
							<td><div class="campos">Teléfono&nbsp;del&nbsp;Consultorio</div></td>
							<td><input type="text" name="telefono_cons" id="telefono_cons" class="textin" value="" maxlength="15"/></td>
						</tr>						
						<tr>
							<td><div class="campos">Matrícula</div></td>
							<td><input type="text" name="matricula" id="matricula" class="textin" value="" maxlength="8"/></td>
						</tr>
						<tr>
							<td><div class="campos">DNI</div></td>
							<td><input type="text" name="dni" id="dni" class="textin" value="" maxlength="8"/></td>
						</tr>
						<tr>
							<td><div class="campos">Especialidad</div></td>
							<td>
								<?php
								$sql = "SELECT * FROM especialidad WHERE estado = 'A' ORDER BY nombre";
								$res = mysql_query($sql,$conexion);
								echo "<select name=espe_1 class=textin2>";
								echo '<option value=0 selected>Seleccione Especialidad</option>';
								while ($especialidad = mysql_fetch_array($res)){
									echo '<option VALUE='.$especialidad['id_especialidad'].'>'.$especialidad['nombre']." - ".$especialidad['id_especialidad'].'</option>';
								}
								echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Observaciones</div></td>
							<td><textarea rows="3" name="observaciones" id="observaciones" class="textin" value=""></textarea></td>
						</tr>
						<tr>
							<td colspan="" rowspan="" headers=""></td>
							<td>

								<div class="campos">
									<input id="A" class="botin2" type="button" value="+ Datos Personales" onclick="Ver()">
									<input id="B" class="botin2" style="display: none;" type="button" value="- Datos Personales" onclick="Ocultar()">
								</div>
							</td>
						</tr>							
						<tr>
							<td><div style="display: none;" id="x1" class="campos">Domicilo&nbsp;Particular</div></td>
							<td><input style="display: none;" type="text" name="domicilio_part" id="domicilio_part" class="textin" value="" maxlength="60"/></td>
						</tr>				
						<tr>
							<td><div style="display: none;" id="x2" class="campos">Teléfono&nbsp;Particular</div></td>
							<td><input style="display: none;" type="text" name="telefono_part" id="telefono_part" class="textin" value="" maxlength="15"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x3" class="campos">Correo Electrónico</div></td>
							<td><input style="display: none;" type="text" name="mail" id="mail" class="textin" value="" maxlength="100"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x4" class="campos">Fecha de Nacimiento</div></td>
							<td><input style="display: none;" value="1970-10-08" type="date" name="fecha_nac" id="fecha_nac" class="textin"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x5" class="campos">CUIT</div></td>
							<td><input style="display: none;" type="text" name="cuit" id="cuit" class="textin" value="" maxlength="12"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x6" class="campos">Sexo</div></td>
							<td>		
								<SELECT style="display: none; "NAME="sexo" id="sexo" class="textin2">
									<OPTION VALUE="0" SELECTED>Seleccione Sexo
									<OPTION VALUE="M">Masculino
									<OPTION VALUE="F">Femenino
								</SELECT>
							</td>
						</tr>
					</table>
					<div id="win">
		                <div class="win-contenedor">
		                    <h2><?php echo $fila['ayn']; ?></h2>
		                    <p><i><b>DIRECCION PARTICULAR</i></b>: <?php echo $fila['dom_part']; ?></p>
		                    <p><i><b>TELEFONO PARTICULAR</i></b>: <?php echo $fila['tel_part']; ?></p>
		                    <p><i><b>EMAIL PARTICULAR</i></b>: <?php echo $fila['mail']; ?></p>
		                    <p><i><b>FECHA DE NACIMIENTO</i></b>: <?php echo $fila['fecha_nac']; ?></p>
		                    <p><i><b>NUMERO DE CUIT</i></b>: <?php echo $fila['cuit']; ?></p>
		                    <p><i><b>SEXO</i></b>: <?php echo $fila['sexo']; ?></p>
		                    <a class="win-cerrar" href="#">X</a>
		                </div>
		            </div>
				</div>
			</form>    
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
