<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_factura'] = true;
?>
<SCRIPT LANGUAGE="JavaScript"> 
	<!--
	function validar(form){
		Ctrl = form.periodo;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese el periodo!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.id_obra_social;
		if (Ctrl.value == 0){
			alert ("Por favor seleccione la obra social!");
			Ctrl.focus();
			return;    	  
		}

		periodo = form.periodo.value;
		id_obra_social = form.id_obra_social.value;

		//if (confirm ("Está a punto de cerrar la facturacion del periodo "+periodo+" de la obra social "+id_obra_social+" \nDesea continuar?")){
		if (confirm ("Está a punto de cerrar la facturacion del periodo "+periodo+" \nDesea continuar?")){ 
			form.submit();	  
 		}
	}
	-->
</SCRIPT>

<body onload="document.getElementById('periodo').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>CERRAR FACTURA</h1>
        	<form name="formCierreFactura" action="factura_guardar_cierre.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Fecha de Cierre</div></td>
							<td><input readonly="readonly" type="date" name="fecha_cierre" id="fecha_cierre" class="textin" value="<?php echo date("Y-m-d");?>" /></td>
						</tr>
						<tr>
							<td><div class="campos">Periodo</div></td>
							<td>
								<select id="periodo" name="periodo" class="textin2">
					                <?php
					                $sql="SELECT distinct(periodo) FROM detalle_factura WHERE estado = 'P'";
					                $consulta = mysql_query($sql, $conexion);?>
					                <option value="0">Seleccione Periodo<?php
					                while ($array = mysql_fetch_array($consulta)) {?>
					                    <option value="<?php echo $array['periodo']?>">
					                    	<?php
					                    	$div = explode("-", $array['periodo']);
					                    	echo $div[0]."-".$div[1];
					                    	?>						                    		
					                    </option>
					                    <?php
					                } ?>
					            </select>
							</td>
						</tr>					
						<tr>
							<td><div class="campos">Obra Social</div></td>
							<td>								
								<select id="id_obra_social" name="id_obra_social" class="textin2">
					                <?php
					                $sql="SELECT * FROM obra_social WHERE estado = 'A'";
					                $consulta = mysql_query($sql, $conexion);?>
					                <option value="0">Seleccione Obra Social<?php
					                while ($array = mysql_fetch_array($consulta)) {?>
					                    <option value="<?php echo $array['id_obra_social']?>"><?php echo "(".$array['id_obra_social'].") - ".$array['nombre']?></option>
					                    <?php
					                } ?>
					            </select>
							</td>
						</tr>				
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Cerrar" onClick="validar(formCierreFactura)"/>
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
