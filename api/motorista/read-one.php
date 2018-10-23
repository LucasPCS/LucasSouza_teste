<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/motorista.php';

$database = new Database();
$db = $database->getConnection();

$motorista = new Motorista($db);

if(isset($_GET['cpfMotorista'])){
	$motorista->cpfMotorista = htmlspecialchars($_GET['cpfMotorista']);
}

if(isset($_GET['idMotorista'])){
	$motorista->idMotorista = htmlspecialchars($_GET['idMotorista']);
	$stmt = $motorista->readId();
}
else{
	$stmt = $motorista->readCpf();
}

$num = $stmt->rowCount();

if($num>0){

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$motorista_item=array(
			"idMotorista" => $idMotorista,
			"nomeMotorista" => $nomeMotorista,
			"dataNascMotorista" => $dataNascMotorista,
			"cpfMotorista" => $cpfMotorista,
			"modeloCarro" => $modeloCarro,
			"statusMotorista" => $statusMotorista,
			"sexoMotorista" => $sexoMotorista
		);
	}
	if($motorista_item["statusMotorista"]==0){
		$motorista_item["nomeMotorista"] = $motorista_item["nomeMotorista"] . " - INATIVO";
	}
	http_response_code(200);
	echo json_encode($motorista_item);
}
