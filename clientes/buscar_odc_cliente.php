<?php
session_start();
require_once("../connect.php");
require_once("../validadores.php");
if(!isset($_SESSION['rut'])) 
{
  ?>
 <script languaje="javascript">
  alert("Debe iniciar sesison primero");
  location.href = "index.html";
 </script>
<? 
  exit();
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>|Speed Travel|</title>
		<link rel="shortcut icon" href="images/sp.png">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollex.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
					<nav id="nav">
					<ul>
						<li><a href="intranetclientes.php">Inicio</a></li>
						
						
								<li>
									<a href="">Búsquedas</a>
									<ul>
										<li><a href="busqueda_odc.php">Por orden de compra</a></li>
										<li><a href="busqueda_rut.php">Por rut pasajero</a></li>
										<li><a href="detalle_factura.php">Detalle Facturas</a></li>
									</ul>
								</li>
							
						
						<li><a href="logout.php" class="button special">Cerrar Sesión</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<header class="major">
							<form method="post" action="buscar_odc_cliente2.php">
								<div class="row uniform 50%">
									
									
									
									<div class="12u$">
									<p>Mes</p>
									<select class="negro" size="1" name="mes">
									  <option value='todos'>Todos</option>"; 
									 <option value='enero'>Enero</option>"; 
									 <option value='febrero'>Febrero</option>"; 
									 <option value='marzo'>Marzo</option>"; 
									 <option value='abril'>Abril</option>"; 
									 <option value='mayo'>Mayo</option>"; 
									 <option value='junio'>Junio</option>"; 
									 <option value='julio'>Julio</option>"; 
									 <option value='agosto'>Agosto</option>"; 
									 <option value='septiembre'>Septiembre</option>"; 
									 <option value='octubre'>Octubre</option>"; 
									 <option value='noviembre'>Noviembre</option>"; 
									 <option value='diciembre'>Diciembre</option>"; 
								    </select>
									</div>
									<div class="12u$">
										<p>Año</p><input type="text" name="ano" id="numero" value="" placeholder="año" required/>
									</div>
										
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="Buscar" class="special" /></li>
										</ul>
									</div>
								</div>
							</form>
					</header>

					<!-- Content -->
						
				</div>
			</div>

		<!-- Footer -->
			<footer id="footer">
				<ul class="copyright">
					<li>&copy; SpeedTravel. All rights reserved.</li>
					<li><p class="copy-right"><a href="http://cl.linkedin.com/in/feliperioss" style="text-decoration:none;"><span style="font: 80% Arial,sans-serif; color:#0783B6;"><img src="https://static.licdn.com/scds/common/u/img/webpromo/btn_in_20x15.png" width="20" height="15" alt="Ver el perfil de Felipe Rios en LinkedIn" style="vertical-align:middle;" border="0"></span>¿Quién hizo esto?</a></p></li>
				</ul>
			</footer>

	</body>
</html>