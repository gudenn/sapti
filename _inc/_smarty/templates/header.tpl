<!DOCTYPE HTML>
<html  lang="es">
  <head>
    <title>{$title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />

    <meta name="description" content="{$description}" />
    <meta name="keywords" content="{$keywords}" />

    {section name=css_i loop=$CSS}
      <link rel="stylesheet" href="{$CSS[css_i]}" type="text/css" />
    {/section}

    {section name=js_i loop=$JS}
      <script type="text/javascript" src="{$JS[js_i]}"></script>
    {/section}

<link rel="stylesheet" href="{$URL_CSS}academic/layout.css" type="text/css" />
<!-- Homepage Specific Elements -->
<script type="text/javascript" src="{$URL_JS}academic/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="{$URL_JS}academic/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="{$URL_JS}academic/jquery.tabs.setup.js"></script>
<!-- End Homepage Specific Elements -->
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.html">Academic Education</a></h1>
      <p>Free CSS Website Template</p>
    </div>
    <div class="fl_right">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">A - Z Index</a></li>
        <li><a href="#">Student Login</a></li>
        <li class="last"><a href="#">Staff Login</a></li>
      </ul>
      <form action="#" method="post" id="sitesearch">
        <fieldset>
          <strong>Search:</strong>
          <input type="text" value="Search Our Website&hellip;" onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="image" src="{$URL_IMG}/academic/search.gif" id="search" alt="Search" />
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div class="rnd">
    <!-- ###### -->
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="style-demo.html">Style Demo</a></li>
        <li><a href="full-width.html">Full Width</a></li>
        <li><a href="3-columns.html">3 Columns</a></li>
        <li><a href="portfolio.html">Portfolio</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="#">This a very long link</a></li>
        <li class="last"><a href="#">This is the last</a></li>
      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>
