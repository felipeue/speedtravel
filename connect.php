<?php
$conn = mysql_connect('localhost','root','8192198')or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db('speedtravel')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
mysql_query("SET NAMES 'utf8'");
?>