/**
 *  highlightRow and highlight are used to show a visual feedback. If the row has been successfully modified, it will be highlighted in green. Otherwise, in red
 */
function highlightRow(rowId, bgColor, after)
{
	var rowSelector = $("#" + rowId);
	rowSelector.css("background-color", bgColor);
	rowSelector.fadeTo("normal", 0.5, function() { 
		rowSelector.fadeTo("fast", 1, function() { 
			rowSelector.css("background-color", '');
		});
	});
}

function highlight(div_id, style) {
	highlightRow(div_id, style == "error" ? "#e5afaf" : style == "warning" ? "#ffcc00" : "#8dc70a");
}
        
/**
   updateCellValue calls the PHP script that will update the database. 
 */
function updateCellValue(editableGrid, rowIndex, columnIndex, oldValue, newValue, row, onResponse)
{      
	$.ajax({
		url: 'update.php',
		type: 'POST',
		dataType: "html",
		data: {
			tablename : editableGrid.name,
			id: editableGrid.getRowId(rowIndex), 
			newvalue: editableGrid.getColumnType(columnIndex) == "boolean" ? (newValue ? 1 : 0) : newValue, 
			colname: editableGrid.getColumnName(columnIndex),
			coltype: editableGrid.getColumnType(columnIndex)			
		},
		success: function (response) 
		{ 
			// reset old value if failed then highlight row
			var success = onResponse ? onResponse(response) : (response == "ok" || !isNaN(parseInt(response))); // by default, a sucessfull reponse can be "ok" or a database id 
			if (!success) editableGrid.setValueAt(rowIndex, columnIndex, oldValue);
		    highlight(row.id, success ? "ok" : "error"); 
		},
		error: function(XMLHttpRequest, textStatus, exception) { alert("Ajax failure\n" + errortext); },
		async: true
	});
   
}
   


function DatabaseGrid(ac) 
{ 
	if(ac==0){
        this.editableGrid = new EditableGrid("observacion", {
		enableSort: true,
   	    tableLoaded: function() { datagrid.initializeGrid(this); },
		modelChanged: function(rowIndex, columnIndex, oldValue, newValue, row) {
   	    	updateCellValue(this, rowIndex, columnIndex, oldValue, newValue, row);
       	}
 	});
        }else{
        this.editableGrid = new EditableGrid("observacion", {
		enableSort: true,
   	    tableLoaded: function() { datagrid.initializeGrid1(this); },
		modelChanged: function(rowIndex, columnIndex, oldValue, newValue, row) {
   	    	updateCellValue(this, rowIndex, columnIndex, oldValue, newValue, row);
       	}
 	});    
        };
	this.fetchGrid(ac); 
	
}
DatabaseGrid.prototype.fetchGrid = function(d)  {
	// call a PHP script to get the data
        if(d==0) {
           this.editableGrid.loadXML("loaddata.php");
        }else{if(d==1){
           this.editableGrid.loadXML("loaddata.estudiante.proyecto.php");     
        }else{
            
        };
            
        };
        
};

DatabaseGrid.prototype.initializeGrid = function(grid) {
             grid.setCellRenderer("action", new CellRenderer({render: function(cell, value) {
             valu = grid.getRowId(cell.rowIndex);

		cell.innerHTML = "<a onclick=\"if (confirm('Esta seguro de eliminar esta Observacion ? ')) {deletete(" + valu + ");} \" style=\"cursor:pointer\">" +
						 "<img src=\"" + image("delete.png") + "\" border=\"0\" alt=\"delete\" title=\"Delete row\"/></a>";
			
		}}));
             grid.renderGrid("tablecontent", "testgrid");
};
DatabaseGrid.prototype.initializeGrid1 = function(grid) {
             grid.renderGrid("tablecontent", "testgrid");
};

function image(relativePath) {
	return "js/images/" + relativePath;
}
function deletete(obser){
   ajax=objetoAjax();
   ajax.open("POST", "eliminar.php?ob="+obser);
   ajax.send(null);
   datagrid = new DatabaseGrid('0');
};
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
};
function enviarDatosObservacion(){
  //div donde se mostrará lo resultados
  //divResultado = document.getElementById('tablecontent');
  //recogemos los valores de los inputs
  observacion=document.nueva_observacion.observacion.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  //ajax.open("POST", "registro_obser.php",true);
  ajax.open("POST", "registro_obser.php?obser="+observacion,true);

    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
                datagrid = new DatabaseGrid('0');
		//divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
		LimpiarCampos();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send(null);
          //window.location.href="registro_obser.php?obser="+observacion;  
};
 
//función para limpiar los campos
function LimpiarCampos(){
  document.nueva_observacion.observacion.value="";
  document.nueva_observacion.observacion.focus();
};
