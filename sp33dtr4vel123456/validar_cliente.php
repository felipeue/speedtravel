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
$password = $_POST["password"];
$password2 = $_POST["password2"];
$empresa = $_POST["empresa"];
$valreg = mysql_query("SELECT * FROM user WHERE rut = '$rut'");
if($row = mysql_fetch_array($valreg))
{
  if($row["rut"]==$rut)
  {
  ?>
  <script languaje="javascript">
  alert("cliente ya registrado, ingrese otro");
  location.href = document.referrer;
  </script>
  <? 
  } 
}
$v1=valnom($nombre);
$v2=valnom($apellido);
$v3=valida_rut($rut);
if($password != $password2)
{
  ?>
  <script languaje="javascript">
  alert("claves distintas");
  location.href = document.referrer;
  </script>
  <? 
}
else
{
if ($v1 == TRUE && $v2 == TRUE && $v3 == TRUE)
{
   mysql_query("INSERT INTO user(nombre, apellido, rut, password, empresa) VALUES ('$nombre', '$apellido', '$rut', '$password','$empresa')"); 
  ?>
  <script languaje="javascript">
  alert("Cliente registrado");
  location.href = document.referrer;
  </script>
  <? 
} 
else
{
  ?>
  <script languaje="javascript">
  alert("Error al ingresar cliente");
  location.href = document.referrer;
  </script>
  <?  
}
}
?>
