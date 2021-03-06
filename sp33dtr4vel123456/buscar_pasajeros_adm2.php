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
							<h2>Gastos por ordenes de compra</h2>	
							<div class="table-wrapper">
								<table class="alt">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Rut</th>
											<th>Turno</th>
											<th>Centro de costo</th>
											<th>Valor</th>
											<th>Año</th>
										</tr>
									</thead>
									<tbody>
										<?
										   $empresa = $_POST["empresa"];
										   $turno = $_POST["turno"];
										   $cdc = $_POST["cdc"];
										   $mes = $_POST["mes"];
										   $ano = $_POST["ano"];

											require_once("../connect.php");
                                			require_once("../validadores.php");
                                			if($mes =='todos' && $turno == 'todos' && $cdc == 'todos')
                                			{
                                			$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and orden_de_compra.ano='$ano' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
											$ano = $_POST["ano"];
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and ano ='$ano' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}
										 elseif($mes == 'todos' && $turno == 'todos')
                                			{
                                			$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano='$ano' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
										
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano ='$ano' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}
										elseif($mes == 'todos' && $cdc == 'todos')
                                			{
                                			$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and pasajero.turno = '$turno' and orden_de_compra.ano='$ano' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
										
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and pasajero.turno = '$turno' and orden_de_compra.ano ='$ano' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}
										elseif($turno == 'todos' && $cdc == 'todos')
                                			{
                                			$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and orden_de_compra.mes = '$mes' and orden_de_compra.ano='$ano' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
										
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and orden_de_compra.mes = '$mes' and orden_de_compra.ano ='$ano' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}


										elseif($mes == 'todos' )
                                			{
                                			$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano='$ano' and pasajero.turno = '$turno' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
										
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano='$ano' and pasajero.turno = '$turno' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}
										elseif($turno == 'todos' )
                                			{
                                			$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano='$ano' and orden_de_compra.mes='$mes' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
										
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano='$ano' and orden_de_compra.mes='$mes' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}
										elseif($cdc == 'todos' )
                                			{
                                			$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero  and orden_de_compra.ano='$ano' and pasajero.turno='$turno' and orden_de_compra.mes='$mes' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
										
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasaje.orden_de_compra = orden_de_compra.numero and pasajero.turno='$turno' and orden_de_compra.ano='$ano' and orden_de_compra.mes='$mes' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}
										else
										{
											$result = mysql_query("SELECT pasajero.rut, pasajero.nombre, pasajero.apellido, pasajero.turno, pasajero.centro_de_costo, pasaje.valor_boleto, orden_de_compra.ano FROM pasaje, pasajero, orden_de_compra WHERE pasajero.rut=pasaje.rut_pasajero AND pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano='$ano' and pasajero.turno = '$turno' and orden_de_compra.mes = '$mes' and orden_de_compra.empresa='$empresa'") or (mysql_error()) ; 
                                			while ($row = mysql_fetch_row($result))
                                			{
												echo "<tr>";
												echo	"<td>$row[1]</td>";		
												echo	"<td>$row[2]</td>";
												echo	"<td>$row[0]</td>";
												echo	"<td>$row[3]</td>";
												echo	"<td>$row[4]</td>";
												echo	"<td>$row[5]</td>";
												echo	"<td>$row[6]</td>";
												echo "</tr>";
									        }
										
											echo "</tbody>";
											echo "<tfoot>";
											echo "<tr>";
											echo "<td colspan='5'></td>";
											
										
											$result = mysql_query("SELECT SUM(pasaje.valor_boleto) FROM orden_de_compra, pasaje, pasajero where pasaje.orden_de_compra = orden_de_compra.numero and pasajero.centro_de_costo = '$cdc' and orden_de_compra.ano='$ano' and pasajero.turno = '$turno' and orden_de_compra.mes = '$mes' and orden_de_compra.empresa='$empresa'");
											while ($row = mysql_fetch_row($result))
											{
											$total = $row[0];
											echo "<td>Total : $$total</td>";
										    }
										}
										?>
										</tr>
									</tfoot>
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