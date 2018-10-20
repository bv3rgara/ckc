<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_kinesiologo = $_GET['indice_m'];
?>
<SCRIPT LANGUAGE="JavaScript"> 
	<!--

	function compruebo_nro(e){
	    tecla = (document.all) ? e.keyCode : e.which;
	    //Tecla de retroceso para borrar, siempre la permite
	    if (tecla==8){
	        return true;
	    }      
	    // Patron de entrada, en este caso solo acepta numeros
	    patron =/[0-9]/;
	    tecla_final = String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	}

	function Ver(){
		document.getElementById('x1').style.display = 'block';	
		document.getElementById('x2').style.display = 'block';
		document.getElementById('x3').style.display = 'block';
		document.getElementById('x4').style.display = 'block';
		document.getElementById('x5').style.display = 'block';
		document.getElementById('x6').style.display = 'block';

		document.getElementById('domicilio_part').style.display = 'block';	
		document.getElementById('telefono_part').style.display = 'block';
		document.getElementById('mail').style.display = 'block';
		document.getElementById('fecha_nac').style.display = 'block';
		document.getElementById('cuit').style.display = 'block';
		document.getElementById('sexo').style.display = 'block';

		document.getElementById('B').style.display = 'inline';
		document.getElementById('A').style.display = 'none';
		document.getElementById('domicilio_part').focus();
	}

	function Ocultar(){
		document.getElementById('x1').style.display = 'none';	
		document.getElementById('x2').style.display = 'none';
		document.getElementById('x3').style.display = 'none';
		document.getElementById('x4').style.display = 'none';
		document.getElementById('x5').style.display = 'none';
		document.getElementById('x6').style.display = 'none';

		document.getElementById('domicilio_part').style.display = 'none';	
		document.getElementById('telefono_part').style.display = 'none';
		document.getElementById('mail').style.display = 'none';
		document.getElementById('fecha_nac').style.display = 'none';
		document.getElementById('cuit').style.display = 'none';
		document.getElementById('sexo').style.display = 'none';

		document.getElementById('A').style.display = 'inline';
		document.getElementById('B').style.display = 'none';
	}

	function validar(form){
		/*alertify.alert('Por favor ingrese el número de colegio o seleccione una institución!\n\n<BR>', function () {
			Ctrl1.focus();
			return;
		});*/

		Ctrl = form.ayn;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el nombre y apellido!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.matricula;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el número de matricula provincial!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.dni;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el número de documento!");
			Ctrl.focus();
			return;    	  
		}		

		Ctrl = form.espe_1;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese la especialidad!");
			Ctrl.focus();
			return;    	  
		}		

		form.submit();
	}
	-->
</SCRIPT>

<body onload="Ver()">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>EDITAR KINESIOLOGO</h1>
    		<?php    		
		    if (@$_POST['ayn']){
				$sql = "UPDATE  kinesiologo SET ayn =  '".$_POST['ayn']."', dom_cons =  '".$_POST['domicilio_cons']."', tel_cons =  '".$_POST['telefono_cons']."', matricula =  '".$_POST['matricula']."', dni =  '".$_POST['dni']."', observacion =  '".$_POST['observaciones']."', dom_part =  '".$_POST['domicilio_part']."', tel_part  =  '".$_POST['telefono_part']."', mail =  '".$_POST['mail']."', fecha_nac =  '".$_POST['fecha_nac']."', cuit =  '".$_POST['cuit']."', sexo =  '".$_POST['sexo']."', id_especialidad = '".$_POST['espe_1']."' WHERE  id_kinesiologo = '".$id_kinesiologo."'";
				$r = mysql_query($sql,$conexion);
				if (mysql_error() == ""){
					@mysql_free_result($r);
					echo "<div class=mensaje>La edición en los datos del kinesiólogo <i><u>".$_POST['ayn']."</u></i> se ha ejecutado satisfactoriamente.</div>";
					?><meta http-equiv="refresh" content="3;URL=listado_kinesiologo.php"><?php						
				}else{
					echo "<div class=mensaje>No se pudo realizar la edición del kinesiólogo <i><u>".$_POST['ayn']."</u></i></div>";
					?><meta http-equiv="refresh" content="3;URL=listado_kinesiologo.php"><?php
				}
			}
			$sql = "SELECT * FROM kinesiologo WHERE id_kinesiologo = '".$id_kinesiologo."'";
		   	$r = @mysql_query($sql,$conexion);
			$kinesiologo = @mysql_fetch_array($r);
			if (! $kinesiologo){
				echo "<div class=mensaje>No se encontro información de la kinesiólogo <i><u>".$kinesiologo['nombre']."</u></i></div>";
				?><meta http-equiv="refresh" content="3;URL=listado_kinesiologo.php"><?php
			}			
			?>
			<form name="actualizar" action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Apellido y Nombre</div></td>
							<td><input  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" name="ayn" id="ayn" class="textin"     value="<?php echo $kinesiologo['ayn']?>" maxlength="80"/></td>
						</tr>
						<tr>
							<td><div class="campos">Domicilo&nbsp;del&nbsp;Consultorio</div></td>
							<td><input type="text" name="domicilio_cons" id="domicilio_cons" class="textin" value="<?php echo $kinesiologo['dom_cons']?>" maxlength="60"/></td>
						</tr>				
						<tr>
							<td><div class="campos">Teléfono&nbsp;del&nbsp;Consultorio</div></td>
							<td><input type="text" name="telefono_cons" id="telefono_cons" class="textin" value="<?php echo $kinesiologo['tel_cons']?>" onkeypress="return compruebo_nro(event);" maxlength="15"/></td>
						</tr>						
						<tr>
							<td><div class="campos">Matrícula</div></td>
							<td><input type="text" name="matricula" id="matricula" class="textin" value="<?php echo $kinesiologo['matricula']?>" onkeypress="return compruebo_nro(event);" maxlength="5"/></td>
						</tr>
						<tr>
							<td><div class="campos">DNI</div></td>
							<td><input type="text" name="dni" id="dni" class="textin" value="<?php echo $kinesiologo['dni']?>" onkeypress="return compruebo_nro(event);" maxlength="8"/></td>
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
									echo $sql3 = "SELECT * FROM kinesiologo WHERE estado = 'A' AND id_kinesiologo = '".$id_kinesiologo."' ";
									$res3 = mysql_query($sql3,$conexion);
									$det_especialidad = mysql_fetch_array($res3);
									if ($det_especialidad['id_especialidad'] == $especialidad['id_especialidad']) {
										echo '<option SELECTED VALUE='.$especialidad['id_especialidad'].'>'.$especialidad['nombre']." - ".$especialidad['id_especialidad'].'</option>';
									}else {
										echo '<option VALUE='.$especialidad['id_especialidad'].'>'.$especialidad['nombre']." - ".$especialidad['id_especialidad'].'</option>';
									}									
								}
								echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Observaciones</div></td>
							<td><textarea rows="3" name="observaciones" id="observaciones" class="textin" value=""><?php echo $kinesiologo['observacion']?></textarea></td>
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
							<td><input style="display: none;" type="text" name="domicilio_part" id="domicilio_part" class="textin" value="<?php echo $kinesiologo['dom_part']?>" maxlength="60"/></td>
						</tr>				
						<tr>
							<td><div style="display: none;" id="x2" class="campos">Teléfono&nbsp;Particular</div></td>
							<td><input style="display: none;" type="text" name="telefono_part" id="telefono_part" class="textin" onkeypress="return compruebo_nro(event);" value="<?php echo $kinesiologo['tel_part']?>" maxlength="15"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x3" class="campos">Correo Electrónico</div></td>
							<td><input style="display: none;" type="text" name="mail" id="mail" class="textin" value="<?php echo $kinesiologo['mail']?>" maxlength="100"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x4" class="campos">Fecha de Nacimiento</div></td>
							<td><input style="display: none;" value="<?php echo $kinesiologo['fecha_nac']?>" type="date" name="fecha_nac" id="fecha_nac" class="textin"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x5" class="campos">CUIT</div></td>
							<td><input style="display: none;" type="text" name="cuit" id="cuit" class="textin" onkeypress="return compruebo_nro(event);" value="<?php echo $kinesiologo['cuit']?>" maxlength="12"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x6" class="campos">Sexo</div></td>
							<td>		
								<SELECT style="display: none; "NAME="sexo" id="sexo" class="textin2">
									<?php
									if ($kinesiologo['sexo']== ""){
										?>
										<OPTION VALUE="0" SELECTED>Seleccione Sexo</option>
										<?php
									}else{
										?>
										<OPTION VALUE="0">Seleccione Sexo</option>
										<?php
									}
									if ($kinesiologo['sexo']== "M"){
										?>
										<OPTION VALUE="M" SELECTED>Masculino</option>
										<?php
									}else{
										?>
										<OPTION VALUE="M">Masculino</option>
										<?php
									}
									if ($kinesiologo['sexo']== "F"){
										?>
										<OPTION VALUE="F" SELECTED>Femenino</option>
										<?php
									}else{
										?>
										<OPTION VALUE="F">Femenino</option>
										<?php
									}																	
									?>
								</SELECT>
							</td>
						</tr>					
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(actualizar)"/>
							</td>
						</tr>
					</div>
				</div>
			</form>    
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
