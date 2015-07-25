<?php
date_default_timezone_set('America/Santiago');
header("Content-Type: text/html;charset=utf-8");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
function valnom($n)
{
    if(!preg_match('/^[a-zñA-ZÑ, ]*$/',$n))
    {
     	?>
 			<script languaje="javascript">
  			alert("Nombre o apellido invalido");
  			location.href = document.referrer;
			</script>
		<? 
		return FALSE;
    }
    elseif ($n == '') 
    {
    	?>
 			<script languaje="javascript">
  			alert("Nombre o apellido vacio");
  			location.href = document.referrer;
			</script>
		<? 
    }
    else
    {
    	return TRUE;
    }
}
function valmail($email) 
{
	// Primero, checamos que solo haya un símbolo @, y que los largos sean correctos
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) 
	{
		// correo inválido por número incorrecto de caracteres en una parte, o número incorrecto de símbolos @
	?>
		<script languaje="javascript">
        alert("mail incorrecto!!");
		location.href = document.referrer;
		</script>
	<? 
    return false;
  }
  // se divide en partes para hacerlo más sencillo
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) 
	{
    if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) 
		{
	    ?>
		<script languaje="javascript">
        alert("mail incorrecto!!!");
		location.href = document.referrer;
        </script>
        <? 
       return false;
    }
  } 
  // se revisa si el dominio es una IP. Si no, debe ser un nombre de dominio válido
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) 
	{ 
     $domain_array = explode(".", $email_array[1]);
     if (sizeof($domain_array) < 2) 
		 {
        return false; // No son suficientes partes o secciones para se un dominio
     }
     for ($i = 0; $i < sizeof($domain_array); $i++) 
		 {
        if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) 
		{
		    ?>
	  		<script languaje="javascript">
        	alert("mail incorrecto!!!!");
			location.href = document.referrer;
        	</script>
        	<? 
           return false;
        }
     }
  }
  return true;
}
function valnum($n)
{
    if(!preg_match('/^[0-9, ]*$/',$n))
    {
     	?>
 			<script languaje="javascript">
  			alert("Numero invalido");
  			location.href = document.referrer;
			</script>
		<? 
		return FALSE;
    }
    elseif ($n == '') 
    {
    	?>
 			<script languaje="javascript">
  			alert("Numero vacio");
  			location.href = document.referrer;
			</script>
		<? 
    }
    else
    {
    	return TRUE;
    }
}
valnom($nombre);
valmail($email);
valnum($telefono); 
$myDate = date('m/d/Y');
$myHour = date("G:i:s");
$fecha = $myDate." ".$myHour;
if ($_POST['email'] != "") {
	// email de destino
	$email = "felipe.rios@mail.udp.cl";
	
	// asunto del email
	$subject = "Contacto";
	
	// Cuerpo del mensaje
	$mensaje = "---------------------------------- \n";
	$mensaje.= "            Contacto               \n";
	$mensaje.= "---------------------------------- \n";
	$mensaje.= "NOMBRE:   ".$_POST['nombre']."\n";
	$mensaje.= "EMAIL:    ".$_POST['email']."\n";
	$mensaje.= "TELEFONO: ".$_POST['telefono']."\n";
    $mensaje.= "FECHA:  ".$fecha."\n";
	$mensaje.= "---------------------------------- \n\n";
	$mensaje.= $_POST['mensaje']."\n\n";
	$mensaje.= "---------------------------------- \n";
	$mensaje.= "Enviado desde http://www.speedtravel.cl \n";
	
	// headers del email
	$headers = "From: ".$_POST['email']."\r\n";
	
	// Enviamos el mensaje
	if (mail($email, $subject, $mensaje, $headers)) 
	{
	    ?>
 			<script languaje="javascript">
  			alert("Mensaje enviado");
  			location.href = document.referrer;
			</script>
		<?
	} else 
	{
	    ?>
 			<script languaje="javascript">
  			alert("Error de envio");
  			location.href = document.referrer;
			</script>
		<?
	}
}
?> 

