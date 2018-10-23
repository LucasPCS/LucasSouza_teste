<?php
class Motorista{
	private $conn;
	private $table_name = "motoristas";
	public $idMotorista;
	public $nomeMotorista;
	public $dataNascMotorista;
	public $cpfMotorista;
	public $modeloCarro;
	public $statusMotorista;
	public $sexoMotorista;

	public function __construct($db){
		$this->conn = $db;
	}

	public function changeStatus($idMotorista, $statusMotorista){
		$query = "UPDATE " . $this->table_name . " SET statusMotorista=:statusMotorista WHERE idMotorista=:idMotorista";
		$stmt = $this->conn->prepare($query);

		$newStatus = $statusMotorista == 0 ? 1 : 0;
		$stmt->bindParam(":statusMotorista",$newStatus);
		$stmt->bindParam(":idMotorista",$idMotorista);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function create(){
		$query = "INSERT INTO " . $this->table_name
			. " SET nomeMotorista=:nomeMotorista, dataNascMotorista=:dataNascMotorista, cpfMotorista=:cpfMotorista, modeloCarro=:modeloCarro, statusMotorista=:statusMotorista, sexoMotorista=:sexoMotorista";
		$stmt = $this->conn->prepare($query);

		$this->nomeMotorista=htmlspecialchars(strip_tags($this->nomeMotorista));
		$this->dataNascMotorista=htmlspecialchars(strip_tags($this->dataNascMotorista));
		$this->cpfMotorista=htmlspecialchars(strip_tags($this->cpfMotorista));
		$this->modeloCarro=htmlspecialchars(strip_tags($this->modeloCarro));
		$this->statusMotorista=htmlspecialchars(strip_tags($this->statusMotorista));
		$this->sexoMotorista=htmlspecialchars(strip_tags($this->sexoMotorista));

		$stmt->bindParam(":nomeMotorista",$this->nomeMotorista);
		$stmt->bindParam(":dataNascMotorista",$this->dataNascMotorista);
		$stmt->bindParam(":cpfMotorista",$this->cpfMotorista);
		$stmt->bindParam(":modeloCarro",$this->modeloCarro);
		$stmt->bindParam(":statusMotorista",$this->statusMotorista);
		$stmt->bindParam(":sexoMotorista",$this->sexoMotorista);

		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function read(){
		$query = "SELECT * FROM " . $this->table_name;
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	public function readCpf(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE cpfMotorista LIKE :cpfMotorista";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":cpfMotorista",$this->cpfMotorista);
		$stmt->execute();
		return $stmt;
	}

	public function readId(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE idMotorista LIKE :idMotorista";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":idMotorista",$this->idMotorista);
		$stmt->execute();
		return $stmt;
	}
}
