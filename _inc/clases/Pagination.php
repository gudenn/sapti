<?php 
/**
* This is based in the SESSION vars
* $clave = save the pag options change for other scenarios
* $_SESSION[$clave]['pg'] actual page
* $_SESSION[$clave]['pp'] number of rows per page
* $_SESSION[$clave]['tp'] total of pages
*/



class Pagination {
  const First    = "&laquo;Primer";
  const Prev     = "&laquo;Previo";
  const Next     = "Siguiente&raquo;";
  const Last     = "Ultimo&raquo;";
  const To       = "a";
  const Of       = "de";
    
  var $selc_combo; // get the option of the selector 
  var $link_pages; // get the link footer pagination
  var $ses_pg;     // current page
  var $ses_pp;     // rows per page
  var $ses_tp;     // total of pages
  var $ses_to;     // total de registros
  var $objs;       // the object content the number of rows that correspond

  /**
  * Si es para html los links del paginado se haran de una manera y si es para php se haran de otra  manera
  * @var type string
  */
  var $html_php    = "";
  /**
   * Crea un objeto que sera la barra de navergacion por paginas
   * @param type $result el resultado mysql-recurso
   * @param type $clave clave de session 
   * @param type $w_like para agregar un filtro
   * @param type $sera_html_y_no_php para grabar un HTML o interACTUAR con un php
   * @param type $pp nomero de registros por pagina
   */
  public function  __construct($result , $clave = 'leads', $w_like = '' , $sera_html_y_no_php = true ,$pp = 30)
  {
    

    if ($sera_html_y_no_php)
      $this->html_php = 'HTML';
    else
      $this->html_php = 'PHP';

    //pagination ROWs Per Page -> pp
    $records_combo = '<option value="10" >10  Records Per Page</option>';

    $_SESSION[$clave]['lk'] = self::getLK($clave);

    if (!isset($_SESSION[$clave]['pp']))
      $_SESSION[$clave]['pp'] = $pp;                            // defauld
    elseif($pp != $_SESSION[$clave]['pp'])
      $_SESSION[$clave]['pp'] = $pp;                            // defauld si es que cambia

    if (isset($_GET['pp']))
    {
      $_SESSION[$clave]['pp'] = (int)($_GET['pp']);            // int to avoid the SQL inyection
      $_SESSION[$clave]['pg'] = 1;                             // reset the page number
      if ($_SESSION[$clave]['pp'] < 10 ) $_SESSION[$clave]['pp'] = 10; // def
      $records_combo  = '<option value="'.$_SESSION[$clave]['pp'].'" >'.$_SESSION[$clave]['pp'].'  Records Per Page</option>';
    }

    $records_combo  = '<option value="'.$_SESSION[$clave]['pp'].'" >'.$_SESSION[$clave]['pp'].'  Records Per Page</option>';

    //pagination Actual Page -> pg
    if (!isset($_SESSION[$clave]['pg']) || ! isset($_GET['pg']))
      $_SESSION[$clave]['pg'] = 1;                             // def value
    elseif (isset($_GET['pg']))
      $_SESSION[$clave]['pg'] = (int)($_GET['pg']);            // int to avoid the sql inyection

    //total of rows
    $_SESSION[$clave]['tp'] = 1; 
    $mysql_num_rows = mysql_num_rows($result);
    if ($mysql_num_rows)
      $_SESSION[$clave]['tp'] = (int)(($mysql_num_rows / $_SESSION[$clave]['pp']) + 0.99); // cast the total of rows
    if ($_SESSION[$clave]['pg'] > $_SESSION[$clave]['tp'])
      $_SESSION[$clave]['pg'] = $_SESSION[$clave]['tp'];


    $rows    = array();
    $n_rows  = $_SESSION[$clave]['pp'];
    $start   = 0;
    //$start   = ($_SESSION[$clave]['pg'] - 1 ) * $_SESSION[$clave]['pp'];
    $start   = ($_SESSION[$clave]['pg'] - 1 )* $_SESSION[$clave]['pp'];
    ////////////////////////////////
    //for ($i =  mysql_num_rows($result) - 1; $i >= 0; $i--) {
    for ($i = $start; $i < ($start + $n_rows); $i++) {
      if ($i >= $mysql_num_rows)
        break;
      if (!mysql_data_seek($result, $i)) {
        break;
      }

      if (!($row = mysql_fetch_assoc($result))) {
        continue;
      }
      $rows[] = $row;
    }
    ////////////////////////////////


    // first prev 1 2 3 ... 8 9 10 11 12 ... 78 79 80 next last
    $p_pages   = array();
    // the first elemnet
    if (1 != $_SESSION[$clave]['pg'])
      $p_pages[] = '<span><a href="'.self::getUrlLink(1).'" class="tajax" >'.Pagination::Prev.'</a></span>';
    else
      $p_pages[] = '<span class="nextprev">'.Pagination::First.'</span>';

    if (1 != $_SESSION[$clave]['pg'])
      $p_pages[] = '<span><a href="'.self::getUrlLink($_SESSION[$clave]['pg']-1).'" class="tajax" >'.Pagination::Prev.'</a></span>';
    else
      $p_pages[] = '<span class="nextprev">'.Pagination::Prev.'</span>';

    $n_fisrt  = 3;
    $n_before = 2;
    $n_last   = 3;
    $n_after  = 2;

    $ncontrol = $n_fisrt + $n_before + 1;
    $ncontro2 = $n_after + $n_last;

    // the fisrt $n_fisrt elements
    for ($i = 1;$i <= $n_fisrt;$i++)
    {
      if ($_SESSION[$clave]['pg'] > $i )
        $p_pages[] = "<span><a href=\"".self::getUrlLink($i)."\" class=\"tajax\" >$i</a></span>";
    }
    if ($_SESSION[$clave]['pg'] > $ncontrol)
      $p_pages[] = '<span class="nextprev">...</span>';

    // $n_before elements before the current
    for ($i = $_SESSION[$clave]['pg'] - $n_before; $i < $_SESSION[$clave]['pg'] ; $i++)
    {
      //dont repeat elements
      if ($i > $n_fisrt)
        $p_pages[] = "<span><a href=\"".self::getUrlLink($i)."\"  class=\"tajax\" >$i</a></span>";
    }

    //Current element
    $p_pages[] = "<span class=\"current\">".$_SESSION[$clave]['pg']."</span>";

    // $n_after elements after the current
    for ($i = $_SESSION[$clave]['pg'] + 1; $i < $_SESSION[$clave]['pg'] + $n_after + 1; $i++)
    {
      //dont repeat elements
      if ($i < $_SESSION[$clave]['tp'] - $n_last + 1)
        $p_pages[] = "<span><a href=\"".self::getUrlLink($i)."\"  class=\"tajax\" >$i</a></span>";
    }

    //the last $n_last elemnets
    if ($_SESSION[$clave]['pg'] < $_SESSION[$clave]['tp'] - $ncontro2)
      $p_pages[] = '<span class="nextprev">...</span>';
    for ($i = $_SESSION[$clave]['tp'] - $n_last + 1; $i <= $_SESSION[$clave]['tp']; $i ++ )
    {
      if ($_SESSION[$clave]['pg'] < $i )
        $p_pages[] = "<span><a href=\"".self::getUrlLink($i)."\" class=\"tajax\" >$i</a></span>";
    }
    if ($_SESSION[$clave]['pg'] < $_SESSION[$clave]['tp'])
    {
      $p_pages[] = '<span><a href="'.self::getUrlLink($_SESSION[$clave]['pg']+1).'"  class="tajax" >'.Pagination::Next.'</a></span>';
      $p_pages[] = '<span><a href="'.self::getUrlLink($_SESSION[$clave]['tp']).'"  class="tajax" >'.Pagination::Last.'</a></span>';
    }
    else
    {
      $p_pages[] = '<span class="nextprev">'.Pagination::Next.'</span>';
      $p_pages[] = '<span class="nextprev">'.Pagination::Last.'</span>';
    }
    
    //$this->show_totales;
            
    $anterior  = (($_SESSION[$clave]['pg']-1) * $_SESSION[$clave]['pp']) + 1;
    $atual     = $_SESSION[$clave]['pg']     * $_SESSION[$clave]['pp'];
    $atual     = ($atual > $mysql_num_rows )?$mysql_num_rows:$atual;
    $p_pages[] = '<span class="nextprev" > '.$anterior.' '.Pagination::To.' '.$atual.' '.Pagination::Of.' '.$mysql_num_rows.' </span>';
    
    $this->p_pages     = $p_pages;
    $this->selc_combo  = $records_combo;
    $this->link_pages  = $p_pages;
    $this->ses_pg      = $_SESSION[$clave]['pg'];
    $this->ses_pp      = $_SESSION[$clave]['pp'];
    $this->ses_tp      = $_SESSION[$clave]['tp'];
    $this->ses_to      = $mysql_num_rows;
    $this->ses_lk      = $_SESSION[$clave]['lk'];
    $this->objs        = $rows;

  }//end construcctor



  /**
  * GEt hte like key
  */
  public function getUrlLink($number_page = '1')
  {
    
    if ($this->html_php == 'PHP')
      return self::getUrlLinkPHP($number_page);
    $USL = Html::folder.'/';
    if ($number_page < 10)
      $number_page = "0$number_page";
    return URL .$USL. to_dir($_SESSION['country']) .'/'.to_dir($_SESSION['city'])."/page_$number_page.html";
  }

  /**
  * GEt hte like key
  */
  public function getUrlLinkPHP($number_page = '1')
  {
    return "?pg=$number_page";
  }

  /**
  * GEt hte like key
  */
  public function getLK($clave = 'leads')
  {
    if (!isset($_SESSION[$clave]['lk']))
      $_SESSION[$clave]['lk'] = 'All';
    if (isset($_GET['lk']))
    {
      if ($_GET['lk'] != $_SESSION[$clave]['lk'])
        $_SESSION[$clave]['pg'] = 1;
      $_SESSION[$clave]['lk'] = strlen($_GET['lk']) > 3?'All':$_GET['lk']; // 3 characters to avoid the SQL INY
    }
    return $_SESSION[$clave]['lk'];
  }
  /**
  * Save the Like key
  */
  public function setLK($LK , $clave = 'leads')
  {
    $_SESSION[$clave]['lk'] = $LK;

  }


  /**
  * Get the lk links
  * 
  * @param string $clave where will store the pag var, each page like leasd people must have his owm secction 
  * @return array $pg_likes
  */
  public function getLKLinks($clave = 'leads',$LKs = array())
  {
    $pg_likes = array();
    $actual   = self::getLK($clave);
    if (count($LKs) == 0)
      $LKs  = array('All','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    foreach($LKs as $LK)
    {
      if ($LK == $actual)
        $pg_likes[] = "<span class=\"current\">$LK</span>";
      else
        $pg_likes[] = "<span><a href=\"?lk=$LK\"  class=\"tajax\" >$LK</a></span>";
    }
    return $pg_likes;
  }
}