<?php
try {
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once '../../php/class/etiquetas.php';
    $new_label= new etiquetas();
	$idCliente = $_POST['Cliente_id'];
	$nombre = $_POST['Nombre'];
	
       #Creamos el qry para la validación
       $qry = "SELECT *FROM custom_labels where name = '$nombre' and user_id = '$idCliente'";
       
       $registros = $new_label->runSql_select($qry);   
        #Buscamos a ver si  existe un registro igual
       if($registros==0){
        echo json_encode(array('msg' =>  "No Existe"));
        }else{
        echo json_encode(array('msg'  =>  "Existe"));
        }
	
} catch (Exception $e) {
	echo json_encode(array('response' =>  $e->getMessage()));

}


