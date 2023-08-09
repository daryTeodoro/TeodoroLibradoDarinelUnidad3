<?php
date_default_timezone_set('America/Monterrey');
$horaActualMexico = date('h') - 1 . ':' . date('i');
$dia = date('d');
$dia_letras = date('l');

$dia_letras_espanol = '';
switch ($dia_letras) {
  case 'Monday':
  $dia_letras_espanol = 'Lunes';
  break;
  case 'Tuesday':
  $dia_letras_espanol = 'Martes';
  break;
  case 'Wednesday':
  $dia_letras_espanol = 'Miércoles';
  break;
  case 'Thursday':
  $dia_letras_espanol = 'Jueves';
  break;
  case 'Friday':
  $dia_letras_espanol = 'Viernes';
  break;
  case 'Saturday':
  $dia_letras_espanol = 'Sábado';
  break;
  case 'Sunday':
  $dia_letras_espanol = 'Domingo';
  break;
}

$mes = strftime('%B');
$mes_espanol = '';
switch ($mes) {
  case 'January':
  $mes_espanol = 'Enero';
  break;
  case 'February':
  $mes_espanol = 'Febrero';
  break;
  case 'March':
  $mes_espanol = 'Marzo';
  break;
  case 'April':
  $mes_espanol = 'Abril';
  break;
  case 'May':
  $mes_espanol = 'Mayo';
  break;
  case 'June':
  $mes_espanol = 'Junio';
  break;
  case 'July':
  $mes_espanol = 'Julio';
  break;
  case 'August':
  $mes_espanol = 'Agosto';
  break;
  case 'September':
  $mes_espanol = 'Septiembre';
  break;
  case 'October':
  $mes_espanol = 'Octubre';
  break;
   case 'November':
  $mes_espanol = 'Noviembre';
  break;
  case 'December':
  $mes_espanol = 'Diciembre';
  break;
}
  
$anio = date('Y');
echo '<b>'.$dia_letras_espanol.'</b>';
echo '<h1>'. $horaActualMexico .'</h1>';
echo '<b>'.$dia.'/'.$mes_espanol.'/'.$anio.'</b>';
?>