<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>

<FORM NAME="borrar_registro" METHOD="POST" ACTION="borrar_instituto.php">
	<INPUT TYPE="hidden" NAME="id_instituto"  ID="id_instituto">
</FORM>

<SCRIPT LANGUAGE="JavaScript"> 
<!--
	function por_borrar(id){
		document.getElementById('id_instituto').value=id;
		var answer = confirm("Realmente desea borrar la instituto?")
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
        	<h1>LISTADO INSTITUTO</h1>
			<form name="confirmar" method="post" />
	        	<div class="datagrid2">
		            <div style="padding-right: 30px">
		                <table id="myTable" class="table table-hover" style="width: 95%;">
		                    <thead>
		                        <tr class="active">
		                            <!-- <th a>ID</th> -->
		                            <th a>INSTITUTO</th>
		                            <th a>DIRECCION</th>
		                            <th a>TELEFONO</th>
		                            <th a>TIPO</th>
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
								$sql = "SELECT * FROM instituto ORDER BY id_instituto ASC";  
								$query = mysql_query($sql,$conexion);
		                        while ($fila = mysql_fetch_array($query)) {
		                            if ($fila['tipo'] == '1') {
		                        		$tipo = "Privado";
		                        	}elseif ($fila['tipo'] == '2') {
		                        		$tipo = "Público";
		                        	}elseif ($fila['tipo'] == '0') {
		                        		$tipo = "";
		                        	}
		                            ?> 
		                            <tr>
		                                <!-- <td><?php echo $fila['id_instituto']; ?></td> -->
		                                <td><?php echo $fila['nombre']; ?></td>
		                                <td><?php echo $fila['direccion']; ?></td>                          
		                                <td><?php echo $fila['telefono']; ?></td>                          
		                                <td><?php echo $tipo; ?></td>                        
		                                <td><?php echo $fila['estado']; ?></td>
		                                <?php
			                            if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>                   
			                                <td>
												<?php 
			                                	if ($fila['estado'] == 'A') {?>
													<input type="button" name="modi" class="imaeditar" title="Editar" onClick="this.form.action='edicion_instituto.php?indice_m=<?php echo $fila["id_instituto"];?>';this.form.submit();"/>
													<input class="imaborrar" type="button" name="dele" title="Borrar" onClick="por_borrar(<?php echo  $fila["id_instituto"];?>);">
			                                		<?php	
			                                	}elseif ($fila['estado'] == 'B') {?>
			                                    	<input type="button" name="reset" class="imareset" title="Hablitar"	onClick="this.form.action='habilitar_instituto.php?indice_u=<?php echo $fila["id_instituto"];?>' ;this.form.submit();"/>
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