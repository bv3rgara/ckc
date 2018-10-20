<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_factura'] = true;
$fecha = date("d/m/Y");
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

	function mostrar(nro){
		if(nro == 1){
			document.getElementById('div_id_instituto').style.display = 'none';
			document.getElementById('id_instituto').style.display = 'none';
			document.forms['formAltaFactura']['id_instituto'].value = '0'	
		}
		if(nro == 2){
			document.getElementById('div_id_instituto').style.display = 'block';
			document.getElementById('id_instituto').style.display = 'block';
		}
	}

	function validar(form){
		Ctrl = form.mes_p;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese el mes del periodo!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.anio_p;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese el año del periodo!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.id_kinesiologo;
		if (Ctrl.value == 0){
			alert ("Por favor seleccione el kinesiólogo!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.id_obra_social;
		if (Ctrl.value == "0"){
			alert ("Por favor seleccione la obra social!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.fecha_practica;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese la fecha!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.honorarios;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese los honorarios!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.total;
		if (Ctrl.value == 0){
			alert ("El importe total debe ser mayor a 0!");
			form.honorarios.focus();
			return;    	  
		}

		mm = form.mes_p.value;
		aaaa = form.anio_p.value;
		id_obra_social = form.id_obra_social.value;

		//if (confirm ("Está a punto de guardar la orden del periodo "+aaaa+"-"+mm+" de la obra social "+id_obra_social+" \nDesea continuar?")){
		if (confirm ("Está a punto de guardar la orden del periodo "+aaaa+"-"+mm+" \nDesea continuar?")){
			form.submit();	  
 		}
	}

	function calcula_tot(){
		honorario = document.getElementById('honorarios').value;
		sesion = document.getElementById('sesion').value
		document.getElementById('total').value= redondea((sesion * honorario),2);
	}

	function redondea(sVal, nDec){ 
		var n = parseFloat(sVal); 
		var s = "0.00"; 
		if (!isNaN(n)){ 
		n = Math.round(n * Math.pow(10, nDec)) / Math.pow(10, nDec); 
		s = String(n); 
		s += (s.indexOf(".") == -1? ".": "") + String(Math.pow(10, nDec)).substr(1); 
		s = s.substr(0, s.indexOf(".") + nDec + 1); 
		} 
		return s; 
	} 	

	-->
</SCRIPT>

<body onload="document.getElementById('mes_p').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<div style="color: red">
				* campo obligatorio
			</div>
        	<h1>CARGAR FACTURA</h1>
        	<form name="formAltaFactura" action="factura_alta_guardar.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Periodo</div></td>
							<td>
								<SELECT NAME="mes_p" id="mes_p" class="textin2" style="width: 138px;">
									<OPTION VALUE="0" SELECTED>Mes
									<OPTION VALUE="01">Enero
									<OPTION VALUE="02">Febrero
									<OPTION VALUE="03">Marzo
									<OPTION VALUE="04">Abril
									<OPTION VALUE="05">Mayo
									<OPTION VALUE="06">Junio
									<OPTION VALUE="07">Julio
									<OPTION VALUE="08">Agosto
									<OPTION VALUE="09">Septiembre
									<OPTION VALUE="10">Octubre
									<OPTION VALUE="11">Noviembre
									<OPTION VALUE="12">Diciembre
								</SELECT>
								<SELECT NAME="anio_p" id="anio_p" class="textin2" style="width: 218px;">
									<OPTION VALUE="0" SELECTED>Año
									<OPTION VALUE="2016">2016
									<OPTION VALUE="2017">2017
									<OPTION VALUE="2018">2018									
								</SELECT>
								<p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Kinesiólogo</div></td>
							<td>								
								<select id="id_kinesiologo" name="id_kinesiologo" class="textin2">
					                <?php
					                $sql="SELECT * FROM kinesiologo WHERE estado = 'A' ";
					                $consulta = mysql_query($sql, $conexion);?>
					                <option value="0">Seleccione Kinesiólogo<?php
					                while ($array = mysql_fetch_array($consulta)) {?>
					                    <option value="<?php echo $array['id_kinesiologo']?>"><?php echo "(".$array['id_kinesiologo'].") - ".$array['ayn']?>- <?php echo " MP: ".$array['matricula']?></option>
					                    <?php
					                } ?>
					            </select>
					            <p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Obra Social</div></td>
							<td>								
								<select id="id_obra_social" name="id_obra_social" class="textin2">
					                <?php
					                $sql="SELECT * FROM obra_social WHERE estado = 'A' ";
					                $consulta = mysql_query($sql, $conexion);?>
					                <option value="0">Seleccione Obra Social<?php
					                while ($array = mysql_fetch_array($consulta)) {?>
						                    <option value="<?php echo $array['id_obra_social']?>"><?php echo "(".$array['id_obra_social'].") - ".$array['nombre']?></option>
					                    <?php
					                } ?>
					            </select>
					            <p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Tipo de Servicio</div></td>
							<td>
								<input TYPE="radio" NAME="tpo_serv" VALUE="D" checked="" onClick="mostrar(1)">
								<B>DOMICILIARIA</B>								
								<BR>
								<input TYPE="radio" NAME="tpo_serv" VALUE="I" onClick="mostrar(2)">
								<B>INTERNADO</B>					
							</td>
						</tr>
						<tr>
							<td><div class="campos" id="div_id_instituto" style="display: none;">Instituto</div></td>
							<td>								
								<select style="display: none;" id="id_instituto" name="id_instituto" class="textin2">
					                <?php
					                $sql="SELECT * FROM instituto WHERE estado = 'A'";
					                $consulta = mysql_query($sql, $conexion);?>
					                <option value="0">Seleccione Instituto<?php
					                while ($array = mysql_fetch_array($consulta)) {?>
					                    <option value="<?php echo $array['id_instituto']?>"><?php echo $array['nombre']?></option>
					                    <?php
					                } ?>
					            </select>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Fecha Práctica</div></td>
							<td><input type="date" name="fecha_practica" id="fecha_practica" class="textin" min="2016-01-01" max="2018-12-30" required value="<?php echo $fecha ?>"/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>							
						<tr>
							<td><div class="campos">Nombre Paciente</div></td>
							<td><input autocomplete="off" class="textin" name="nom_ape_p" type="text" id="nom_ape_p" value="" maxlength="60"/></td>
						</tr>
						<tr>
							<td><div class="campos">DNI Paciente</div></td>
							<td><input autocomplete="off" type="text" name="dni_p" class="textin" value="" maxlength="8" onkeypress="return compruebo_nro(event);"/></td>
						</tr>
						<tr>
							<td><div class="campos">Honorarios</div></td>
							<td>
								<input autocomplete="off" name="honorarios" type="text" id="honorarios" class="textin" placeholder="$" onchange="calcula_tot()" onkeypress="return compruebo_nro(event);"/>
								<p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>																				
						<tr>
							<td><div class="campos">Sesión</div></td>
							<td>
								<input autocomplete="off" name="sesion" type="text" id="sesion" class="textin" value=1  maxlength="1" onkeypress="return compruebo_nro(event);" onchange="calcula_tot()">
							</td>
						</tr>					
						<tr>
							<td><div class="campos">Total</div></td>
							<td>
							<input class="textin" name="total" type="text" id="total" placeholder="$" readonly="readonly">
							</td>
						</tr>				
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Cargar" onClick="validar(formAltaFactura)"/>
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
