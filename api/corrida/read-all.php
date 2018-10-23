<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/corrida.php';

$database = new Database();
$db = $database->getConnection();

$corrida = new Corrida($db);

$stmt = $corrida->read();
$num = $stmt->rowCount();

if($num>0){
	$corrida_arr=array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$corrida_item=array(
			"idCorrida" => $idCorrida,
			"fkMotorista" => $fkMotorista,
			"nomeMotorista" => $nomeMotorista,
			"fkPassageiro" => $fkPassageiro,
			"nomePassageiro" => $nomePassageiro,
			"valorCorrida" => $valorCorrida
		);

		array_push($corrida_arr, $corrida_item);
	}
	http_response_code(200);
	echo json_encode($corrida_arr);
}
