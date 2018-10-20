<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_instituto'] = true;
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

	function validar(form){
		Ctrl = form.instituto;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese la instituto!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.tipo;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese el tipo!");
			Ctrl.focus();
			return;    	  
		}
		
		form.submit();
	}
	-->
</SCRIPT>

<body onload="document.getElementById('instituto').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<div style="color: red">
				* campo obligatorio
			</div>
        	<h1>ALTA INSTITUTO</h1>
        	<form name="formAltaInstituto" action="guardar_instituto.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Instituto</div></td>
							<td><input type="text" name="instituto" id="instituto" class="textin" value=""><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Dirección</div></td>
							<td><input name="direccion" id="direccion" class="textin" value="" maxlength="60"></td>
						</tr>
						<tr>
							<td><div class="campos">Teléfono</div></td>
							<td><input name="telefono" id="telefono" class="textin" value="" maxlength="15" onkeypress="return compruebo_nro(event);"></td>
						</tr>
						<tr>
							<td><div class="campos">Tipo</div></td>
							<td>
								<SELECT NAME="tipo" class="textin2">
									<OPTION VALUE="0" SELECTED>Seleccione Tipo
									<OPTION VALUE="1">Privado
									<OPTION VALUE="2">Público
								</SELECT>
								<p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formAltaInstituto)"/>
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
