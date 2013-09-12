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
    var $apellidos;
    var $nombres;
    var $telefono;
    var $email;
    /*
     * Trabajo En conjunto
     * @VARCHAR(45)
     */
    var $trabajoconjunto;
    
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
    var $descripcion;
    /*
     * Formulario de Aprobacion del proyecto
     * @TEXT(10000)
     */
    var $formulariopdf;
    /*
     * Nombre del encargado de registro del proyecto
     * @VARCHAR(45)
     */
    var $registradopor;
    var $fecharegistro;
    var $estado;
    var $sub_area_id;
    var $carrera_id;
    var $modalidad_id;
    var $institucion_id;
    var $area_id;
    var $tutor_id;
    var $estudiante_id;
    var $docente_id;
    var $semestre_id;

    function validar($es_nuevo = true) {
    leerClase('Formulario');
    Formulario::validar('codigo_sis', $this->codigo_sis, 'texto', 'El Codigo SIS');
    if ($es_nuevo) // nuevo
      $this->getByCodigoSis($this->codigo_sis, true);
  }
  /*
  $(function(){
       $('#formInscripcion').validate({
           rules: {
           'nombre': 'required',
           'apellido': 'required',
           'numero_identidad': { required: true, number: true },
           'email': { required: true, email: true },
           'tipo_identidad': 'required',
           'deportes[]': { required: true, minlength: 1 }
           },
       messages: {
           'nombre': 'Debe ingresar el nombre',
           'apellido': 'Debe ingresar el apellido',
           'numero_identidad': { required: 'Debe ingresar el número de documento de identidad', number: 'Debe ingresar un número' },
           'email': { required: 'Debe ingresar un correo electrónico', email: 'Debe ingresar el correo electrónico con el formato correcto. Por ejemplo: u@localhost.com' },
           'tipo_identidad': 'Debe ingresar el número de documento',
           'deportes[]': 'Debe seleccionar mínimo un deporte'
       },
       debug: true,
       /*errorElement: 'div',*/
       //errorContainer: $('#errores'),
  //     submitHandler: function(form){
  //         alert('El formulario ha sido validado correctamente!');
 //      }
//    });
//});
  

 /* 
  function validarSiNumero(object)
{
numero = object.value;
if (!/^([0-9])*$/.test(numero))
object.value = numero.substring(0,numero.length-1);
}
  * /*
  */
 /* 
  function ValidaSoloNumeros()
  {
  if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
   }
*/
  
}

?>
