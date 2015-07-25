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
$empresa = $_POST["empresa"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$detalle = $_POST["detalle"];

$valreg = mysql_query("SELECT * FROM orden_de_compra WHERE numero = '$numero'");
if($row = mysql_fetch_array($valreg))
{
  if($row["numero"]==$numero)
  {
  ?>
  <script languaje="javascript">
  alert("Orden ya registrada, ingrese otro");
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
$v3=vacio($empresa);
if ($v1 == TRUE && $v2 == TRUE && $v3 == TRUE)
{
	 mysql_query("INSERT INTO orden_de_compra(numero, valor_inicial, empresa,dia,mes,ano,detalle) VALUES ('$numero', '$valor', '$empresa','$dia','$mes','$ano','$detalle')"); 
  ?>
  <script languaje="javascript">
  alert("Orden de compra registrada");
  location.href = document.referrer;
  </script>
  <? 
} 
else
{
  ?>
  <script languaje="javascript">
  alert("Error al ingresar orden");
  location.href = document.referrer;
  </script>
  <? 	
}
?>
