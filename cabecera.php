<!DOCTYPE HTML>
<html>
	<head>
	    <title>TFA</title>
	    <link rel="shortcut icon" href="imagenes/favicon.ico" />
	    <meta name="description" content="website description" />
	    <meta name="keywords" content="website keywords, website keywords" />
	    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
	    <link rel="stylesheet" type="text/css" href="css/estilos.css" title="style" />
	</head>
	<body>  
	    <div id="main">
	        <div id="header">
	            <div id="logo">
	                <div id="logo_text">
	                    <h1><a href="inicio.php">Colegio de <span class="logo_colour">Kinesiólogos</span></a></h1>
	                    <h2>de la Provincia de Corrientes</h2>	              
	                </div>
	                <div id="logo_img">
	                	<img src="imagenes/ckc.png" alt="CKC"/>
	                	<BR>
	                	<BR>
	                	<h3>
		                	<?php  
		                	if ($_SESSION['categoria'] == 'ad') {?>
		                		-admin: <?php echo $_SESSION['usuario'];
		                	}elseif ($_SESSION['categoria'] == 'au') {?>
		                		-auditor: <?php echo $_SESSION['usuario'];
		                	}elseif ($_SESSION['categoria'] == 'op') {?>
		                		-operador: <?php echo $_SESSION['usuario'];
		                	}
		                	?>
	                	</h3>          
	                </div>
	            </div>
	        </div>