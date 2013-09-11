<?php
/**
 * Clase de apoyo para generar html
 */
class Html
{ 
  
  /**
   * 
   * @param array $mensaje array('mensaje'=>'ete sera el mensaje mensaje' ,'titulo'=>'ete sera el titulo mensaje' , 'icono'=>'ete sera el icono', 'fecha'=>'ete sera el icono', 'autor'=>'ete sera el icono' , 'tipo'=> 'el tipo de mensaje Error,Bien , Normal ' , y veremos que mas se puede usar)
   * @param type $tipo
   */
  function getMessageBox($mensaje) 
  {
    ob_start();
    ?>
    <div  style='display:none'>
      <div id="comments">
        <h2><?php echo (isset($mensaje['titulo']))?$mensaje['titulo']:'Mensaje'; ?></h2>
        <ul class="commentlist">
          <li class="comment_odd">
            <div class="author"><img class="avatar" src="<?php echo URL_IMG ?>icons/basicset/<?php echo (isset($mensaje['icono']))?$mensaje['icono']:'info_48.png'; ?>" width="32" height="32" alt=""><span class="name"><a href="#"><?php echo (isset($mensaje['autor']))?$mensaje['autor']:'SAPTI'; ?></a></span> <span class="wrote"> informa:</span></div>
            <div class="submitdate"><a href="#"><?php echo (isset($mensaje['fecha']))?$mensaje['fecha']:date('j \d\e F \d\e Y, g:i a'); ?></a></div>
            <p><?php echo (isset($mensaje['mensaje']))?$mensaje['mensaje']:''; ?></p>
          </li>
        </ul>
      </div>
    </div>
    <a class='inline' href="#comments" style="color:#fff">v</a>
    <script type="text/javascript">
      var verificado = false;
      jQuery(function(){
        $(".sClose").click(function (){
          $('#cboxOverlay').click();
        });
      });
      jQuery(function(){
        jQuery(".inline").colorbox({inline:true, width:"600px"});
        jQuery(".inline").click();
      });
    </script>
    <?php
    $mensaje_OUT = ob_get_contents();
    ob_end_clean();
    return $mensaje_OUT;
  }
}

?>