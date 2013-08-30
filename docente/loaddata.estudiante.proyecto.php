<?php     

require_once('config.php');      
require_once('EditableGrid.php');

if(isset($_GET['doc'])){
$docid=$_GET['doc'];
};
          
/**
 * fetch_pairs is a simple method that transforms a mysqli_result object in an array.
 * It will be used to generate possible values for some columns.
*/
function fetch_pairs($mysqli,$query){
	if (!($res = $mysqli->query($query)))return FALSE;
	$rows = array();
	while ($row = $res->fetch_assoc()) {
		$first = true;
		$key = $value = null;
		foreach ($row as $val) {
			if ($first) { $key = $val; $first = false; }
			else { $value = $val; break; } 
		}
		$rows[$key] = $value;
	}
	return $rows;
}

// Database connection
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
$mysqli->real_connect($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']); 
                    
// create a new EditableGrid object
$grid = new EditableGrid();

/* 
*  Add columns. The first argument of addColumn is the name of the field in the databse. 
*  The second argument is the label that will be displayed in the header
*/
$grid->addColumn('id', 'ID', 'integer', NULL, false); 
$grid->addColumn('nombre', 'Nombre', 'string', NULL, false);  
$grid->addColumn('apellidos', 'Apellidos', 'string', NULL, false);
$grid->addColumn('nombrep', 'Nombre Proyecto', 'string', NULL, false);
$grid->addColumn('evaluacion_1', 'Evaluacion 1', 'integer');
$grid->addColumn('evaluacion_2', 'Evaluacion 2', 'integer');
$grid->addColumn('evaluacion_3', 'Evaluacion 3', 'integer');
$grid->addColumn('promedio', 'Promedio', 'integer', NULL, false);
$grid->addColumn('rfinal', 'Aprobacion', 'string', NULL, false);

$result = $mysqli->query('
SELECT ev.id as id, us.nombre as nombre, us.apellidos as apellidos, pr.nombre as nombrep, pr.id as id_pr, ev.evaluacion_1, ev.evaluacion_2, ev.evaluacion_3, ev.promedio as pro, ev.rfinal as apro
FROM docente dt, dicta di, estudiante es, usuario us, inscrito it, proyecto pr, proyecto_estudiante pe, evaluacion ev
WHERE dt.id="'.$docid.'"
AND di.docente_id=dt.id 
AND di.id=it.dicta_id
AND it.estudiante_id=es.id
AND es.usuario_id=us.id
AND pe.estudiante_id=es.id
AND pe.proyecto_id=pr.id
AND it.evaluacion_id=ev.id
');
$mysqli->close();

// send data to the browser
$grid->renderXML($result);

?>