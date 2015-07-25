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
							<h2>Detalle pasajero</h2>
							<h2>Vuelos efectuados o en proceso</h2>	
						<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>Rut</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Linea Aerea</th>
											<th>Codigo de reserva</th>
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
											<th>Centro de costo</th>
										</tr>
									</thead>
									<tbody>
										<?
										
										$rut = $_POST["rut"];
										require_once("../connect.php");
                                		require_once("../validadores.php");
                                		$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasaje.linea_aerea, pasaje.codigo_reserva, pasaje.rs_hora_salida, pasaje.rs_fecha_salida, pasaje.rs_lugar_salida,pasaje.rs_hora_llegada, pasaje.rs_fecha_llegada, pasaje.rs_lugar_llegada, pasaje.rl_hora_salida, pasaje.rl_fecha_salida, pasaje.rl_lugar_salida,pasaje.rl_hora_llegada, pasaje.rl_fecha_llegada, pasaje.rl_lugar_llegada, pasaje.valor_boleto, pasaje.numero_boleto, pasaje.ticket_pendiente, pasaje.modificado,pasaje.observaciones, pasajero.centro_de_costo FROM pasaje, pasajero WHERE pasajero.rut='$rut' AND pasajero.rut= pasaje.rut_pasajero");            
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
										    echo "<td>$row[22]</td>";
											echo"</tr>";					
										}
										?>
									</tbody>
								</table>
							</div>	

							<h2>Ticket pendientes disponibles</h2>
							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>Rut</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Linea Aerea</th>
											<th>Codigo de reserva</th>
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
										
										$rut = $_POST["rut"];
										require_once("../connect.php");
                                		require_once("../validadores.php");
                                		$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasaje_modificado.linea_aerea, pasaje_modificado.codigo_reserva, pasaje_modificado.rs_hora_salida, pasaje_modificado.rs_fecha_salida, pasaje_modificado.rs_lugar_salida,pasaje_modificado.rs_hora_llegada,pasaje_modificado.rs_fecha_llegada, pasaje_modificado.rs_lugar_llegada,pasaje_modificado.rl_hora_salida, pasaje_modificado.rl_fecha_salida, pasaje_modificado.rl_lugar_salida,pasaje_modificado.rl_hora_llegada,pasaje_modificado.rl_fecha_llegada,pasaje_modificado.rl_lugar_llegada,pasaje_modificado.valor_boleto,pasaje_modificado.numero_boleto,pasaje_modificado.ticket_pendiente,pasaje_modificado.modificado,pasaje_modificado.observaciones FROM pasaje_modificado, pasajero WHERE pasajero.rut='$rut' AND pasajero.rut= pasaje_modificado.rut_pasajero") or die (mysql_error());            
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
								</table>
							</div>				
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