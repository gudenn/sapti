<?php
//require_once(dirname(__FILE__)."/Object.php");
class Formulario {
  /**
    * Nombres de usuario no validos
    */
  const listaDeNombresNoValidos = "admin,administrator,cargoyellowpages,cargo,yellowpages,yellow";
  const VALIDTEXT = "a-zA-Z0-9'\-''\_''\(''\)''#''@''.'','';'':'' ''\s''\t''\n''&''<''>'áéíóúäëïöüñÑÁÉÍÓÚÄËÏÖÜ";

  
  public function __construct($code) {
    $this->code = $code;
  }
  
  /**
   * valida los valores del campo
   * @param type $id id del input para el mensaje
   * @param type $string Valor a verificar
   * @param type $tipo tipo de validacion puede ser: texto|texto_tags|tipo_id
   * @param type $nombre nombre del campo para personalizar los mensajes
   * @param type $vacio si se permite que este valor este vacio 1|0
   * @param type $mensaje mensaje que se mostrara en caso de error
   * @param type $mensaje_vacio mensaje que se mostrara en caso de que el campo este vacio
   * @param type $mensaje_noaceptado mensaje que se mostrara junto a los caracteres no aceptados
   * @return void
   * @throws Exception en caso de algun error se lanzara una exepcion
   */
  function validar($id,$string,$tipo,$nombre,$vacio = FALSE ,$mensaje = 'contiene caracteres no permitidos.',$mensaje_vacio ='no puede quedar vacio.', $mensaje_noaceptado = 'Por favor no use los siguientes caracteres:')
  {
    
    // no se permiten vacios
    if (trim($string) == "" && !$vacio)
      throw new Exception("?$id&m=$nombre $mensaje_vacio");
    switch ($tipo)
    {
      case "tipo_id":
        $TESTER     = "0-9";
        break;
      case "texto_tags":
        $TESTER     = Formulario::VALIDTEXT."'<''>'";
        break;
        case "texto":
      default:
        $TESTER     = Formulario::VALIDTEXT;
        break;
    }
    if ($string != preg_replace("/[^$TESTER]/", "", $string))
    {
      $no_aceptado = preg_replace("/[$TESTER]/", "", $string);
      $mensaje    .= "</br> $mensaje_noaceptado <span style=\'color:red;\'>$no_aceptado</span> ";
      throw new Exception("?$id&m=$nombre $mensaje");
    }
    return;
  }

  /**
   * Valida el pasword y el reingreso si son paswords correctos
   * @param type $id id del campo input
   * @param type $string1 clave 1
   * @param type $string2 clave 2
   * @param type $vallarge validar largo 1|0
   * @param type $tipo tipo texto
   * @param type $nombre como nos referiremos a este campo
   * @param type $vacio puede estar vacio
   * @param type $mensaje Mensaje de error
   * @param type $mensaje_vacio mensaje si esta vacio
   * @param type $mensaje_noaceptado mensaje de caracteres no aceptados
   * @return boolean
   * @throws Exception
   */
  public function validarPassword($id,$string1,$string2 = false ,$vallarge = false,$tipo = 'texto',$nombre = 'La Clave de acceso',$vacio = FALSE ,$mensaje = 'contiene caracteres no permitidos.',$mensaje_vacio ='no puede quedar vac&iacute;a.', $mensaje_noaceptado = 'Por favor no use los siguientes caracteres:') 
  {
    if ($vallarge && strlen($string1)<=5)
      throw new Exception("?$id&m=$nombre debe ser de al menos 6 caracteres");
    if ($string2 !== false) // bandera para comparar los 2 paswords
      if ($string1 != $string2)
        throw new Exception("?$id&m=Las Claves de ingreso no coinciden");
    Formulario::validar($id,$string1,$tipo,$nombre,$vacio,$mensaje,$mensaje_vacio, $mensaje_noaceptado);
    return true;
  }

  /**
   * Valida el cambio de password
   * @param type $string1 pass1
   * @param type $string2 pass2
   * @return boolean si pasa o no
   * @throws Exception 
   */
  /**
   * 
   * @param type $id id del campo input
   * @param type $actual password actual 
   * @param type $old password antiguo ingresado por el usuario
   * @param type $new nuevo password
   * @param type $new2 reingreso del nuevo passwod
   * @param type $vallarge validar el largo
   * @param type $tipo tipo de validacion
   * @param type $nombre nombre del campo, para mostrar en los mensajes
   * @param type $vacio
   * @param type $mensaje
   * @param type $mensaje_vacio
   * @param type $mensaje_noaceptado
   * @throws Exception
   */
  public function validarCambioPassword($id,$actual,$old,$new = false, $new2 = false ,$vallarge = false,$tipo = 'texto',$nombre = 'La Clave de acceso',$vacio = FALSE ,$mensaje = 'contiene caracteres no permitidos.',$mensaje_vacio ='no puede quedar vac&iacute;a.', $mensaje_noaceptado = 'Por favor no use los siguientes caracteres:')
  {
    if ($actual != $old)
      throw new Exception("?".$id."1&m=La Clave no corresponde a un usuario");
    //que no este vacio
    Formulario::validar($id."1",$old,$tipo,$nombre,$vacio,$mensaje,$mensaje_vacio, $mensaje_noaceptado);
    if ($new)
      Formulario::validarPassword($id."2",$new,$new2,$vallarge,$tipo,'La Nueva Clave de acceso',FALSE ,'contiene caracteres no permitidos.','no puede quedar vac&iacute;a.','Por favor no use los siguientes caracteres:');
  }
  
  /**
   * Verifica un email
   * @param type $string email
   * @param type $verificarDuplicados verifica si hay usuarios usando el mismo email
   * @return boolean si es que el email esta bien responde true
   * @throws Exception si existen problemas
   */
  //$id,$string,$tipo,$nombre,$vacio,$mensaje = 'contiene caracteres no permitidos',$mensaje_vacio ='no puede quedar vacio.'
  public function validarEmail($id,$string,$verificarDuplicados = true,$vacio = false,$mensaje = 'Por favor ingrese un E-mail valido.',$mensaje_vacio ='no puede quedar vacio.') {
    if (trim($string) == "" && !$vacio)
      throw new Exception("?$id&m=El E-mail $mensaje_vacio");
    //$string = "first.last@domain.co.uk";
    //if (preg_match('/^[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$string)) 
    if (preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/",$string)) 
    {
      if ($verificarDuplicados)
      {
        $user = new Usuario();
        if ($user->getByEmail($string,true))
          throw new Exception("?$id&m=Este E-mail ya fue tomado");
      }
      return true;
    }
    throw new Exception("?$id&m=$mensaje");
  }
  
  /**
   * Verifica una fecha
   * @param date $string fecha del tipo (mm/dd/yyyy)
   * @return boolean
   * @throws Exception 
   */
    public function validar_fecha($id,$string,$vacio,$mensaje = 'Ingrese una fecha v&aacute;lida.',$mensaje_vacio ='no puede quedar vacia.') {
    if (trim($string) == "" && !$vacio)
      throw new Exception("?$id&m=Esta fecha $mensaje_vacio");
    if (strpos($string,'/') === FALSE )
      throw new Exception("?$id&m=$mensaje");
    list( $day, $month, $year ) = explode( '/', $string );
    $day_int   = $day * 1;
    $month_int = $month * 1;
    $year_int  = $year * 1;
    if ("$day_int/$month_int/$year_int" != date("j/n/Y", mktime(0, 0, 0, $month, $day, $year)))
      throw new Exception("?$id&m=$mensaje");
    return true;
  }
}