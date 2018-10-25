<?php
@session_start();
include("cabecera.php");
include("conexion.php"); 
?>
<head>
	<script src="js/chart/Chart.bundle.js"></script>
	<script src="js/chart/utils.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-3.1.1.min.js"></script>
	<script>
		var customTooltips = function (tooltip) {
			$(this._chart.canvas).css("cursor", "pointer");
			$(".chartjs-tooltip").css({
				opacity: 0,
			});
			if (!tooltip || !tooltip.opacity) {
				return;
			}
			if (tooltip.dataPoints.length > 0) {
				tooltip.dataPoints.forEach(function (dataPoint) {
					var content = [dataPoint.xLabel, dataPoint.yLabel].join(": ");
					var $tooltip = $("#tooltip-" + dataPoint.datasetIndex);

					$tooltip.html(content);
					$tooltip.css({
						opacity: 1,
						top: dataPoint.y + "px",
						left: dataPoint.x + "px",
					});
				});
			}
		};
		var color = Chart.helpers.color;
		var lineChartData = {
			labels: [
		 		<?php
		 		$sql = "SELECT k.ayn, d.id_kinesiologo, COUNT(d.usuario) as total FROM detalle_factura as d, kinesiologo as k WHERE k.id_kinesiologo = d.id_kinesiologo GROUP BY d.id_kinesiologo ORDER BY d.id_kinesiologo";
                $res = mysql_query($sql,$conexion);
                while ($array = mysql_fetch_array($res)){
                    ?>'<?php echo $array["ayn"];?>',<?php
                }
		 		?>				
			],
			datasets: [
				{
					label: "Honorarios en $",
					backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
					borderColor: window.chartColors.red,
					pointBackgroundColor: window.chartColors.red,
					data: [
				 		<?php
				 		$sql = "SELECT usuario, SUM(honorario) as honorario FROM detalle_factura GROUP BY id_kinesiologo ORDER BY id_kinesiologo";
                            $res = mysql_query($sql,$conexion);
                        while ($array = mysql_fetch_array($res)){
                            echo $array["honorario"] ?>,<?php
                        }
						?>
					]
				},{
					label: "Total en $",
					backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
					borderColor: window.chartColors.blue,
					pointBackgroundColor: window.chartColors.blue,
					data: [
				 		<?php
				 		$sql = "SELECT usuario, SUM(total) as total FROM detalle_factura GROUP BY id_kinesiologo ORDER BY id_kinesiologo";
                        $res = mysql_query($sql,$conexion);
                        while ($array = mysql_fetch_array($res)){
                            echo $array["total"] ?>,<?php
                        }
					?>
					]
				}
			]
		};
		window.onload = function() {
			var chartEl = document.getElementById("area-canvas");
			var chart = new Chart(chartEl, {
				type: "line",
				data: lineChartData,
				options: {
					responsive: true,
					title:{
						display: true,
						// text: "Grafico Lineal"
					},
					tooltips: {
						enabled: false,
						mode: 'index',
						intersect: false,
						custom: customTooltips
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
		};
	</script>
	<style>
		canvas{
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		.chartjs-tooltip {
			opacity: 1;
			position: absolute;
			background: rgba(0, 0, 0, .7);
			color: white;
			border-radius: 3px;
			-webkit-transition: all .1s ease;
			transition: all .1s ease;
			pointer-events: none;
			-webkit-transform: translate(-50%, 0);
			transform: translate(-50%, 0);
			padding: 4px;
			margin: 200px 0px 0px 430px;
		}
		.chartjs-tooltip-key {
			display: inline-block;
			width: 10px;
			height: 10px;
		}
	</style>
</head>
<body>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
            <h1>ACUMULADO POR KINESIOLOGO</h1>            
			<div id="canvas-container" style="width: 100%;">
				<canvas id="area-canvas"></canvas>
			</div>
			<div class="chartjs-tooltip" id="tooltip-0"></div>
			<div class="chartjs-tooltip" id="tooltip-1"></div>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>