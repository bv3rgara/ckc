<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>

<FORM NAME="borrar_registro" METHOD="POST" ACTION="borrar_usuario.php">
	<INPUT TYPE="hidden" NAME="id_usuario"  ID="id_usuario">
</FORM>

<SCRIPT LANGUAGE="JavaScript"> 
<!--
	function por_borrar(id){
		document.getElementById('id_usuario').value=id;
		var answer = confirm("Realmente desea borrar el usuario?")
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
        	<h1>LISTADO USUARIO</h1>
			<form name="confirmar" method="post" />
	        	<div class="datagrid2">
		            <div style="padding-right: 30px">
		                <table id="myTable" class="table table-hover" style="width: 95%;">
		                    <thead>
		                        <tr class="active">
		                            <!-- <th a>ID</th> -->
		                            <th a>DNI</th>
		                            <th a>USUARIO</th>
		                            <th a>APELLIDO</th>
		                            <th a>NOMBRE</th>
		                            <th a>DIRECCION	</th>
		                            <th a>CATEGORIA</th>
		                            <th a>VENCIMIENTO</th>
		                            <?php
			                        if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>
		                            	<th a>ACCION</th>
		                            	<?php
			                        }?>
		                        </tr>
		                    </thead>
		                    <tbody>     
		                        <?php
								$sql = "SELECT * FROM usuarios ORDER BY id_usuario ASC";  
								$query = mysql_query($sql,$conexion);
		                        while ($fila = mysql_fetch_array($query)) {
		                        	if ($fila['categoria'] == 'ad') {
		                        		$cat = "Administrador";
		                        	}elseif ($fila['categoria'] == 'au') {
		                        		$cat = "Auditor";
		                        	}elseif ($fila['categoria'] == 'op') {
		                        		$cat = "Operador";
		                        	}
		                            ?> 
		                            <tr>
		                                <!-- <td><?php echo $fila['id_usuario']; ?></td> -->
		                                <td><?php echo $fila['doc']; ?></td>
		                                <td><?php echo $fila['usuario']; ?></td>
		                                <td><?php echo $fila['apellido']; ?></td>
		                                <td><?php echo $fila['nombre']; ?></td>                           
		                                <td><?php echo $fila['direccion']; ?></td>                           
		                                <td><?php echo $cat; ?></td>                           
		                                <td><?php echo $fila['vence']; ?></td>    
		                                <?php
			                            if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>                       
			                                <td>
				                                <?php
				                                if ($fila['vence'] == '0000-00-00') {?>
				                                	<input type="button" name="modi" class="imaeditar" title="Editar" onClick="this.form.action='edicion_usuario.php?indice_m=<?php echo $fila["id_usuario"];?>';this.form.submit();"/>
													<input class="imaborrar" type="button" name="dele" title="Borrar" onClick="por_borrar(<?php echo  $fila["id_usuario"];?>);">
				                                	<?php
												}elseif ($fila['vence'] <> '0000-00-00') {?>
													<input type="button" name="reset" class="imareset" title="Hablitar"	onClick="this.form.action='habilitar_usuario.php?indice_u=<?php echo $fila["id_usuario"];?>' ;this.form.submit();"/>
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