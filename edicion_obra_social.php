<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_obra_social = $_GET['indice_m'];
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
        	<h1>EDITAR OBRA SOCIAL</h1>
    		<?php 		
		    if (@$_POST['nombre_obra']){
				$sql = "UPDATE obra_social SET nombre='".$_POST['nombre_obra']."', direccion='".$_POST['direccion']."', telefono='".$_POST['telefono']."', clasificacion='".$_POST['clasificacion']."', cuit='".$_POST['cuit']."' WHERE id_obra_social='".$id_obra_social."'";
				$r = mysql_query($sql,$conexion);
				if (mysql_error() == ""){
					@mysql_free_result($r);
					echo "<div class=mensaje>La edición en los datos de la obra social <i><u>".$_POST['nombre_obra']."</u></i> se ha ejecutado satisfactoriamente.</div>";
					?><meta http-equiv="refresh" content="3;URL=listado_obra_social.php"><?php						
				}else{
					echo "<div class=mensaje>No se pudo realizar la edición de la obra social <i><u>".$_POST['nombre_obra']."</u></i></div>";
					?><meta http-equiv="refresh" content="3;URL=listado_obra_social.php"><?php
				}
			}
			$sql = "SELECT * FROM obra_social WHERE id_obra_social = '".$id_obra_social."'";
		   	$r = @mysql_query($sql,$conexion);
			$obra = @mysql_fetch_array($r);  			
			if (! $obra){
				echo "<div class=mensaje>No se encontro información de la obra social <i><u>".$obra['nombre']."</u></i></div>";
				?><meta http-equiv="refresh" content="3;URL=listado_obra_social.php"><?php
			} 			
			?>
			<form name="actualizar" action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Obra Social</div></td>
							<td><input class="textin" name="nombre_obra" id="nombre_obra" value="<?php echo $obra['nombre']?>"></td>
						</tr>
						<tr>
							<td><div class="campos">Dirección</div></td>
							<td><input type="text" name="direccion" class="textin" value="<?php echo $obra['direccion']?>" maxlength="60"/></td>
						</tr>
						<tr>
							<td><div class="campos">Teléfono</div></td>
							<td><input type="text" name="telefono" class="textin" value="<?php echo $obra['telefono']?>" maxlength="15" onkeypress="return compruebo_nro(event);"/></td>
						</tr>
						<tr>
							<td><div class="campos">CUIT</div></td>
							<td><input type="text" name="cuit" class="textin" value="<?php echo $obra['cuit']?>" maxlength="15" onkeypress="return compruebo_nro(event);"/></td>
						</tr>
						<tr>
							<td><div class="campos">Clasificación</div></td>
							<td>
								<SELECT NAME="clasificacion" class="textin2">
									<?php
									if ($obra['clasificacion']== 0){
										?>
										<OPTION VALUE="0" SELECTED>Seleccione Clasificación</option>
										<?php
									}else{
										?>
										<OPTION VALUE="0">Seleccione Clasificación</option>
										<?php
									}
									if ($obra['clasificacion']== 1){
										?>
										<OPTION VALUE="1" SELECTED>Obra Social</option>
										<?php
									}else{
										?>
										<OPTION VALUE="1">Obra Social</option>
										<?php
									}
									if ($obra['clasificacion']== 2){
										?>
										<OPTION VALUE="2" SELECTED>Mutual</option>
										<?php
									}else{
										?>
										<OPTION VALUE="2">Mutual</option>
										<?php
									}
									if ($obra['clasificacion']== 3){
										?>
										<OPTION VALUE="3" SELECTED>Prepaga</option>
										<?php
									}else{
										?>
										<OPTION VALUE="3">Prepaga</option>
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
