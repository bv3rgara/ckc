<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_usuario'] = true;
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
		Ctrl = form.apellido;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el apellido!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.nombre;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el nombre!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.dni;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el DNI!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.usuario;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el usuario!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.categoria;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese la categoria!");
			Ctrl.focus();
			return;    	  
		}

		form.submit();
	}
	-->
</SCRIPT>

<body onload="document.getElementById('apellido').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<div style="color: red">
				* campo obligatorio
			</div>
        	<h1>ALTA USUARIO</h1>
        	<form name="formAltaUsuario" action="guardar_usuario.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Apellido</div></td>
							<td><input type="text" id="apellido" name="apellido" class="textin" value=""/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Nombre</div></td>
							<td><input type="text" name="nombre" class="textin" value=""/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">DNI</div></td>
							<td><input type="text" name="dni" id="dni" class="textin" value="" maxlength="8" onkeypress="return compruebo_nro(event);"/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Usuario</div></td>
							<td><input type="text" name="usuario" id="usuario" class="textin" value="" maxlength="30"/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>				
						<tr>
							<td><div class="campos">Dirección</div></td>
							<td><input type="text" name="direccion" class="textin" value="" maxlength="60"/></td>
						</tr>
						<tr>
							<td><div class="campos">Categoría</div></td>
							<td>
								<SELECT NAME="categoria" id="categoria" class="textin2">
									<OPTION VALUE="0" SELECTED>Seleccione Categoría
									<OPTION VALUE="ad">Administrador
									<OPTION VALUE="op">Operador
									<OPTION VALUE="au">Auditor							
								</SELECT>
								<p style="color: red; display: inline; font-size: 18px;"> *</p>
							</td>
						</tr>						
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formAltaUsuario)"/>
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
