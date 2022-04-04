<?php
try {
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	require_once '../../php/class/etiquetas.php';

	/* VARIABLES */
	$idCliente = $_POST['Cliente_id'];
	$nombre = $_POST['Nombre'];
	$descripcion = $_POST['Descripcion'];
	$nombre_cliente = $_POST['Clientenombre'];
	$img = $_POST['base64Img'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$fileData = base64_decode($img);
	$date = new \DateTime();
    $FileName = $date->format("YmdHi").$nombre.".jpg";

	/* INSERTAR REGISTRO DE ETIQUETA PERSONALIZA*/
	
	$new_label= new etiquetas();
	$qry="INSERT INTO  custom_labels (name,file,selling_price,description,user_id,created_by,updated_by,created_at,updated_at)
	values('$nombre','$FileName','100','$descripcion','$idCliente','$nombre_cliente','$nombre_cliente','2022-03-24 19:52:51','2022-03-24 19:52:51')";
	
	$new_label->runSql($qry);
    
	/* GUARDAR IMAGEN DE LA ETIQUETA PERSONALIZADA EN EL SERVIDOR */

	
	$Route = "C://Users//franc//Documents//Proyectos_PGM//ETIQUETAS//ecommerce-etiquetas//public//upload//custom_labels//";
	
	file_put_contents($Route.$FileName, $fileData);
      
	
	echo json_encode(array('response' => "Exito"));
} catch (Exception $e) {
	echo json_encode(array('response' =>  $e->getMessage()));
}
	
	
?>