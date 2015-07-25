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

$id = $_POST["id"];
echo $id;
$result = mysql_query("SELECT pasaje.id from pasaje, pasaje_modificado where pasaje_modificado.id ='$id' and pasaje_modificado.id_pasaje = pasaje.id ");
while ($row = mysql_fetch_row($result))
{
$ticket_pendiente = 0;
mysql_query("UPDATE pasaje set ticket_pendiente = '$ticket_pendiente' where id='$row[0]'") or die (mysql_error());
}
mysql_query("DELETE FROM pasaje_modificado WHERE id = '$id'") or die (mysql_error());  

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
$rut = $_POST["rut_nuevo"];

mysql_query("INSERT INTO pasaje(linea_aerea, rut_pasajero, codigo_reserva, rs_hora_salida, rs_fecha_salida, rs_lugar_salida, rs_hora_llegada, rs_fecha_llegada, rs_lugar_llegada, rl_hora_salida, rl_fecha_salida, rl_lugar_salida, rl_hora_llegada ,rl_fecha_llegada, rl_lugar_llegada, valor_boleto, numero_boleto, orden_de_compra, observaciones) 
    VALUES ('$linea_aerea', '$rut', '$codigo_reserva','$rs_hora_salida','$rs_fecha_salida','$rs_lugar_salida','$rs_hora_llegada','$rs_fecha_llegada','$rs_lugar_llegada','$rl_hora_salida','$rl_fecha_salida','$rl_lugar_salida','$rl_hora_llegada','$rl_fecha_llegada','$rl_lugar_llegada','$valor_boleto','$numero_boleto','$orden_de_compra','$observaciones')") or die (mysql_error());

?>
  <script languaje="javascript">
  alert("Pasaje modificado");
  location.href = 'intranetadmin.php';
  </script>
  <? 
?>