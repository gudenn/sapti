<?php
  require_once("_inc/_sistema.php");
  
  /** Smarty */
  require(DIR_LIB.'/smarty/Smarty.class.php');
  Smarty::muteExpectedErrors();

  
  $ERROR  = "";
  $smarty = new Smarty;
  $smarty->template_dir = TEMPLATES_DIR;
  $smarty->compile_dir  = SMARTY_COMPILEDIR;
  $smarty->config_dir   = SMARTY_CONFIGDIR;
  $smarty->cache_dir    = SMARTY_CACHEDIR;

  //$smarty->force_compile = true;
  $smarty->debugging      = false;
  $smarty->caching        = false;
  $smarty->cache_lifetime = 120;

?>