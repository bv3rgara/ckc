<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_usuario'] = true;
?>
<SCRIPT LANGUAGE="JavaScript"> 
	<!--

	function validar(form)  {
		Ctrl = form.contrasena;
		Ctrl2 = form.contrasena2;
		c1 = form.contrasena.value;
		c2 = form.contrasena2.value;
		if ((Ctrl.value != Ctrl2.value) || (Ctrl.value == "") || (Ctrl2.value == "")){
			alert ("Las contraseñas no coinciden o estan vacias... ingrese nuevamente!");
			Ctrl.focus();
			return;
		}else{
			if (c1.length < 5 && c2.length < 5){
				alert ("Las contraseñas deben tener como mínimo 5 caracteres!");
				Ctrl.focus();
				return;					
			}else{
				form.submit();
			}
		}		
	}

	-->
</SCRIPT>

<body onload="document.getElementById('contrasena').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<div style="color: red">
				* campo obligatorio
			</div>
        	<h1>CAMBIAR CONTRASEÑA</h1>
        	<form name="formPass" action="guardar_pass.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Anterior</div></td>
							<td><input type="password" id="contrasena_ant" name="contrasena_ant" class="textin" value="12345" readonly="readonly" /><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Nueva</div></td>
							<td><input type="password" name="contrasena" id="contrasena" minlength="5" maxlength="8" class="textin" value=""/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Confirmar</div></td>
							<td><input type="password" name="contrasena2" id="contrasena2" minlength="5" maxlength="8" class="textin" value="" maxlength="8" onblur="compruebaValidoEntero(this.form.dni,0)"/><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>					
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formPass)"/>
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
