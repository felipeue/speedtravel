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
$clave2 = $_POST["password2"];
$rut = $_SESSION['rut'];
if($clave == $clave2)
{
  $result = mysql_query("UPDATE admin SET password='$clave' WHERE rut = '$rut'");
  if($result == TRUE)
  {   
      ?>
   		<script languaje="javascript">
    	alert("Su clave fue cambiada");
    	location.href = "intranetadmin.php";
   		</script>
  		<? 	 
  }
	else
	{
		?>
   		<script languaje="javascript">
    	alert("No se pudo cambiar la contraseña");
    	location.href = document.referrer;
   		</script>
  	<? 	
	}  
}
else
{
    ?>
      <script languaje="javascript">
      alert("Las claves ingresadas no son iguales");
      location.href = document.referrer;
      </script>
    <?
}
?>