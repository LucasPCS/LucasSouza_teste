<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/passageiro.php';

$database = new Database();
$db = $database->getConnection();

$passageiro = new Passageiro($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->nomePassageiro) &&
    !empty($data->dataNascPassageiro) &&
    !empty($data->cpfPassageiro) &&
    !empty($data->sexoPassageiro)
) {
	$passageiro->nomePassageiro=$data->nomePassageiro;
	$passageiro->dataNascPassageiro=$data->dataNascPassageiro;
	$passageiro->cpfPassageiro=$data->cpfPassageiro;
	$passageiro->sexoPassageiro=$data->sexoPassageiro;

	$stmt = $passageiro->readOne();
	$num = $stmt->rowCount();

	if($num>0){
		http_response_code(400);
		echo json_encode(array("message" => "CPF ja cadastrado"));
	}
	else{
		if($passageiro->create()){
			http_response_code(201);
			echo json_encode(array("message" => "Passageiro cadastrado com sucesso!"));
		}
		else{
			http_response_code(400);
			echo json_encode(array("message" => "Houve um erro"));
		}
	}
}
else{
	http_response_code(400);
	echo json_encode(array("message" => "Houve um problema no cadastro. Dados incompletos."));
	var_dump($data);
}

?>
