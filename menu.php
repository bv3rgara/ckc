<!-- OliveDrab:   #6B8E23 -->
<!-- YellowGreen: #9ACD32 -->
<style type="text/css">
	#cssmenu {
	  width: auto;
	  /*border: 1px solid YellowGreen;*/
	  background: YellowGreen;
	}

	#cssmenu > ul {
	  padding: 1px 0;
	  margin: 0px;
	  list-style: none;
	  width: 100%;
	  height: 21px;
	  /*border-top: 1px solid #FFFFFF;
	  border-bottom: 1px solid #FFFFFF;*/
	  font: normal 9pt 'century gothic', arial, sans-serif;
	  letter-spacing: 0.1em;
	}

	#cssmenu > ul li {
	  margin: 0;
	  padding: 0;
	  display: block;
	  float: left;
	  position: relative;
	  width: 174px;
	}

	#cssmenu > ul li a:link,
	#cssmenu > ul li a:visited {
	  padding: 4px 0;
	  display: block;
	  text-align: center;
	  text-decoration: none;
	  background: YellowGreen;
	  color: #f7f7f7;	  
	  width: 174px;
	}

	#cssmenu > ul li:hover a,
	#cssmenu > ul li a:hover,
	#cssmenu > ul li a:active {
	  padding: 4px 0;
	  display: block;
	  text-align: center;
	  text-decoration: none;
	  background: OliveDrab;
	  color: #ffffff;
	  width: 174px;
	 /* border-left: 1px solid #ffffff;
	  border-right: 1px solid #ffffff;*/
	}

	#cssmenu > ul li ul {
	  margin: 0;
	  padding: 1px 1px 0;
	  list-style: none;
	  display: none;
	 /* background: #ffffff;*/
	  width: 174px;
	  position: absolute;
	  top: 21px;
	  left: -1px;
	  /*border: 1px solid YellowGreen;
	  border-top: none;*/
	}

	#cssmenu > ul li:hover ul {
	  display: block;
	}

	#cssmenu > ul li ul li {
	  clear: left;
	  width: 174px;
	}

	#cssmenu > ul li ul li a:link,
	#cssmenu > ul li ul li a:visited {
	  clear: left;
	  background: YellowGreen;
	  padding: 4px 0;
	  width: 174px;
	  /*border-top: 1px solid #ffffff;
	  border-bottom: 1px solid #ffffff;*/
	  position: relative;
	  z-index: 1000;
	}

	#cssmenu > ul li ul li:hover a,
	#cssmenu > ul li ul li a:active,
	#cssmenu > ul li ul li a:hover {
	  clear: left;
	  background: OliveDrab;
	  padding: 4px 0;
	  width: 174px;
	  font-size: 12px;
	  color: #CDF63E;
	  /*border-top: 1px solid #ffffff;
	  border-bottom: 1px solid #ffffff;*/
	  position: relative;
	  z-index: 1000;
	}

	#cssmenu > ul li ul li ul.navigation-3 {
	  display: none;
	  margin: 0;
	  padding: 0;
	  list-style: none;
	  position: absolute;
	  left: 145px;
	  top: -2px;
	  padding: 1px 1px 0 1px;
	  /*border: 1px solid YellowGreen;*/
	  /*border-right: 1px solid YellowGreen;
	  border-left: 1px solid YellowGreen;
	  background: #ffffff;*/
	  z-index: 900;
	}

	#cssmenu > ul li ul li:hover ul.navigation-3 {
	  display: block;
	}

	#cssmenu > ul li ul li ul.navigation-3 li a:link,
	#cssmenu > ul li ul li ul.navigation-3 li a:visited {
	  background: YellowGreen;
	}
</style>
<div class="scrollable">
	<div class="items">
		<div class="item">
			<div class="header1"></div>                                    
		</div>
		<div class="item">
			<div class="header2"></div>						
		</div>
		<div class="item">
			<div class="header3"></div>						
		</div>			
	</div>
</div>
<div class="navi"></div>
<div id='cssmenu' >
	<ul>
		<li><a href="/ckc/inicio.php"><span>INICIO</span></a></li>
		<li><a href="#"><span>ALTA</span></a>
			<ul>
				<?php 
				if ($_SESSION['categoria'] == 'ad'){?>
					<li><a href="/ckc/alta_usuario.php">Usuario</a></li>
					<?php
				}
				if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>
					<li><a href="/ckc/alta_kinesiologo.php">Kinesiólogo</a></li>
					<li><a href="/ckc/alta_instituto.php">Instituto</a></li>
					<li><a href="/ckc/alta_obra_social.php">Obra Social</a></li>
					<li><a href="/ckc/alta_especialidad.php">Especialidad</a></li>
					<?php 
				}?>
			</ul>
		</li>
		<li><a href="#"><span>FACTURA</span></a>
			<ul>
				<?php
				if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'op'){?>
					<li><a href="/ckc/factura_alta.php">Cargar</a></li>
					<?php
				}
				if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au'){?>
					<li><a href="/ckc/factura_cierre.php">Cerrar</a></li>
					<li><a href="/ckc/factura_listado.php">Listar</a></li>
					<?php 
				}?>
			</ul>
		</li>
		<li><a href="#"><span>LISTAR</span></a>
			<ul>
				<?php
				if ($_SESSION['categoria'] == 'ad'){?>
					<li><a href="/ckc/listado_usuario.php">Usuario</a></li>
					<?php
				}
				if ($_SESSION['categoria'] == 'ad' || $_SESSION['categoria'] == 'au' || $_SESSION['categoria'] == 'op'){?>
					<li><a href="/ckc/listado_kinesiologo.php">Kinesiólogo</a></li>
					<li><a href="/ckc/listado_instituto.php">Instituto</a></li>
					<li><a href="/ckc/listado_obra_social.php">Obra Social</a></li>
					<li><a href="/ckc/listado_especialidad.php">Especialidad</a></li>
					<?php 
				}?>
			</ul>
		</li>
		<li><a href="#">CAMBIAR</a>
			<ul>
				<li><a href="/ckc/cambiar_pass.php">Contraseña</a></li>				
			</ul>
		</li>
		<li><a href="/ckc/logout.php">SALIR</a></li>
	</ul>
</div>