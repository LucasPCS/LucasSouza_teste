<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/passageiro.php';

$database = new Database();
$db = $database->getConnection();

$passageiro = new Passageiro($db);

if(isset($_GET['cpfPassageiro'])){
	$passageiro->cpfPassageiro = htmlspecialchars($_GET['cpfPassageiro']);
}

if(isset($_GET['idPassageiro'])){
	$passageiro->idPassageiro = htmlspecialchars($_GET['idPassageiro']);
	$stmt = $passageiro->readId();
}
else{
	$stmt = $passageiro->readCpf();
}

$num = $stmt->rowCount();

if($num>0){

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$passageiro_item=array(
			"idPassageiro" => $idPassageiro,
			"nomePassageiro" => $nomePassageiro,
			"dataNascPassageiro" => $dataNascPassageiro,
			"cpfPassageiro" => $cpfPassageiro,
			"sexoPassageiro" => $sexoPassageiro
		);
	}
	http_response_code(200);
	echo json_encode($passageiro_item);
}
