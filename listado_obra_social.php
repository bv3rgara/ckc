<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>

<FORM NAME="borrar_registro" METHOD="POST" ACTION="borrar_obra_social.php">
	<INPUT TYPE="hidden" NAME="id_obra_social"  ID="id_obra_social">
</FORM>

<SCRIPT LANGUAGE="JavaScript"> 
<!--
	function por_borrar(id){
		document.getElementById('id_obra_social').value=id;
		var answer = confirm("Realmente desea borrar la obra social?")
		if (answer){
			document.borrar_registro.submit() 
		} else {
			return;
		}
	}
	-->
</SCRIPT>

    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>LISTADO OBRA SOCIAL</h1>
			<form name="confirmar" method="post" />
	        	<div class="datagrid2">
		            <div style="padding-right: 30px">
		                <table id="myTable" class="table table-hover" style="width: 95%;">
		                    <thead>
		                        <tr class="active">
		                            <!-- <th a>ID</th> -->
		                            <th a>OBRA SOCIAL</th>
		                            <th a>DIRECCION</th>
		                            <th a>TELEFONO</th>
		                            <th a>CLASIFICACION</th>
		                            <th a>CUIT</th>
		                            <th a>ESTADO</th>
		                            <?php
			                        if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>
		                            	<th a>ACCION</th>
		                            	<?php
			                        }?>
		                        </tr>
		                    </thead>
		                    <tbody>     
		                        <?php
								$sql = "SELECT * FROM obra_social ORDER BY id_obra_social ASC";  
								$query = mysql_query($sql,$conexion);
		                        while ($fila = mysql_fetch_array($query)) {
		                            if ($fila['clasificacion'] == '1') {
		                        		$clasificacion = "Obra Social";
		                        	}elseif ($fila['clasificacion'] == '2') {
		                        		$clasificacion = "Mutual";		                        	
		                        	}elseif ($fila['clasificacion'] == '3') {
		                        		$clasificacion = "Prepaga";
		                        	}elseif ($fila['clasificacion'] == '0') {
		                        		$clasificacion = "";
		                        	}
		                            ?> 
		                            <tr>
		                                <!-- <td><?php echo $fila['id_obra_social']; ?></td> -->
		                                <td><?php echo $fila['nombre']; ?></td>
		                                <td><?php echo $fila['direccion']; ?></td>                          
		                                <td><?php echo $fila['telefono']; ?></td>                          
		                                <td><?php echo $clasificacion; ?></td>                          
		                                <td><?php echo $fila['cuit']; ?></td>                          
		                                <td><?php echo $fila['estado']; ?></td>   
		                                <?php
			                            if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>                       
			                                <td>
												<?php 
			                                	if ($fila['estado'] == 'A') {?>
													<input class="imaborrar" type="button" name="dele" title="Borrar" onClick="por_borrar(<?php echo  $fila["id_obra_social"];?>);">		
													<input type="button" name="modi" class="imaeditar" title="Editar" onClick="this.form.action='edicion_obra_social.php?indice_m=<?php echo $fila["id_obra_social"];?>';this.form.submit();"/>
			                                		<?php	
			                                	}elseif ($fila['estado'] == 'B') {?>
			                                		<input type="button" name="reset" class="imareset" title="Hablitar"	onClick="this.form.action='habilitar_obra_social.php?indice_u=<?php echo $fila["id_obra_social"];?>' ;this.form.submit();"/>
													<?php
			                                	}
			                                	?>		                                    
			                                </td>
			                                <?php
			                            }?>
		                            </tr>
		                            <?php
		                        }?>
		                    </tbody>
		                </table>
		            </div>  	        	
				</div>
			</form>    
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>