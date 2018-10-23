<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/motorista.php';

$database = new Database();
$db = $database->getConnection();

$motorista = new Motorista($db);

$stmt = $motorista->read();
$num = $stmt->rowCount();

if($num>0){
  $motorista_arr=array();

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

    array_push($motorista_arr, $motorista_item);
  }
  http_response_code(200);
  echo json_encode($motorista_arr);
}
