<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>

<FORM NAME="borrar_registro" METHOD="POST" ACTION="borrar_especialidad.php">
	<INPUT TYPE="hidden" NAME="id_especialidad"  ID="id_especialidad">
</FORM>

<SCRIPT LANGUAGE="JavaScript"> 
<!--
	function por_borrar(id){
		document.getElementById('id_especialidad').value=id;
		var answer = confirm("Realmente desea borrar la especialidad?")
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
        	<h1>LISTADO ESPECIALIDAD</h1>
			<form name="confirmar" method="post" />
	        	<div class="datagrid2">
		            <div style="padding-right: 30px">
		                <table id="myTable" class="table table-hover" style="width: 95%;">
		                    <thead>
		                        <tr class="active">
		                            <!-- <th a>ID</th> -->
		                            <th a>ESPECIALIDAD</th>
		                            <th a style="width: 350px;">DESCRIPCION</th>
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
								$sql = "SELECT * FROM especialidad ORDER BY id_especialidad ASC";  
								$query = mysql_query($sql,$conexion);
		                        while ($fila = mysql_fetch_array($query)) {
		                            ?> 
		                            <tr>
		                                <!-- <td><?php echo $fila['id_especialidad']; ?></td> -->
		                                <td><?php echo $fila['nombre']; ?></td>
		                                <td><?php echo $fila['descripcion']; ?></td>                         
		                                <td><?php echo $fila['estado']; ?></td>
		                                <?php
			                            if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>                     
			                                <td>
			                                	<?php 
			                                	if ($fila['estado'] == 'A') {?>
													<input type="button" name="modi" class="imaeditar" title="Editar" onClick="this.form.action='edicion_especialidad.php?indice_m=<?php echo $fila["id_especialidad"];?>';this.form.submit();"/>
	 												<input class="imaborrar" type="button" name="dele" title="Borrar" onClick="por_borrar(<?php echo  $fila["id_especialidad"];?>);">
			                                		<?php	
			                                	}elseif ($fila['estado'] == 'B') {?>
			                                		<input type="button" name="reset" class="imareset" title="Hablitar"	onClick="this.form.action='habilitar_especialidad.php?indice_u=<?php echo $fila["id_especialidad"];?>' ;this.form.submit();"/>
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