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
$numero = $_POST["numero"];   
$valor = $_POST["valor"];
$odc = $_POST["orden_de_compra"];
$valreg = mysql_query("SELECT * FROM facturas WHERE numero = '$numero'");
if($row = mysql_fetch_array($valreg))
{
  if($row["numero"]==$numero)
  {
  ?>
  <script languaje="javascript">
  alert("Factura ya registrada, ingrese otro");
  location.href = document.referrer;
  </script>
  <? 
  }	
}
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
$v1=vacio($numero);
$v2=valnum($valor);
$v3=vacio($odc);
if ($v1 == TRUE && $v2 == TRUE && $v3 == TRUE)
{
	 mysql_query("INSERT INTO facturas(numero, valor, orden_de_compra) VALUES ('$numero', '$valor', '$odc')"); 
  ?>
  <script languaje="javascript">
  alert("Factura registrada");
  location.href = document.referrer;
  </script>
  <? 
} 
else
{
  ?>
  <script languaje="javascript">
  alert("Error al ingresar Factura");
  location.href = document.referrer;
  </script>
  <? 	
}
?>
