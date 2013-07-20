
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>EditableGrid Demo 4 - Database Link</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	</head>
	
	<body>
		<div id="wrap">
		<h1>EditableGrid Demo 4 - Database Link</h1> 
		
			<!-- Feedback message zone -->
			<div id="message"></div>

			<!-- Grid contents -->
			<div id="tablecontent"></div>
		
			<!-- Paginator control -->
			<div id="paginator"></div>
		</div>  
		
		<script src="js/editablegrid-2.0.1.js"></script>   
		<!-- I use jQuery for the Ajax methods -->
		<script src="js/jquery-1.7.2.min.js" ></script>
		<script src="js/demo.js" ></script>

		<script type="text/javascript">
			window.onload = function() { 
				datagrid = new DatabaseGrid();
			}; 
		</script>
	</body>

</html>
