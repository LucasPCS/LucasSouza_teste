<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/corrida.php';
include_once '../objects/motorista.php';

$database = new Database();
$db = $database->getConnection();

$corrida = new Corrida($db);

$motorista = new Motorista($db);


$data = json_decode(file_get_contents("php://input"));
if(!empty($data->idMotorista) &&
!empty($data->idPassageiro) &&
!empty($data->valorCorrida)
){
	$corrida->fkMotorista=$data->idMotorista;
	$corrida->fkPassageiro=$data->idPassageiro;
	$corrida->valorCorrida=$data->valorCorrida;

	$motorista->idMotorista=$corrida->fkMotorista;
	
	$stmt = $motorista->readId();

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
			http_response_code(400);
			echo json_encode(array("message" => "Motorista inativo."));
		}
		else{
			if($corrida->create()){
				http_response_code(201);
				echo json_encode(array("message" => "Corrida cadastrada com sucesso!"));
			}
			else{
				http_response_code(400);
				echo json_encode(array("message" => "Houve um erro."));
			}
		}
	}


	
}

else{
	http_response_code(400);
	echo json_encode(array("message" => "Houve um problema no cadastro. Dados incompletos."));
	var_dump($data);
}
?>
