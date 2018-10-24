<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/motorista.php';

$database = new Database();
$db = $database->getConnection();

$motorista = new Motorista($db);

$data = json_decode(file_get_contents("php://input"));
if(!empty($data->nomeMotorista) &&
	!empty($data->dataNascMotorista) &&
	!empty($data->cpfMotorista) &&
	!empty($data->modeloCarro) &&
	!empty($data->statusMotorista) &&
	!empty($data->sexoMotorista)
){
	$motorista->nomeMotorista=$data->nomeMotorista;
	$motorista->dataNascMotorista=$data->dataNascMotorista;
	$motorista->cpfMotorista=$data->cpfMotorista;
	$motorista->modeloCarro=$data->modeloCarro;
	$motorista->statusMotorista=$data->statusMotorista;
	$motorista->sexoMotorista=$data->sexoMotorista;

	$stmt = $motorista->readCpf();
	$num = $stmt->rowCount();

	if($num>0){
		http_response_code(400);
		echo json_encode(array("message" => "CPF ja cadastrado."));
	}
	else{
		if($motorista->create()){
			http_response_code(201);
			echo json_encode(array("message" => "Motorista cadastrado com sucesso!"));
		}
		else{
			http_response_code(400);
			echo json_encode(array("message" => "Houve um erro."));
		}
	}
}
else{
	http_response_code(400);
	echo json_encode(array("message" => "Houve um problema no cadastro. Dados incompletos."));
	var_dump($data);
}
?>
