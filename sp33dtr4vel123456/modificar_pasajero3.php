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
$numero = $_POST["numero"];   
$valor = $_POST["valor"];
$empresa = $_POST["empresa"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$detalle = $_POST["detalle"];

$valreg = mysql_query("SELECT * FROM orden_de_compra WHERE numero = '$numero'") or die (mysql_error());
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
   mysql_query("INSERT INTO orden_de_compra(numero, valor_inicial, empresa,dia,mes,ano,detalle) VALUES ('$numero', '$valor', '$empresa','$dia','$mes','$ano','$detalle')") or die (mysql_error()); 
  ?>
  <script languaje="javascript">
  alert("Orden de compra registrada");

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
<!DOCTYPE HTML>
<html>
  <head>
    <title>|Speed Travel|</title>
    <link rel="shortcut icon" href="images/sp.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/jquery.scrollex.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
  </head>
  <body>

    <!-- Header -->
      <header id="header" class="skel-layers-fixed">
        <nav id="nav">
          <ul>
            <li><a href="intranetadmin.php">Inicio</a></li>
            <li>
              <a href="">Menu</a>
              <ul>
                <li><a href="agregar_orden.php">Agregar Orden de compra</a></li>
                <li><a href="agregar_pasajero.php">Agregar Pasajero</a></li>
                <li><a href="agregar_pasaje.php">Agregar Pasaje</a></li>
                <li><a href="modificar_pasajero.php">Modificar | Eliminar Pasaje</a></li>
                <li><a href="agregar_factura.php">Agregar Factura</a></li>
                <li>
                  <a href="">Busquedas</a>
                  <ul>
                    <li><a href="busqueda_odc.php">Por orden de compra</a></li>
                    <li><a href="busqueda_rut.php">Por rut pasajero</a></li>
                    <li><a href="detalle_factura.php">Detalle Facturas</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="agregar_cliente.php">Agregar Cliente</a></li>
            <li><a href="logout.php" class="button special">Cerrar Sesión</a></li>
          </ul>
        </nav>
      </header>

    <!-- Main -->
      <div id="main" class="wrapper style1">
        <div class="container">
          <header class="major">
               <h2>Modificar Pasaje</h2>
              <form method="post" action="modificar_pasajero4.php">
                <div class="row uniform 50%">

                  <div class="6u 12u$(medium)">
                    <p>Ticket pendiente</p>
                    <select class="negro" size="1" name="pasaje_pendiente">
                    
                   <option value='0'>No</option>"; 
                   <option value='1'>Si</option>"; 
                 </select>
                  </div>
                
                  <div class="6u 12u$(xsmall)">
                    <p>Línea Aérea</p><input type="text" name="linea_aerea" id="linea_aerea" value="" placeholder="Ingrese Línea Aérea" required/>
                  </div>
     
                  <div class="6u$ 12u$(xsmall)">
                    <p>Código de reserva</p><input type="text" name="codigo_reserva" id=" codigo_reserva" value="" placeholder="Ingrese código de reserva"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de salida - Hora Salida</p><input type="text" name="rs_hora_salida" id="rs_hora_salida" value="" placeholder="Ingrese hora de salida HH:MM:SS" required />
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de salida - Fecha Salida</p><input type="text" name="rs_fecha_salida" id="rs_fecha_salida" value="" placeholder="Ingrese fecha de salida DD/MM/AAAA" required />
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de salida - lugar Salida</p><input type="text" name="rs_lugar_salida" id="rs_lugar_salida" value="" placeholder="Ingrese lugar de salida"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de salida - Hora llegada</p><input type="text" name="rs_hora_llegada" id="rs_hora_llegada" value="" placeholder="Ingrese hora de llegada HH:MM:SS"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de salida - Fecha llegada</p><input type="text" name="rs_fecha_llegada" id="rs_fecha_llegada" value="" placeholder="Ingrese fecha de llegada DD/MM/AAAA" required />
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de salida - lugar llegada</p><input type="text" name="rs_lugar_llegada" id="rs_lugar_llegada" value="" placeholder="Ingrese lugar de llegada"  required/>
                  </div>
                  <!-- -->
                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de retorno - Hora Salida</p><input type="text" name="rl_hora_salida" id="rl_hora_salida" value="" placeholder="Ingrese hora de salida HH:MM:SS"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de retorno - Fecha Salida</p><input type="text" name="rl_fecha_salida" id="rl_fecha_salida" value="" placeholder="Ingrese fecha de salida DD/MM/AAAA"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de retorno - lugar Salida</p><input type="text" name="rl_lugar_salida" id="rl_lugar_salida" value="" placeholder="Ingrese lugar de salida"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de retorno - Hora llegada</p><input type="text" name="rl_hora_llegada" id="rl_hora_llegada" value="" placeholder="Ingrese hora de llegada HH:MM:SS" required />
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de retorno - Fecha llegada</p><input type="text" name="rl_fecha_llegada" id="rl_fecha_llegada" value="" placeholder="Ingrese fecha de llegada DD/MM/AAAA"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Vuelo de retorno - Lugar llegada</p><input type="text" name="rl_lugar_llegada" id="rl_lugar_llegada" value="" placeholder="Ingrese lugar de llegada"  required/>
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Valor boleto</p><input type="text" name="valor_boleto" id="valor_boleto" value="" placeholder="$$$(solo numeros sin puntos)" required />
                  </div>

                  <div class="6u$ 12u$(xsmall)">
                    <p>Numero boleto</p><input type="text" name="numero_boleto" id="numero_boleto" value="" placeholder="Indique numero de boleto" required/>
                  </div>

                  <div class="12u$">
                    <p>Observaciones</p>
                    <textarea name="observaciones" id="observaciones" placeholder="Ingrese alguna observación" rows="6"></textarea>
                  </div>
                  <?
                  $id = $_POST["id"];
                  $numero = $_POST["numero"]; 
                  $rut = $_POST["rut"];
                  
                  echo "<input type='hidden' name='id' value='$id'>";
                  echo "<input type='hidden' name='numero_orden' value='$numero'>"; 
                  echo "<input type='hidden' name='rut' value='$rut'>";  

                  echo "<p>$rut</p>";  
                  ?>

                  <div class="12u$">
                    <ul class="actions">
                      <li><input type="submit" onclick="return confirm('¿Seguro que los datos estan correctos?');" value="Ingresar Pasaje" class="special" /></li>
                    </ul>
                  </div>
                </div>
              </form>
          </header>

          <!-- Content -->
            
        </div>
      </div>

    <!-- Footer -->
      <footer id="footer">
        <ul class="copyright">
          <li>&copy; SpeedTravel. All rights reserved.</li>
          <li><p class="copy-right"><a href="http://cl.linkedin.com/in/feliperioss" style="text-decoration:none;"><span style="font: 80% Arial,sans-serif; color:#0783B6;"><img src="https://static.licdn.com/scds/common/u/img/webpromo/btn_in_20x15.png" width="20" height="15" alt="Ver el perfil de Felipe Rios en LinkedIn" style="vertical-align:middle;" border="0"></span>¿Quién hizo esto?</a></p></li>
        </ul>
      </footer>

  </body>
</html>
  