<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_kinesiologo'] = true;
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

<body onload="document.getElementById('ayn').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<div style="color: red">
				* campo obligatorio
			</div>
        	<h1>ALTA KINESIOLOGO</h1>
        	<form name="formAltaKinesiologo" action="guardar_kinesiologo.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Apellido y Nombre </div></td>
							<td><input autocomplete="off"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" name="ayn" id="ayn" class="textin" value="" maxlength="80"/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Dir.&nbsp;del&nbsp;Consultorio</div></td>
							<td><input autocomplete="off" type="text" name="domicilio_cons" id="domicilio_cons" class="textin" value="" maxlength="60"/></td>
						</tr>				
						<tr>
							<td><div class="campos">Tel.&nbsp;del&nbsp;Consultorio</div></td>
							<td><input autocomplete="off" type="text" name="telefono_cons" id="telefono_cons" class="textin" value="" maxlength="15" onkeypress="return compruebo_nro(event);"/></td>
						</tr>						
						<tr>
							<td><div class="campos">Matrícula</div></td>
							<td><input autocomplete="off" type="text" name="matricula" id="matricula" class="textin" value="" maxlength="5" onkeypress="return compruebo_nro(event);"/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">DNI</div></td>
							<td><input autocomplete="off" type="text" name="dni" id="dni" class="textin" value="" maxlength="8" onkeypress="return compruebo_nro(event);"/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
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
								<p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Observaciones</div></td>
							<td><textarea rows="3" name="observaciones" id="observaciones" class="textin" value=""></textarea></td>
						</tr>
						<tr>
							<!-- <td></td> -->
							<td colspan="2">
								<div class="campos" style="width: 450px">
									<input id="A" class="botin2" type="button" value="+ Datos Personales" onclick="Ver()">
									<input id="B" class="botin2" style="display: none;" type="button" value="- Datos Personales" onclick="Ocultar()">
								</div>
							</td>
						</tr>							
						<tr>
							<td><div style="display: none;" id="x1" class="campos">Domicilo&nbsp;Particular</div></td>
							<td><input autocomplete="off" style="display: none;" type="text" name="domicilio_part" id="domicilio_part" class="textin" value="" maxlength="60"/></td>
						</tr>				
						<tr>
							<td><div style="display: none;" id="x2" class="campos">Teléfono&nbsp;Particular</div></td>
							<td><input autocomplete="off" style="display: none;" type="text" name="telefono_part" id="telefono_part" class="textin" value="" onkeypress="return compruebo_nro(event);" maxlength="15"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x3" class="campos">E-mail</div></td>
							<td><input autocomplete="off" style="display: none;" type="text" name="mail" id="mail" class="textin" value="" maxlength="100"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x4" class="campos">Fecha Nacimiento</div></td>
							<td><input style="display: none;" value="1970-10-08" type="date" name="fecha_nac" id="fecha_nac" class="textin"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x5" class="campos">CUIT</div></td>
							<td><input autocomplete="off" style="display: none;" type="text" name="cuit" id="cuit" class="textin" value="" onkeypress="return compruebo_nro(event);" maxlength="12"/></td>
						</tr>
						<tr>
							<td><div style="display: none;" id="x6" class="campos">Sexo</div></td>
							<td>		
								<SELECT style="display: none;" NAME="sexo" id="sexo" class="textin2">
									<OPTION VALUE="0" SELECTED>Seleccione Sexo
									<OPTION VALUE="M">Masculino
									<OPTION VALUE="F">Femenino
								</SELECT>
							</td>
						</tr>
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formAltaKinesiologo)"/>
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
