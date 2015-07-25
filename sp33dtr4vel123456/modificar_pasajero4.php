<?php
session_start();
if(!isset($_SESSION['rut'])) 
{
  header('Location: index.html'); 
  exit();
}
?>
<?php
header("Content-Type: text/html;charset=utf-8");
require_once("../connect.php");
require_once("../validadores.php");

$pasaje_pendiente =$_POST["pasaje_pendiente"];
if($pasaje_pendiente == '')
{
	$pasaje_pendiente == 0;
}
echo $pasaje_pendiente;
$id = $_POST["id"];
echo $id;
mysql_query("UPDATE pasaje set ticket_pendiente='$pasaje_pendiente' where id='$id'") or die (mysql_error());
if($pasaje_pendiente == 1)
{
	$result = mysql_query("SELECT id, linea_aerea, rut_pasajero, codigo_reserva, rs_hora_salida, rs_fecha_salida, rs_lugar_salida, rs_hora_llegada, rs_fecha_llegada, rs_lugar_llegada, rl_hora_salida, rl_fecha_salida, rl_lugar_salida, rl_hora_llegada ,rl_fecha_llegada, rl_lugar_llegada, valor_boleto, numero_boleto, orden_de_compra, observaciones FROM pasaje WHERE id = '$id'") or die (mysql_error());            
		while ($row = mysql_fetch_row($result))
		{
		  $id_pasaje = $row[0];
		  $linea_aerea = $row[1];
		  $rut_pasajero = $row[2];
		  $codigo_reserva = $row[3];
		  $rs_hora_salida = $row[4];
		  $rs_fecha_salida = $row[5];
		  $rs_lugar_salida = $row[6];
		  $rs_hora_llegada = $row[7];
		  $rs_fecha_llegada = $row[8];
		  $rs_lugar_llegada = $row[9];
		  $rl_hora_salida = $row[10];
		  $rl_fecha_salida = $row[11];
		  $rl_lugar_salida = $row[12];
		  $rl_hora_llegada = $row[13];
		  $rl_fecha_llegada = $row[14];
		  $rl_lugar_llegada = $row[15];
		  $valor_boleto = $row[16];
		  $numero_boleto = $row[17];
		  $orden_de_compra = $row[18];
		  $observaciones = $row[19];

   			mysql_query("INSERT INTO pasaje_modificado(id_pasaje, linea_aerea, rut_pasajero, codigo_reserva, rs_hora_salida, rs_fecha_salida, rs_lugar_salida, rs_hora_llegada, rs_fecha_llegada, rs_lugar_llegada, rl_hora_salida, rl_fecha_salida, rl_lugar_salida, rl_hora_llegada ,rl_fecha_llegada, rl_lugar_llegada, valor_boleto, numero_boleto, orden_de_compra, observaciones) VALUES ('$id_pasaje', '$linea_aerea', '$rut_pasajero', '$codigo_reserva','$rs_hora_salida','$rs_fecha_salida','$rs_lugar_salida','$rs_hora_llegada','$rs_fecha_llegada','$rs_lugar_llegada','$rl_hora_salida','$rl_fecha_salida','$rl_lugar_salida','$rl_hora_llegada','$rl_fecha_llegada','$rl_lugar_llegada','$valor_boleto','$numero_boleto','$orden_de_compra','$observaciones')")or die (mysql_error()); 
  
		}
}
?>
<?php
require_once("../connect.php");
require_once("../validadores.php");
$id = $_POST["id_pasaje"];
$linea_aerea = $_POST["linea_aerea"];   
$codigo_reserva = $_POST["codigo_reserva"];
$rs_hora_salida = $_POST["rs_hora_salida"];
$rs_fecha_salida = $_POST["rs_fecha_salida"];
$rs_lugar_salida = $_POST["rs_lugar_salida"];
$rs_hora_llegada = $_POST["rs_hora_llegada"];
$rs_fecha_llegada = $_POST["rs_fecha_llegada"];
$rs_lugar_llegada = $_POST["rs_lugar_llegada"];
$rl_hora_salida = $_POST["rl_hora_salida"];
$rl_fecha_salida = $_POST["rl_fecha_salida"];
$rl_lugar_salida = $_POST["rl_lugar_salida"];
$rl_hora_llegada = $_POST["rl_hora_llegada"];
$rl_fecha_llegada = $_POST["rl_fecha_llegada"];
$rl_lugar_llegada = $_POST["rl_lugar_llegada"];
$valor_boleto = $_POST["valor_boleto"];
$numero_boleto = $_POST["numero_boleto"];
$observaciones = $_POST["observaciones"];
$orden_de_compra = $_POST["numero_orden"];
echo $rut = $_POST["rut"];

mysql_query("INSERT INTO pasaje(linea_aerea, rut_pasajero, codigo_reserva, rs_hora_salida, rs_fecha_salida, rs_lugar_salida, rs_hora_llegada, rs_fecha_llegada, rs_lugar_llegada, rl_hora_salida, rl_fecha_salida, rl_lugar_salida, rl_hora_llegada ,rl_fecha_llegada, rl_lugar_llegada, valor_boleto, numero_boleto, orden_de_compra, observaciones) 
    VALUES ('$linea_aerea', '$rut', '$codigo_reserva','$rs_hora_salida','$rs_fecha_salida','$rs_lugar_salida','$rs_hora_llegada','$rs_fecha_llegada','$rs_lugar_llegada','$rl_hora_salida','$rl_fecha_salida','$rl_lugar_salida','$rl_hora_llegada','$rl_fecha_llegada','$rl_lugar_llegada','$valor_boleto','$numero_boleto','$orden_de_compra','$observaciones')") or die (mysql_error());

?>
  <script languaje="javascript">
  alert("Pasaje modificado");
  location.href = 'intranetadmin.php';
  </script>
  <? 
?>