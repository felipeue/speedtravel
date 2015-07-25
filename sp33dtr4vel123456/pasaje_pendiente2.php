<?php
session_start();
if(!isset($_SESSION['rut'])) 
{
  header('Location: index.html'); 
  exit();
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
              <form method="post" action="pasaje_pendiente3.php">
                <div class="row uniform 50%">
                  <h2>Agrege una orden de compra pasa asociar este pasaje</h2>
                  <div class="6u 12u$(xsmall)">
                    <p>Numero de orden</p><input type="text" name="numero" id="numero" value="" placeholder="Numero" required/>
                  </div>
                  <div class="6u$ 12u$(xsmall)">
                    <p>Valor</p><input type="text" name="valor" id="valor" value="" placeholder="$$$(solo numeros sin puntos)" required/>
                  </div>
                  <div class="6u$ 12u$(xsmall)">
                    <p>Empresa</p><input type="text" name="empresa" id="empresa" value="" placeholder="Empresa" required />
                  </div>
                  <div class="6u$ 12u$(xsmall)">
                  <p>Día</p>
                  <select class="negro" size="1" name="dia">
              
                   <option value='1'>1</option>"; 
                   <option value='2'>2</option>"; 
                   <option value='3'>3</option>"; 
                   <option value='4'>4</option>"; 
                   <option value='5'>5</option>"; 
                   <option value='6'>6</option>"; 
                   <option value='7'>7</option>"; 
                   <option value='8'>8</option>"; 
                   <option value='9'>9</option>"; 
                   <option value='10'>10</option>"; 
                   <option value='11'>11</option>"; 
                   <option value='12'>12</option>"; 
                   <option value='13'>13</option>"; 
                   <option value='14'>14</option>"; 
                   <option value='15'>15</option>";
                   <option value='16'>16</option>"; 
                   <option value='17'>17</option>"; 
                   <option value='18'>18</option>"; 
                   <option value='19'>19</option>"; 
                   <option value='20'>20</option>"; 
                   <option value='21'>21</option>"; 
                   <option value='22'>22</option>"; 
                   <option value='23'>23</option>"; 
                   <option value='24'>24</option>"; 
                   <option value='25'>25</option>"; 
                   <option value='26'>26</option>"; 
                   <option value='27'>27</option>"; 
                   <option value='28'>28</option>"; 
                   <option value='29'>29</option>"; 
                   <option value='30'>30</option>"; 
                   <option value='31'>31</option>"; 
                    </select>
                  </div>
                          <div class="6u$ 12u$(xsmall)">
                  <p>Mes</p>
                  <select class="negro" size="1" name="mes">
              
                   <option value='enero'>Enero</option>"; 
                   <option value='febrero'>Febrero</option>"; 
                   <option value='marzo'>Marzo</option>"; 
                   <option value='abril'>Abril</option>"; 
                   <option value='mayo'>Mayo</option>"; 
                   <option value='junio'>Junio</option>"; 
                   <option value='julio'>Julio</option>"; 
                   <option value='agosto'>Agosto</option>"; 
                   <option value='septiembre'>Septiembre</option>"; 
                   <option value='octubre'>Octubre</option>"; 
                   <option value='noviembre'>Noviembre</option>"; 
                   <option value='diciembre'>Diciembre</option>"; 
                    </select>
                  </div>
                  <div class="6u 12u$(xsmall)">
                    <p>Año</p><input type="text" name="ano" id="numero" value="" placeholder="año" required/>
                  </div>
                    <div class="12u$">
                    <p>Detalle</p><textarea name="detalle" id="mensaje" placeholder="Comente detalle si es necesario" rows="6"></textarea>
                  </div>
                  <?
                   $id = $_POST["id"];
                   $rut = $_POST["rut"];
                  echo "<input type='hidden' name='id' value='$id'>";
                  echo "<input type='hidden' name='rut' value='$rut'>" ; 
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
