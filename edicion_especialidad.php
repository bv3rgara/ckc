<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_especialidad = $_GET['indice_m'];
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
        	<h1>EDITAR ESPECIALIDAD</h1>
    		<?php    		
		    if (@$_POST['especialidad']){
				$sql = "UPDATE especialidad SET nombre='".$_POST['especialidad']."', descripcion='".$_POST['descripcion']."' WHERE id_especialidad='".$id_especialidad."'";
				$r = mysql_query($sql,$conexion);
				if (mysql_error() == ""){
					@mysql_free_result($r);
					echo "<div class=mensaje>La edición en los datos de la especialidad <i><u>".$_POST['especialidad']."</u></i> se ha ejecutado satisfactoriamente.</div>";
					?><meta http-equiv="refresh" content="3;URL=listado_especialidad.php"><?php						
				}else{
					echo "<div class=mensaje>No se pudo realizar la edición de la especialidad <i><u>".$_POST['especialidad']."</u></i></div>";
					?><meta http-equiv="refresh" content="3;URL=listado_especialidad.php"><?php
				}
			}
			$sql = "SELECT * FROM especialidad WHERE id_especialidad = '".$id_especialidad."'";
		   	$r = @mysql_query($sql,$conexion);
			$especialidad = @mysql_fetch_array($r);
			if (! $especialidad){
				echo "<div class=mensaje>No se encontro información de la especialidad <i><u>".$especialidad['nombre']."</u></i></div>";
				?><meta http-equiv="refresh" content="3;URL=listado_especialidad.php"><?php
			}			
			?>
			<form name="actualizar" action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Especialidad</div></td>
							<td><input type="text" name="especialidad" id="especialidad" class="textin" value="<?php  echo $especialidad['nombre']?>" maxlength="45"></td>
						</tr>
						<tr>
							<td><div class="campos">Descripción</div></td>
							<td><textarea rows="3" name="descripcion" class="textin" value=""><?php  echo $especialidad['descripcion']?></textarea></td>
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
