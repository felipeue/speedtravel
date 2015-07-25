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
						<li><a href="intranetadmin.php">Inicio</a></li>
						<li>
							<a href="">Menu</a>
							<ul>
								<li><a href="agregar_orden.php">Agregar Orden de compra</a></li>
								<li><a href="agregar_pasajero.php">Agregar Pasajero</a></li>
								<li><a href="agregar_pasaje.php">Agregar Pasaje</a></li>
								<li><a href="modificar_pasajero.php">Modificar | Eliminar Pasaje</a></li>
								<li><a href="agregar_factura.php">Agregar Factura</a></li>
								<li>
									<a href="">Busquedas</a>
									<ul>
										<li><a href="busqueda_odc.php">Por orden de compra</a></li>
										<li><a href="busqueda_rut.php">Por rut pasajero</a></li>
										<li><a href="detalle_factura.php">Detalle Facturas</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="agregar_cliente.php">Agregar Cliente</a></li>
						<li><a href="logout.php" class="button special">Cerrar Sesión</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<header class="major">
						<ul class="actions">
							<h2>Seleccione algúna entidad a eliminar</h2>
								<li><a href="eliminar_odc.php" class="button special big">Eliminar orden de compra</a></li>
								<li><a href="eliminar_factura.php" class="button special big">Eliminar factura</a></li>
								<li><a href="eliminar_cliente.php" class="button special big">Eliminar cliente</a></li>
     					</ul>
					</header>
				</div>
			<div class="container">
					<header class="major">
						<ul class="actions">
							<li><a href="eliminar_pasajero.php" class="button special big">Eliminar pasajero</a></li>
							<li><a href="eliminar_pasaje.php" class="button special big">Eliminar pasaje</a></li>
							<li><a href="eliminar_pasaje_modificado.php" class="button special big">Eliminar pasaje modificado</a></li>	
						</ul>
					</header>
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