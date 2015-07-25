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
$rut = $_POST["rut"];   
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$turno =$_POST["turno"];
$cdc = $_POST["centro_de_costo"];
$valreg = mysql_query("SELECT * FROM pasajero WHERE rut = '$rut'");
if($row = mysql_fetch_array($valreg))
{
  if($row["rut"]==$rut)
  {
  ?>
  <script languaje="javascript">
  alert("Pasajero ya registrado, ingrese otro");
  location.href = document.referrer;
  </script>
  <? 
  }	
}
$v1=valnom($nombre);
$v2=valnom($apellido);
$v3=valida_rut($rut);

if ($v1 == TRUE && $v2 == TRUE && $v3 == TRUE)
{
	 mysql_query("INSERT INTO pasajero(nombre, apellido, rut,turno,centro_de_costo) VALUES ('$nombre', '$apellido', '$rut','$turno','$cdc')"); 
  ?>
  <script languaje="javascript">
  alert("Pasajero registrada");
  location.href = document.referrer;
  </script>
  <? 
} 
else
{
  ?>
  <script languaje="javascript">
  alert("Error al ingresar Pasajero");
  location.href = document.referrer;
  </script>
  <? 	
}
?>
