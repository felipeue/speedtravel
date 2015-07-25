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
$rut_pasajero = $_POST["rut_pasajero"];
$orden_de_compra = $_POST["orden_de_compra"];
$observaciones = $_POST["observaciones"];

function vacio($string)
{
  if($string = '')
  {
    return FALSE;
  }
  else
  {
    return TRUE;
  }
}
$v1=vacio($linea_aerea);
$v2=vacio($codigo_reserva);
$v3=valfecha($rs_fecha_salida);
$v4=valfecha($rs_fecha_llegada);
$v5=valfecha($rs_fecha_salida);
$v6=valfecha($rl_fecha_llegada);
$v7=valfecha($rl_fecha_salida);
$v8=valnum($valor_boleto);
$v9 = vacio($numero_boleto);
if ($v1 == TRUE && $v2 == TRUE && $v3 == TRUE && $v4 == TRUE && $v5== TRUE && $v6 == TRUE && $v7 == TRUE && $v8 == TRUE && $v9 == TRUE)
{
	 mysql_query("INSERT INTO pasaje(linea_aerea, rut_pasajero, codigo_reserva, rs_hora_salida, rs_fecha_salida, rs_lugar_salida, rs_hora_llegada, rs_fecha_llegada, rs_lugar_llegada, rl_hora_salida, rl_fecha_salida, rl_lugar_salida, rl_hora_llegada ,rl_fecha_llegada, rl_lugar_llegada, valor_boleto, numero_boleto, orden_de_compra, observaciones) 
    VALUES ('$linea_aerea', '$rut_pasajero', '$codigo_reserva','$rs_hora_salida','$rs_fecha_salida','$rs_lugar_salida','$rs_hora_llegada','$rs_fecha_llegada','$rs_lugar_llegada','$rl_hora_salida','$rl_fecha_salida','$rl_lugar_salida','$rl_hora_llegada','$rl_fecha_llegada','$rl_lugar_llegada','$valor_boleto','$numero_boleto','$orden_de_compra','$observaciones')");
  $valreg = mysql_query("SELECT pasaje.id ,pasaje.valor_boleto, orden_de_compra.numero FROM orden_de_compra, pasaje WHERE pasaje.orden_de_compra = '$orden_de_compra' AND pasaje.orden_de_compra = orden_de_compra.numero order by pasaje.id DESC LIMIT 1") or die (mysql_error());
  ?>
  <script languaje="javascript">
  alert("Pasaje registrada");
  location.href = document.referrer;
  </script>
  <? 
} 
else
{
  ?>
  <script languaje="javascript">
  alert("Error al ingresar Pasaje");
  location.href = document.referrer;
  </script>
  <? 	
}
?>
