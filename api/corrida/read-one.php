<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/corrida.php';

$database = new Database();
$db = $database->getConnection();

$corrida = new Corrida($db);

if(isset($_GET['cpfCorrida'])){
	$corrida->idCorrida = htmlspecialchars($_GET['idCorrida']);
}

$stmt = $corrida->readOne();
$num = $stmt->rowCount();

if($num>0){
	$corrida_arr=array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$corrida_item=array(
			"idCorrida" => $idCorrida,
			"fkMotorista" => $fkMotorista,
			"fkPassageiro" => $fkPassageiro,
			"valorCorrida" => $valorCorrida
		);

		array_push($corrida_arr, $corrida_item);
	}
	http_response_code(200);
	echo json_encode($corrida_arr);
}
