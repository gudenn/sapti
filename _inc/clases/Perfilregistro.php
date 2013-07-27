<?php

class Perfilregistro extends Objectbase
{
    /*
     * Numero del perfil
     * @INT(10)
     */
    var $numero;
    
    /*
     * telefono
     * @INT(10) 
     */
    var $telefono;
    
    /*
     * Trabajo En conjunto
     * @VARCHAR(45)
     */
    var $trabajoconjunto;
    /*
     * Gestion de Aprobacion de perfil dirigido
     * @VARCHAR(45) 
     */
    var $gestionaprobacion;
    /*
     * Cambio de tema
     * @VARCHAR(45)
     */
    var $cambiotema;
    /*
     * Titulo del perfil
     * @VARCHAR(45)
     */
    var $titulo; 
   
    /*
     * Objetivo General del perfil
     * @VARCHAR(45)
     */
    var $objetivogeneral;
    /*
     * Objetivo Especifico del perfil
     * @VARCHAR(45)
     */
    var $objetivoespecifico;
    /*
     * Descripcion del p
     * @VARCHAR(45)
     */
    var $descripcionperfil;
    /*
     * Formulario de Aprobacion del proyecto
     * @TEXT(10000)
     */
    var $formularioaprobacion;
    /*
     * Nombre del encargado de registro del proyecto
     * @VARCHAR(45)
     */
    var $registradopor;
    var $fecharegistro;
    var $proyecto_id;
    var $sub_area_id;
    var $carrera_id;
    var $modalidad_id;
    var $institucion_id;
    var $usuario_id;
    var $docente_id;
    var $tutor_id;
    var $estudiante_id;
    var $area_id;
      
}

?>
