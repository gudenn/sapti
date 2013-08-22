<?php

/**
 * Esta clase es para guardar los datos tipo Usuario
 *
 * @author Guyen Campero <guyencu@gmail.com>
 */
class Usuario  extends Objectbase 
{

 /**
  * Nombre del usuario
  * @var VARCHAR(100)
  */
  var $nombre;

 /**
  * Apellidos paterno y/o materno del usuario
  * @var VARCHAR(100)
  */
  var $apellidos;  

 /**
  * Email del estudiante
  * @var VARCHAR(100)
  */
  var $email;

 /**
  * Email del estudiante
  * @var DATE(100)
  */
  var $fecha_cumple;

 /**
  * Login del usuario
  * @var VARCHAR(45)
  */
  var $login;

 /**
  * Clave del usuario 
  * La clave del usuario minimo 5 digitos
  * @var VARCHAR(45)
  */
  var $clave;

 /**
  * CI del usuario
  * @var VARCHAR(45)
  */
  var $ci;

  /**
  * Sexo del usuario Puede ser M de Masculino o F de Femenino y en el futoro se puede manejas otros datos
  * @var VARCHAR(45)
  */
  var $sexo;
  
 /**
  * (Arreglo de objetos) El Tutor que esta asignado a este usuario
  * @var object|null 
  */
  var $tutor_objs;
  
 /**
  * (Arreglo de objetos) El Docente que esta asignado a este usuario
  * @var object|null 
  */
  var $docente_objs;
  
 /**
  * (Arreglo de objetos) El Tribunale que esta asignado a este usuario
  * @var object|null 
  */
  var $tribunal_objs;
  
 /**
  * (Arreglo de objetos) El estudiante que esta asignado a este usuario
  * @var object|null 
  */
  var $estudiante_objs;

  function getNombreCompleto($echo = false) 
  {
    $nombreCompleto = strtoupper("{$this->nombre} {$this->apellidos} ");
    if ($echo)
    {
      echo $nombreCompleto;
      return true;
    }
    return $nombreCompleto;
  }

  
  /**
   * Crear un usario a partir de su login o verificar que se puede usar un login
   * 
   * @param string $login el login
   * @param type $verSiEstaDisponible para solo verificar si es que se puede usar este email
   * @return boolean
   * @throws Exception 
   */
  public function getByLogin ($login, $verSifueTomado = false ) {
    $sql       = "select * from ".$this->getTableName()." where login = '$login'";
    $result = mysql_query($sql);
    if ($result === false)
      throw new Exception("?".$this->getTableName ()."&m=Cant getByEmail <br />$sql<br /> ".$this->getTableName() . ' -> '. mysql_error() );

    if ($verSifueTomado)
    {
      if (mysql_num_rows($result))
        throw new Exception("?login&m=Este login ya fue tomado");
      return;
    }

    $usuario = mysql_fetch_array($result,MYSQL_BOTH);
    self::__construct($usuario['id']);
    return true;
  }

  
  
  
  /**
   * Obtenemos los nombres y apellidos del usuario de una cadena 
   * @param string $nombreyapellidos cadena con el nombre y los appellidos ejemplo BASTO RODRIGUEZ PEDRO EDUARDO
   * @param string $delimiter un spacio por lo general
   * @return boolean
   */
  function parserNombreApellidos($nombreyapellidos = false,$delimiter = ' ') 
  {
    if (!$nombreyapellidos)
      return false;
    $array = explode($delimiter, $nombreyapellidos);
    switch (count($array)) {
      case 0:
        return false;
        break;
      case 3://BASTO RODRIGUEZ EDUARDO 
        $this->apellidos = $array[0] . ' ' . $array[1];
        $this->nombre    = $array[2];
        break;
      case 4://BASTO RODRIGUEZ PEDRO EDUARDO 
        $this->apellidos = $array[0] . ' ' . $array[1];
        $this->nombre    = $array[2] . ' ' . $array[3];
        break;
      default: //odos los otros casos
        $this->nombre    = $nombreyapellidos;
        break;
    }
    
  }

  /**
   * Validamos al usuario ya sea para actualizar o para crear uno nuevo
   * @param type $es_nuevo
   */
  function validar($es_nuevo = true) {
    leerClase('Formulario');
    Formulario::validar('ci'                ,$this->ci          ,'texto','El CI');
    Formulario::validar('nombre'            ,$this->nombre      ,'texto','El Nombre');
    Formulario::validar('apellidos'         ,$this->apellidos   ,'texto','Los Apellidos',TRUE);
    Formulario::validar('login'             ,$this->login      ,'texto','El Login');
    if ( $es_nuevo ) // nuevo
    {
      $this->getByLogin($this->login,true);
      Formulario::validarPassword('clave',$this->clave, isset($_POST['clave2'])?$_POST['clave2']:false ,TRUE);
    }
    else
    {
      $pas1 = isset($_POST['password1'])?$_POST['password1']:false;
      $pas2 = isset($_POST['password2'])?$_POST['password2']:false;
      $pas3 = isset($_POST['password3'])?$_POST['password3']:false;
      Formulario::validarCambioPassword('password',$this->clave,$pas1,$pas2,$pas3,true,'texto','La Clave de acceso',FALSE);
      $this->password = $pas2;
    }
    Formulario::validar_fecha('fecha_cumple',$this->fecha_cumple,TRUE);
  }
  
  

  /**
   * Inicia el filtro para el admin
   * @param Filtro $filtro el fitro que se usara en el admin
   */
  function iniciarFiltro(&$filtro) 
  {
    
    if (isset($_GET['order']))
      $filtro->order($_GET['order']);

    $filtro->nombres[] = 'Estado';
    $filtro->valores[] = array ('select','estado'  ,$filtro->filtro('estado'),
        array(''      ,'AC'         ,'NC'           ,'IN'          ,'DE'        ),
        array('Todos' ,'Confirmados','No Confirmado','Desctivado'  ,'Eliminado' ));
    $filtro->nombres[] = 'Nombre';
    $filtro->valores[] = array ('input' ,'nombre',$filtro->filtro('nombre'));
    $filtro->nombres[] = 'Apellidos';
    $filtro->valores[] = array ('input' ,'apellidos',$filtro->filtro('apellidos'));
    $filtro->nombres[] = 'Login';
    $filtro->valores[] = array ('input' ,'login',$filtro->filtro('login'));
    $filtro->nombres[] = 'Email';
    $filtro->valores[] = array ('input' ,'email',$filtro->filtro('email'));
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
    $order_array['nombre']              = " {$this->getTableName ()}.nombre ";
    $order_array['apellidos']           = " {$this->getTableName ()}.apellidos ";
    $order_array['login']               = " {$this->getTableName ()}.login ";
    $order_array['email']               = " {$this->getTableName ()}.email ";
    $order_array['estado']              = " {$this->getTableName ()}.estado ";
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
}

?>