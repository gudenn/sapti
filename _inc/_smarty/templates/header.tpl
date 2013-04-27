<!DOCTYPE HTML>
<html  lang="es">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>{$title}</title>
    <meta name="description" content="{$description}" />
    <meta name="keywords" content="{$keywords}" />

    {section name=css_i loop=$CSS}
      <link rel="stylesheet" href="{$CSS[css_i]}" type="text/css" />
    {/section}
    <link href="css/blue_t/templatemo_style.css" rel="stylesheet" type="text/css" />

    {section name=js_i loop=$JS}
      <script type="text/javascript" src="{$JS[js_i]}"></script>
    {/section}

  </head>
<body>
  <div id="templatemo_wrapper">
  <div id="templatemo_header">
    <div id="site_title">
      <h1><a href="" >Proyecto</a><span >Sistema para dar soporte al proceso de titulacion</span></h1>
    </div> <!-- end of site_title -->
  </div> <!-- end of header -->
      <div id="templatemo_menu">
        <ul>
          <li><a href="" class="current">INICIO</a></li>
          <li><a href="">REGISTRO</a></li>
        </ul> 
      </div> <!-- end of templatemo_menu -->

      <div id="templatemo_banner" style="height: 24px;">
        <h2 style="color:#FFF;text-align: center">
          Sistema para dar soporte al proceso de titulacion y a las materias de perfil y proyecto de grado
        </h2>
      </div>
      <div id="templatemo_main"><span class="main_top"></span> 