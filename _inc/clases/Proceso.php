
<?php

class Proceso extends Objectbase 
{  

    var $titulop;
    var $autorp;
    var $tutorp;
    var $gestionp;
    
    function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);

   
    $filtro->nombres[] = 'titulo';
    $filtro->valores[] = array ('input' ,'titulo',$filtro->filtro('titulop'));
    $filtro->nombres[] = 'autor';
    $filtro->valores[] = array ('input' ,'autor',$filtro->filtro('autorp'));
    $filtro->nombres[] = 'tutor';
    $filtro->valores[] = array ('input' ,'tutor',$filtro->filtro('tutorp'));
    $filtro->nombres[] = 'gestion';
    $filtro->valores[] = array ('input' ,'gestion',$filtro->filtro('gestionp'));
  }

  /**
   * Devuelve el order para el SQL
   * @param array $order_array arreglo con las claves para el order
   * @return string
   */
  function getOrderString(&$filtro) 
  {
    $order_array                        = array();
    $order_array['id']                  = " {$this->getTableName ()}.id ";
    $order_array['titulop']              = " {$this->getTableName ()}.titulop ";
    $order_array['autorp']           = " {$this->getTableName ()}.autorp ";
    $order_array['tutorp']               = " {$this->getTableName ()}.tutorp ";
    $order_array['gestionp']               = " {$this->getTableName ()}.gestionp ";
   
    return $filtro->getOrderString($order_array);
  }

  /**
   * Filtramos para la busqueda usando un objeto Filtro
   * @param Filtro $filtro el objeto filtro
   * @return boolean
   */
  public function filtrar(&$filtro)
  {
    parent::filtrar($filtro);
    $filtro_sql = '';
    return $filtro_sql;
  }
            
    //put your code here
}

?>