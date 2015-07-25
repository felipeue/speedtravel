<?php

//creamos la sesion
session_start();
require_once("../connect.php");
require_once("../validadores.php");
//validamos si se ha hecho o no el inicio de sesion correctamente

//si no se ha hecho la sesion nos regresará a login.php
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
<?php
header("Content-Type: text/html;charset=utf-8");
require_once("../connect.php");
$clave = $_POST["password"];
$rut = $_SESSION['rut'];
$result = mysql_query("SELECT password FROM admin WHERE rut = '$rut'");
if($row = mysql_fetch_array($result))
{
	if($row[0] == $clave)
	{
       ?>
   		<script languaje="javascript">
    	alert("Ingrese su nueva contraseña");
    	location.href = "cambiar_clave2.php";
   		</script>
  		<? 	 
    }
	else
	{
		?>
   		<script languaje="javascript">
    	alert("Contraseña incorrecta");
    	location.href = document.referrer;
   		</script>
  		<? 	
	}
}
?>