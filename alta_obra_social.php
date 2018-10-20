<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_obra_social'] = true;
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
		Ctrl = form.nombre_obra;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el nombre de la obra social!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.clasificacion;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese la clasificación!");
			Ctrl.focus();
			return;    	  
		}

		form.submit();
	}

	-->
</SCRIPT>

<body onload="document.getElementById('nombre_obra').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<div style="color: red">
				* campo obligatorio
			</div>
        	<h1>ALTA OBRA SOCIAL</h1>
        	<form name="formAltaObra" action="guardar_obra_social.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Obra Social</div></td>
							<td><input class="textin" name="nombre_obra" id="nombre_obra" value=""><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Dirección</div></td>
							<td><input type="text" name="direccion" class="textin" value="" maxlength="60"/></td>
						</tr>
						<tr>
							<td><div class="campos">Teléfono</div></td>
							<td><input type="text" name="telefono" class="textin" value="" maxlength="15" onkeypress="return compruebo_nro(event);"/></td>
						</tr>
						<tr>
							<td><div class="campos">CUIT</div></td>
							<td><input type="text" name="cuit" class="textin" value="" maxlength="15" onkeypress="return compruebo_nro(event);"/></td>
						</tr>
						<tr>
							<td><div class="campos">Clasificación</div></td>
							<td>
								<SELECT NAME="clasificacion" class="textin2">
									<OPTION VALUE="0" SELECTED>Seleccione Clasificación
									<OPTION VALUE="1">Obra Social
									<OPTION VALUE="2">Mutual
									<OPTION VALUE="3">Prepaga						
								</SELECT>
								<p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>						
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formAltaObra)"/>
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
