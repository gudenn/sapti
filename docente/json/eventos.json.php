<?php
header('Content-type: text/json');
require('../../_inc/_sistema.php');
conectar_db();
leerClase("Evento");
if ( isset($_GET['year']) && isset($_GET['month']) && isset($_GET['day']) )
{
  $evento = new Evento();
  $evento->estado = 'AC';
  $filter = '';
  $order  = '';
  $limit  = '';
  $rsal   = '';
  if ( isset($_GET['limit']) && $_GET['limit'] )
    $limit  = " limit {$_GET['limit']} ";
    
  if ( $_GET['year'] && $_GET['month'] && $_GET['day'] )
  {
      $month      = $_GET['month'] + 1;
  }

    //$month      = $_GET['month'] + 1;
    $month      = $_GET['month'];

    $evento->fecha_evento = "{$_GET['day']}/{$month}/{$_GET['year']}";
  }
  // para un solo mes
  elseif ( $_GET['year'] && $_GET['month'] && !$_GET['day'] )
  {

    $month      = $_GET['month']+1;

    $month      = $_GET['month'];

    $year       = $_GET['year'];
    $day        = date('d',  mktime(0, 0, 0, $month, 1, $year));
    $day_end    = date('t',  mktime(0, 0, 0, $month, 1, $year));
    $date_start = Objectbase::dateHumanToSQl("{$day}/{$month}/{$year}");
    $date_end   = Objectbase::dateHumanToSQl("{$day_end}/{$month}/{$year}");
    $filter     = " AND evento.fecha_evento  >=  '{$date_start}' AND evento.fecha_evento  <=  '{$date_end}' ";


    }

  // para la primera carga de pagina
  else
  {
    $order      = ' ORDER BY evento.fecha_evento ASC ';
    $month      = date('m');
    $year       = date('Y');
    $day        = date('d',  mktime(0, 0, 0, $month, 1, $year));
    $date_start = Objectbase::dateHumanToSQl("{$day}/{$month}/{$year}");
    $filter     = " AND evento.fecha_evento  >=  '{$date_start}' ";
  }
      $sql1="
            SELECT *
            FROM evento
            WHERE evento.dicta_id=4
            ".$filter."
            ".$order."
            ";

  $result = mysql_query($sql1);
 $result = mysql_query($sql1);
 $i=2;
  if ($result)
  while ($row = mysql_fetch_array($result)) 
  {
      $separador='';
      if($i<=mysql_num_rows($result)){
      $separador=',';
      }
  	$rsal .= <<<______SALIDAS
<<<<<<< HEAD
      \n{ "date": "{$row['fecha_evento']} 08:00:00", "type": "Evento", "title": "{$row['asunto']}", "description": "{$row['descripcion']}", "url": "" }{$separador}
=======
      \n{ "date": "{$row['fecha_evento']} 14:00:00", "type": "Evento", "title": "ola", "description": "Salida desde Miami a mas", "url": "http://www.event3.com/" }{$separador}
>>>>>>> origin/master
______SALIDAS;
      $i++;
  }
  echo "[{$rsal}]";

?>