
<?php

class Postergado extends Objectbase 
{  

    var $titulo;
    var $autor;
    var $tutor;
    var $gestion;
    
    function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);

   
    $filtro->nombres[] = 'titulo';
    $filtro->valores[] = array ('input' ,'titulo',$filtro->filtro('titulo'));
    $filtro->nombres[] = 'autor';
    $filtro->valores[] = array ('input' ,'autor',$filtro->filtro('autor'));
    $filtro->nombres[] = 'tutor';
    $filtro->valores[] = array ('input' ,'tutor',$filtro->filtro('tutor'));
    $filtro->nombres[] = 'gestion';
    $filtro->valores[] = array ('input' ,'gestion',$filtro->filtro('gestion'));
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
    $order_array['titulo']              = " {$this->getTableName ()}.titulo ";
    $order_array['autor']           = " {$this->getTableName ()}.autor ";
    $order_array['tutor']               = " {$this->getTableName ()}.tutor ";
    $order_array['gestion']               = " {$this->getTableName ()}.gestion ";
   
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