<!DOCTYPE HTML>
<html  lang="es">
  <head>
    <title>{$title}</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="imagetoolbar" content="no" />

    <meta name="description" content="{$description}" />
    <meta name="keywords" content="{$keywords}" />
<link href="{$URL_CSS}css/multi-select.css" media="screen" rel="stylesheet" type="text/css" />
 <link href="{$URL_CSS}css/application.css" media="screen" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{$URL_CSS}academic/layout.css" type="text/css" />
    {section name=css_i loop=$CSS}
      <link rel="stylesheet" href="{$CSS[css_i]}" type="text/css" />
    {/section}

    {section name=js_i loop=$JS}
      <script type="text/javascript" src="{$JS[js_i]}"></script>
    {/section}
    
    <script type="text/javascript" src="{$URL_JS}js/jquery.js"></script>
<script type="text/javascript" src="{$URL_JS}js/jquery.multi-select.js"></script>
<script type="text/javascript" src="{$URL_JS}js/application.js"></script>
<script type="text/javascript" src="{$URL_JS}js/jquery.validate.min"></script>


</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="{$URL}">SAPTI</a></h1>
      <p>Licenciatura en Ingenier&iacute;a De Sistemas.</p>
    </div>
    {include file="docente/menu.up.derecha.tpl"}
  </div>
</div>
{include file="docente/menu.topnav.tpl"}
