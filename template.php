<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>
<head>
    <script type="text/javascript">
        function xxxx() {
            alertify.confirm("<B>ALERTA !!!</B><br><br><br><br>", 
            function (e) {
                if (e) {
                    alertify.success("A c e p t a r . . .");
                } else { 
                    alertify.error("C a n c e l a r . . .");
                }
            }); 
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
             var datos = {
                labels: [
                    <?php
                        $sql = "SELECT * FROM instituto LIMIT 10";
                        $res = mysql_query($sql,$conexion);
                        while ($array = mysql_fetch_array($res)){
                            ?>'<?php echo $array["nombre"];?>',<?php
                        }
                    ?>
                ],
                datasets: [
                    {
                        label: "id",
                        backgroundColor: "rgba(238,250,246, 0.5)",
                        data: [
                            <?php 
                                $sql = "SELECT * FROM instituto LIMIT 10";
                                $res = mysql_query($sql,$conexion);
                                while ($array = mysql_fetch_array($res)){
                                    echo $array["id_instituto"] ?>,<?php
                                }
                            ?>
                        ]
                    },{
                        label: "Tipo",
                        backgroundColor: "rgba(151, 187, 205, 0.5)",
                        data:[
                            <?php 
                                $sql = "SELECT * FROM instituto LIMIT 10";
                                $res = mysql_query($sql,$conexion);
                                while ($array = mysql_fetch_array($res)){
                                    echo $array["tipo"] * 10 ?>,<?php
                                }
                            ?>
                        ]
                    },                 
                ]
             };
            var canvas = document.getElementById('area-canvas').getContext('2d');
            window.bar = new Chart(canvas, {
                type: "bar",
                data: datos,
                options:{
                    elements:{
                        rectangle:{
                            borderWidth: 1,
                            borderColor: "rgb(107, 142, 35)",
                            borderSkipped: "bottom",
                        }
                    },
                    responsive: true,
                    title:{
                        display: true,
                        text: "Grafico Barra",
                    }
                }
            });
        });
    </script> 
</head>
<!-- alertify -->
<body onload="xxx()">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
<!-- alertify -->        
<!-- chosen -->
        <div id="content">
            <H1 class="text-success">- SELECCIONE INSTITUTO -</H2>
            <select name="miselect" class="chosen" data-placeholder="Seleccione empleados" style="width:350px;">
                <?php
                $sql="SELECT * FROM instituto";
                $consulta = mysql_query($sql, $conexion);
                while ($array_emp = mysql_fetch_array($consulta)) {?>
                    <option value="<?php echo $array_emp['id_instituto']?>"><?php echo $array_emp['nombre']?>, <?php echo $array_emp['direccion']?></option>
                    <?php
                } ?>
            </select>
            <BR><BR>
            <BR><BR>
            <select name="miselect[]" class="chosen" data-placeholder="Seleccione Instituto" multiple style="width:350px;">
                <?php
                $sql="SELECT * FROM instituto";
                $consulta = mysql_query($sql, $conexion);
                while ($array_emp = mysql_fetch_array($consulta)) {?>
                    <option value="<?php echo $array_emp['id_instituto']?>"><?php echo $array_emp['nombre']?>, <?php echo $array_emp['direccion']?></option>
                    <?php
                } ?>
            </select>
<!-- chosen -->
            <BR><BR>
            <BR><BR>
<!-- button -->
            <button class="button type1">
                Facturacion
            </button>
<!-- button -->  
<!-- modal -->  
            <a href="#popup">Ver mas información</a>
            <div id="popup">
                <div class="popup-contenedor">
                    <h2>Titulo de la Modal</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor deleniti in porro, officia velit quaerat modi doloribus similique aspernatur impedit quod, laudantium reiciendis! Similique nihil eius esse, illum assumenda soluta!. </p>
                    <a class="popup-cerrar" href="#">X</a>
                </div>
            </div>
<!-- modal -->              
<!-- chart -->          
            <h1>GRAFICO</h1>            
            <div id="canvas-container" style="width: 95%;">
                <canvas id="area-canvas" width="500" height="350"></canvas>
            </div>
<!-- chart -->          
<!-- datatable --> 
            <div style="padding-right: 30px">
                <table id="myTable" class="table table-hover" style="width: 95%;">
                    <thead>
                        <tr class="active">
                            <th a>ID</th>
                            <th a>Nombre</th>
                            <th a>Direccion</th>
                            <th a>Telefono</th>
                            <th a>Editar - Borrar</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php 
                        $servidor = "localhost"; 
                        $usuario  = "admin";
                        $password = "admin123";
                        $base_de_datos = "ckc";

                        $conexion = mysql_connect ($servidor,$usuario,$password) or die ('Imposible conectarse con la BD.');
                            if (! $conexion){echo "No se pudo conectar con el servidor MySQL";exit();}
                            if (! mysql_select_db($base_de_datos)){echo "No se pudo conectar con la base de datos";exit();
                        }
                        $sql="SELECT * FROM instituto";
                        $consulta = mysql_query($sql, $conexion) ;
                        while ($fila = mysql_fetch_array($consulta)) {
                            ?>
                            <tr>
                                <td><?php echo $fila['id_instituto']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['direccion']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>                           
                                <td>
                                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal<?php echo $fila['id_instituto']; ?>">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm"  onclick="delete_prueba('<?php echo $fila['id_instituto']; ?>')" >
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }?>
                    </tbody>
                </table>
            </div>                     
<!-- datatable -->                                  
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
