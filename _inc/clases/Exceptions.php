<?php
class Boxception extends Exception
{
  public function errorMessage()
  {
    //error message
    $errorMsg = $this->getMessage().' is not a valid E-Mail address.';
    return $errorMsg;
  }
}
function handleError($e = '')
{
  $mensaje = $e->getMessage();
  $trozos  = explode("&", $mensaje,2);
  
  $id      = str_replace ("?","",$trozos[0]);
  $ERROR   = str_replace ("m=","",$trozos[1]);
  $ERROR   = <<<ERROR
  <script type="text/javascript">
    console.log('$ERROR');
    jQuery(document).ready(function(){
      jQuery('#$id').validationEngine('showPrompt', '$ERROR', 'error', true);
    });
  </script>
ERROR;
  return $ERROR;
  
}


?>