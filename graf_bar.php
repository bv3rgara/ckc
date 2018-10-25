<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
?>
<head>
    <script type="text/javascript" src="js/jquery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/chart/Chart.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
             var datos = {
                labels: [
                    <?php
                    $sql = "SELECT os.nombre, d.id_os, COUNT(d.usuario) as total FROM detalle_factura as d, obra_social as os WHERE os.id_obra_social = d.id_os GROUP BY d.id_os ORDER BY d.id_os";
                    $res = mysql_query($sql,$conexion);
                    while ($array = mysql_fetch_array($res)){
                        ?>'<?php echo $array["nombre"];?>',<?php
                    }
                    ?>
                ],
                datasets: [
                    {
                        label: "Honoratios en $",
                        backgroundColor: "rgba(238,250,246, 0.5)",
                        data: [
                            <?php 
                            $sql = "SELECT id_os, SUM(honorario) as honorario FROM detalle_factura GROUP BY id_os ORDER BY id_os";
                            $res = mysql_query($sql,$conexion);
                            while ($array = mysql_fetch_array($res)){
                                echo $array["honorario"] ?>,<?php
                            }
                            ?>
                        ]
                    },
                    {
                        label: "Total en $",
                        backgroundColor: "rgba(49,164,101, 0.5)",
                        data: [
                            <?php 
                            $sql = "SELECT id_os, SUM(total) as total FROM detalle_factura GROUP BY id_os ORDER BY id_os";
                            $res = mysql_query($sql,$conexion);
                            while ($array = mysql_fetch_array($res)){
                                echo $array["total"] ?>,<?php
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
                        // text: "Grafico Barra",
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                min: 0,
                                userCallback: function(value, index, values) {
                                    value = value.toString();
                                    value = value.split(/(?=(?:...)*$)/);
                                    value = value.join('.');
                                    return '$' + value;
                                }
                            }
                        }]
                    }
                }
            });
        });
    </script> 
</head>
<body>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
            <h1>ACUMULADO POR OBRA SOCIAL</h1>
            <div id="canvas-container" style="width: 100%;">
                <canvas id="area-canvas" width="500" height="350"></canvas>
            </div>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>