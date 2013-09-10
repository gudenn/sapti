{include file="docente/header-sjq.tpl"}
<div class="wrapper row3">
  <div class="rnd">
    <div id="container">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">       	
        </head>
        
        <div id="wrap">
			<div id="tablecontent"></div>
        </div>
        <a href="evaluacion.estudiante-cvs.php" type="button">CARGAR NOTAS POR CVS</a>
        <script src="js/editablegrid-2.0.1.js"></script>   
	<script src="js/tablaeditable.js" ></script>
        <script type="text/javascript">
                    datagrid = new DatabaseGrid('evatd', {$docente_ids});
        </script>
        <style type="text/css">
        tr:nth-child(even) { background: #ddd }
        tr:nth-child(odd) { background: #fff}
        table {
        color: #666666;
        }
        </style>
        
    </div>
    {$ERROR}
  </div>
</div>
{include file="footer.tpl"}