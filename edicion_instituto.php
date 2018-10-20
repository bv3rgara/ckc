<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_instituto = $_GET['indice_m'];
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
			alert ("Por favor ingrese el instituto!");
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
        	<h1>EDITAR INSTITUTO</h1>
    		<?php   		
		    if (@$_POST['instituto']){
				$sql = "UPDATE instituto SET nombre='".$_POST['instituto']."', direccion='".$_POST['direccion']."', telefono='".$_POST['telefono']."', tipo='".$_POST['tipo']."' WHERE id_instituto='".$id_instituto."'";
				$r = mysql_query($sql,$conexion);
				if (mysql_error() == ""){
					@mysql_free_result($r);
					echo "<div class=mensaje>La edición en los datos del instituto <i><u>".$_POST['instituto']."</u></i> se ha ejecutado satisfactoriamente.</div>";
					?><meta http-equiv="refresh" content="3;URL=listado_instituto.php"><?php						
				}else{
					echo "<div class=mensaje>No se pudo realizar la edición del instituto <i><u>".$_POST['instituto']."</u></i></div>";
					?><meta http-equiv="refresh" content="3;URL=listado_instituto.php"><?php
				}
			}
			$sql = "SELECT * FROM instituto WHERE id_instituto = '".$id_instituto."'";
		   	$r = @mysql_query($sql,$conexion);
			$instituto = @mysql_fetch_array($r);
			if (! $instituto){
				echo "<div class=mensaje>No se encontro información del instituto <i><u>".$instituto['nombre']."</u></i></div>";
				?><meta http-equiv="refresh" content="3;URL=listado_instituto.php"><?php
			} 			
			?>
			<form name="actualizar" action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Instituto</div></td>
							<td><input type="text" name="instituto" id="instituto" class="textin" value="<?php  echo $instituto['nombre']?>" maxlength="45"></td>
						</tr>
						<tr>
							<td><div class="campos">Dirección</div></td>
							<td><input name="direccion" class="textin" value="<?php  echo $instituto['direccion']?>" maxlength="60"></textarea>
						</td>
						<tr>
							<td><div class="campos">Teléfono</div></td>
							<td><input name="telefono" class="textin" value="<?php  echo $instituto['telefono']?>" maxlength="30" onkeypress="return compruebo_nro(event);"></textarea>
						</tr>
						<tr>
							<td><div class="campos">Tipo</div></td>
							<td>
								<SELECT NAME="tipo" class="textin2">
									<?php
									if ($instituto['tipo']== 0){
										?>
										<OPTION VALUE="0" SELECTED>Seleccione Instituto</option>
										<?php
									}else{
										?>
										<OPTION VALUE="0">Seleccione Instituto</option>
										<?php
									}
									if ($instituto['tipo']== 1){
										?>
										<OPTION VALUE="1" SELECTED>Privado</option>
										<?php
									}else{
										?>
										<OPTION VALUE="1">Privado</option>
										<?php
									}
									if ($instituto['tipo']== 2){
										?>
										<OPTION VALUE="2" SELECTED>Público</option>
										<?php
									}else{
										?>
										<OPTION VALUE="2">Público</option>
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
