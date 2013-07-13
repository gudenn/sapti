<?php
/**
* @author          Guyen Campero<guyencu@gmail.com>
* @version         0.13.0.02
*/
class Notificacion extends Objectbase
{

 /**
  * Cosntantes para manejar los tipos
  */
 /** TIPO_MENSAJE mensaje normal  */
  const TIPO_MENSAJE    = 'N01';
 /** TIPO_TIEMPO mensaje de tiempo  */
  const TIPO_TIEMPO     = 'N02';

 /**
  * Cosntantes para manejar los estados de notificaion
  */
 /** EST_NOLEIDO no leido */
  const EST_NOLEIDO    = 'E01';
 /** EST_LEIDO leido */
  const EST_LEIDO      = 'E02';
 /** EST_ARCHIVO mensaje archivado */
  const EST_ARCHIVO    = 'E03';
 /** EST_ELIMINADO mensaje eliminado */
  const EST_ELIMINADO  = 'E04';
  
 /**
  * Codigo identificador del Del proyecto
  * @var INT(11)
  */
  var $proyecto_id;

 /**
  * Tipo de notificacion
  * Mensaje normal, Mensaje de tiempo se acaba, y otros 
  * consultad contantes
  * @var VARCHAR(45)
  */
  var $tipo;

  

 /**
  * Contenido del mensaje o notificacion
  * @var TEXT
  */
  var $detalle;
  

 /**
  * La Prioridad del mensaje 
  * siendo: 1  prioridad minima
  *         10 prioridad maxima
  * @var TEXT
  */
  var $prioridad;

 /**
  * El estado_notificacion del mensaje si fue leido si esta archivado si fue eliminado
  * Consultar constantes de estado
  * @var TEXT
  */
  var $estado_notificacion;


} 
