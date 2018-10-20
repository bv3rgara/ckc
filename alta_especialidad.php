<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_especialidad'] = true;
?>
<SCRIPT LANGUAGE="JavaScript"> 
	<!--
	function validar(form){
		Ctrl = form.especialidad;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese la especialidad!");
			Ctrl.focus();
			return;    	  
		}
		
		form.submit();
	}
	-->
</SCRIPT>

<body onload="document.getElementById('especialidad').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
	        <div style="color: red">
				* campo obligatorio
			</div>
        	<h1>ALTA ESPECIALIDAD</h1>
        	<form name="formAltaEspecialidad" action="guardar_especialidad.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Especialidad</div></td>
							<td><input type="text" name="especialidad" id="especialidad" class="textin"><p style="color: red; display: inline; font-size: 18px;"> *</p></td>
						</tr>
						<tr>
							<td><div class="campos">Descripción</div></td>
							<td><textarea rows="3" name="descripcion" class="textin" value=""></textarea></td>
						</tr>
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formAltaEspecialidad)"/>
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
