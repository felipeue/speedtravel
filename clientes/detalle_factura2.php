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
			</header>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<header class="major">	
							<h2>Factura</h2>	
							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>Número</th>
											
											<th>Orden de compra</th>
											<th>Empresa</th>
										</tr>
									</thead>
									<tbody>
										<?
										   $numero = $_POST["numero"];
											require_once("../connect.php");
                                			require_once("../validadores.php");
                                			$result = mysql_query("SELECT facturas.numero, facturas.valor, facturas.orden_de_compra, orden_de_compra.empresa FROM orden_de_compra, facturas WHERE facturas.numero='$numero' AND facturas.orden_de_compra = orden_de_compra.numero") ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
										echo "<tr>";
										echo	"<td>$row[0]</td>";
										
										echo	"<td>$row[2]</td>";
										echo	"<td>$row[3]</td>";
										echo "</tr>";
									    }
										?>
									</tbody>
								</table>
							</div>
							<h2>Detalles orden de compra</h2>
						<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>Rut</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Línea Aérea</th>
											<th>Código de reserva</th>
											<th>Ruta salida hora embarque</th>
											<th>Ruta salida fecha embarque</th>
											<th>Ruta salida lugar embarque</th>
											<th>Ruta salida hora llegada</th>
											<th>Ruta salida fecha llegada</th>
											<th>Ruta salida luda llegada</th>
											<th>Ruta retorno hora embarque</th>
											<th>Ruta retorno fecha embarque</th>
											<th>Ruta retorno lugar embarque</th>
											<th>Ruta retorno hora llegada</th>
											<th>Ruta retorno fecha llegada</th>
											<th>Ruta retorno luda llegada</th>
											<th>Valor boleto</th>
											<th>Nº boleto</th>
											<th>Ticket pendiente</th>
											<th>Modificado</th>
											<th>Observaciones</th>
										</tr>
									</thead>
									<tbody>
										<?
										
										$numero = $_POST["numero"];
										require_once("../connect.php");
                                		require_once("../validadores.php");
                                		$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasaje.linea_aerea, pasaje.codigo_reserva, pasaje.rs_hora_salida, pasaje.rs_fecha_salida, pasaje.rs_lugar_salida,pasaje.rs_hora_llegada, pasaje.rs_fecha_llegada, pasaje.rs_lugar_llegada, pasaje.rl_hora_salida, pasaje.rl_fecha_salida, pasaje.rl_lugar_salida,pasaje.rl_hora_llegada, pasaje.rl_fecha_llegada, pasaje.rl_lugar_llegada, pasaje.valor_boleto, pasaje.numero_boleto, pasaje.ticket_pendiente, pasaje.modificado,pasaje.observaciones FROM pasaje, pasajero, facturas, orden_de_compra WHERE facturas.numero='$numero' AND facturas.orden_de_compra = orden_de_compra.numero AND pasaje.orden_de_compra= orden_de_compra.numero and pasajero.rut= pasaje.rut_pasajero");            
                                		while ($row = mysql_fetch_row($result))
                                		{
                                			echo "<tr>";
							            	echo "<td>$row[0]</td>";
											echo "<td>$row[1]</td>";
											echo "<td>$row[2]</td>";
											echo "<td>$row[3]</td>";
											echo "<td>$row[4]</td>";
											echo "<td>$row[5]</td>";
											echo "<td>$row[6]</td>";
											echo "<td>$row[7]</td>";
											echo "<td>$row[8]</td>";
											echo "<td>$row[9]</td>";
											echo "<td>$row[10]</td>";
											echo "<td>$row[11]</td>";
											echo "<td>$row[12]</td>";
											echo "<td>$row[13]</td>";
											echo "<td>$row[14]</td>";
											echo "<td>$row[15]</td>";
											echo "<td>$row[16]</td>";
											echo "<td> $$row[17]</td>";
											echo "<td>$row[18]</td>";
											
											if($row[19]== 1)
											{	
											echo "<td>Si</td>";
										    }
										    elseif($row[19]== 0 || $row[19] == ' ')
										    {
										    	echo "<td>No</td>";
										    }
											if($row[20]== 1)
											{	
											echo "<td>Si</td>";
										    }
										    elseif($row[20]== 0 || $row[20] == ' ')
										    {
										    	echo "<td>No</td>";
										    }
										    echo "<td>$row[21]</td>";
											echo"</tr>";					
										}
										?>
									</tbody>
									<tfoot>

										<tr>
											<td colspan="17"></td>
											<?
											$numero = $_POST["numero"];
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM pasaje ,orden_de_compra, facturas where facturas.numero ='$numero' and facturas.orden_de_compra = orden_de_compra.numero and orden_de_compra.numero = pasaje.orden_de_compra");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
											?>
										</tr>
									</tfoot>
								</table>
							</div>	
								<?
											$numero = $_POST["numero"];
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM pasaje ,orden_de_compra, facturas where facturas.numero ='$numero' and facturas.orden_de_compra = orden_de_compra.numero and orden_de_compra.numero = pasaje.orden_de_compra");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<h2>Total : $$total</h2>";
										    }
											?>				
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