<?php
class Corrida{
	private $conn;
	private $table_name = "corridas";
	public $idCorrida;
	public $fkMotorista;
	public $fkPassageiro;
	public $valorCorrida;

	public function __construct($db){
		$this->conn = $db;
	}

	public function create(){
		$query = "INSERT INTO " . $this->table_name
			. " SET fkMotorista=:fkMotorista, fkPassageiro=:fkPassageiro, valorCorrida=:valorCorrida";
		$stmt = $this->conn->prepare($query);

		$this->fkMotorista = htmlspecialchars(strip_tags($this->fkMotorista));
		$this->fkPassageiro = htmlspecialchars(strip_tags($this->fkPassageiro));
		$this->valorCorrida = htmlspecialchars(strip_tags($this->valorCorrida));

		$stmt->bindParam(":fkMotorista",$this->fkMotorista);
		$stmt->bindParam(":fkPassageiro",$this->fkPassageiro);
		$stmt->bindParam(":valorCorrida",$this->valorCorrida);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function read(){
		$query = "SELECT c.idCorrida, c.fkMotorista, m.nomeMotorista, c.fkPassageiro, p.nomePassageiro, c.valorCorrida FROM " . $this->table_name . " AS c "
		. " INNER JOIN motoristas AS m ON m.idMotorista=c.fkMotorista "
		. " INNER JOIN passageiros AS p ON p.idPassageiro=c.fkPassageiro "
		. " ORDER BY c.idCorrida";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	public function readOne(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE idCorrida LIKE :idCorrida";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":idCorrida",$this->idCorrida);
		$stmt->execute();
		return $stmt;
	}
}
