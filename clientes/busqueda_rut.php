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
						<h2>Pasajeros</h2>
						<p>Seleccione pasajero</p>	
						<form method="post" action="busqueda_rut2.php">			
								<select class="negro" size="1" name="rut">
      							<?php
								require_once("../connect.php");
                                require_once("../validadores.php");
                                $empresa = $_SESSION['empresa'];
                                $result = mysql_query("SELECT nombre, apellido, rut FROM pasajero, pasaje, orden_de_compra where pasajero.rut=pasaje.rut_pasajero and pasaje.orden_de_compra=orden_de_compra.numero and orden_de_compra.empresa = '$empresa'");            
                                while ($row = mysql_fetch_row($result))
                                {
                                	$nombre = ucwords($row[0]);
                                	$apellido = ucwords($row[1]);
                                    echo "<option value='$row[2]'> Nombre: $nombre $apellido - Rut: $row[2]</option>";   
                                }
								?>
     							</select><br>
     							<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="Ver detalle" class="special" /></li>
										</ul>
								</div>	
						</form>
					</div>
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