<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>

<FORM NAME="borrar_registro" METHOD="POST" ACTION="borrar_kinesiologo.php">
	<INPUT TYPE="hidden" NAME="id_kinesiologo"  ID="id_kinesiologo">
</FORM>

<SCRIPT LANGUAGE="JavaScript"> 
<!--
	function por_borrar(id){
		document.getElementById('id_kinesiologo').value=id;
		var answer = confirm("Realmente desea borrar el kinesiólogo?")
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
        	<h1>LISTADO KINESIOLOGO</h1>
			<form name="confirmar" method="post" />
	        	<div class="datagrid2">
		            <div style="padding-right: 30px">
		                <table id="myTable" class="table table-hover" style="width: 95%;">
		                    <thead>
		                        <tr class="active">
		                            <th a>NOMBRE</th>
		                            <th a>DIRECCION</th>
		                            <th a>TELEFONO</th>
		                            <th a>MATRICULA</th>		                            
		                            <th a>ESPECIALIDAD</th>
		                            <!-- <th a>OTROS DATOS</th> -->
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
								$sql = "SELECT * FROM kinesiologo ORDER BY id_kinesiologo ASC";  
								$query = mysql_query($sql,$conexion);
		                        while ($fila = mysql_fetch_array($query)) {
		                        	$sqlx = "SELECT nombre FROM especialidad WHERE id_especialidad = '".$fila['id_especialidad']."' AND estado = 'A'";  
									$queryx = mysql_query($sqlx,$conexion);
									$filax = mysql_fetch_array($queryx);
									$espe = $filax['nombre'];
		                            ?>		                            	                                   
		                            <tr title="Observación: <?php echo $fila['observacion']; ?>">
		                                <td><?php echo $fila['ayn']; ?></td>
		                                <td><?php echo $fila['dom_cons']; ?></td>                          
		                                <td><?php echo $fila['tel_cons']; ?></td>                          
		                                <td><?php echo $fila['matricula']; ?></td>                          
		                                <td><?php echo $fila['id_especialidad']." - ".$espe; ?></td>                         
		                                <!-- <td><a href="ver_datos_kinesiologo.php?id=<?php echo $fila['id_kinesiologo'] ?>">Ver mas</a></td> -->
		                                <td><?php echo $fila['estado']; ?></td>
		                                <?php
			                            if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>                    
			                                <td>
												<?php 
			                                	if ($fila['estado'] == 'A') {?>
													<input class="imaborrar" type="button" name="dele" title="Borrar" onClick="por_borrar(<?php echo  $fila["id_kinesiologo"];?>);">		
													<input type="button" name="modi" class="imaeditar" title="Editar" onClick="this.form.action='edicion_kinesiologo.php?indice_m=<?php echo $fila["id_kinesiologo"];?>';this.form.submit();"/>
			                                		<?php	
			                                	}elseif ($fila['estado'] == 'B') {?>
			                                		<input type="button" name="reset" class="imareset" title="Hablitar"	onClick="this.form.action='habilitar_kinesiologo.php?indice_u=<?php echo $fila["id_kinesiologo"];?>' ;this.form.submit();"/>
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