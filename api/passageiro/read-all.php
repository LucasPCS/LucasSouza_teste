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

$passageiro = new passageiro($db);

$stmt = $passageiro->read();
$num = $stmt->rowCount();

if($num>0){
  $passageiro_arr=array();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $passageiro_item=array(
      "idPassageiro" => $idPassageiro,
      "nomePassageiro" => $nomePassageiro,
      "dataNascPassageiro" => $dataNascPassageiro,
      "cpfPassageiro" => $cpfPassageiro,
      "sexoPassageiro" => $sexoPassageiro
    );

    array_push($passageiro_arr, $passageiro_item);
  }
  http_response_code(200);
  echo json_encode($passageiro_arr);
}
