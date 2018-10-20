<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id_usuario = $_GET['indice_m'];
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
        	<h1>EDITAR USUARIO</h1>	
    		<?php   		
		    if (@$_POST['usuario']){
				$sql = "UPDATE usuarios SET doc='".$_POST['dni']."', apellido='".$_POST['apellido']."', nombre='".$_POST['nombre']."', direccion='".$_POST['direccion']."', usuario='".$_POST['usuario']."', categoria='".$_POST['categoria']."' WHERE id_usuario='".$id_usuario."'";
				$r = mysql_query($sql,$conexion);
				if (mysql_error() == ""){
					@mysql_free_result($r);
					echo "<div class=mensaje>La edición en los datos del usuario <i><u>".$_POST['usuario']."</u></i> se ha ejecutado satisfactoriamente.</div>";
					?><meta http-equiv="refresh" content="3;URL=listado_usuario.php"><?php						
				}else{
					echo "<div class=mensaje>No se pudo realizar la edición del usuario <i><u>".$_POST['usuario']."</u></i></div>";
					?><meta http-equiv="refresh" content="3;URL=listado_usuario.php"><?php
				}
			}
			$sql = "SELECT * FROM usuarios WHERE id_usuario = '".$id_usuario."'";
		   	$r = @mysql_query($sql,$conexion);
			$usuario = @mysql_fetch_array($r);
			if (! $usuario){
				echo "<div class=mensaje>No se encontro información del usuario <i><u>".$usuario['nombre']."</u></i></div>";
				?><meta http-equiv="refresh" content="3;URL=listado_usuario.php"><?php
			} 			
			?>
			<form name="actualizar" action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Apellido</div></td>
							<td><input type="text" id="apellido" name="apellido" class="textin" value="<?php  echo $usuario['apellido']?>"/></td>
						</tr>
						<tr>
							<td><div class="campos">Nombre</div></td>
							<td><input type="text" name="nombre" class="textin" value="<?php  echo $usuario['nombre']?>"/></td>
						</tr>
						<tr>
							<td><div class="campos">DNI</div></td>
							<td><input type="text" name="dni" id="dni" class="textin" value="<?php  echo $usuario['doc']?>" onkeypress="return compruebo_nro(event);" maxlength="8"/></td>
						</tr>
						<tr>
							<td><div class="campos">Usuario</div></td>
							<td><input type="text" name="usuario" id="usuario" class="textin" value="<?php  echo $usuario['usuario']?>"/></td>
						</tr>				
						<tr>
							<td><div class="campos">Dirección</div></td>
							<td><input type="text" name="direccion" class="textin" value="<?php  echo $usuario['direccion']?>" maxlength="60"/></td>
						</tr>
						<tr>
							<td><div class="campos">Categoría</div></td>
							<td>
								<SELECT NAME="categoria" class="textin2">
									<?php
									if ($usuario['categoria']== ""){
										?>
										<OPTION VALUE="0" SELECTED>Seleccione Categoría</option>
										<?php
									}else{
										?>
										<OPTION VALUE="0">Seleccione Categoría</option>
										<?php
									}
									if ($usuario['categoria']== "ad"){
										?>
										<OPTION VALUE="ad" SELECTED>Administrador</option>
										<?php
									}else{
										?>
										<OPTION VALUE="ad">Administrador</option>
										<?php
									}
									if ($usuario['categoria']== "op"){
										?>
										<OPTION VALUE="op" SELECTED>Operador</option>
										<?php
									}else{
										?>
										<OPTION VALUE="op">Operador</option>
										<?php
									}									
									if ($usuario['categoria']== "au"){
										?>
										<OPTION VALUE="au" SELECTED>Auditor</option>
										<?php
									}else{
										?>
										<OPTION VALUE="au">Auditor</option>
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
