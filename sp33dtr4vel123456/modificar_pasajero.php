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
						<h2>Cambiar pasaje</h2>
						<p>Seleccione un pasaje a modificar [Nombre | Rut | Codigo Reserva | Nº Boleto ]</p>
						<p>|| RECUERDE QUE AL HACER CLICK LOS DATOS ACTUALES DEL PASAJE PASARAN A ESTAR GUARDADOS PERO BORRADOS Y REEMPLAZADOS POR LOS QUE INGRESARA ||</p>
						<form method="post" action="modificar_pasajero2.php">			
								<select class="negro" size="1" name="pasaje">
      							<?php
								require_once("../connect.php");
                                require_once("../validadores.php");
                                $result = mysql_query("SELECT pasajero.nombre, pasajero.rut, pasaje.codigo_reserva, pasaje.numero_boleto, pasaje.id, pasajero.apellido  FROM pasajero, pasaje WHERE pasajero.rut = pasaje.rut_pasajero");            
                                while ($row = mysql_fetch_row($result))
                                {
                                	$nombre = ucwords($row[0]);
                                	$apellido = ucwords($row[5]);
                                    echo "<option value='$row[4]'>Nombre: $nombre $apellido - Codigo reserva: $row[2] - Número boleto: $row[3]</option><br>";   
                   
                                }
								?>
     							</select>
								<?php
								require_once("../connect.php");
                                require_once("../validadores.php");
                                $result = mysql_query("SELECT pasajero.nombre, pasajero.rut, pasaje.codigo_reserva, pasaje.numero_boleto, pasaje.id, pasajero.apellido  FROM pasajero, pasaje WHERE pasajero.rut = pasaje.rut_pasajero");            
                                while ($row = mysql_fetch_row($result))
                                {
                             
                                    echo "<input type='hidden' name='rut' value='$row[1]'>"; 
                                    echo "<input type='hidden' name='id' value='$row[4]'>"; 
                                }
								?>
     							<div class="12u$">
										<ul class="actions">
											<li><input type="submit" onclick="return confirm('Recuerde que los datos actuales seran borrados y guardados pero en otro lugar¿Esta seguro que desea enviar el registro?');" value="Modificar Pasaje" class="special" /></li>
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