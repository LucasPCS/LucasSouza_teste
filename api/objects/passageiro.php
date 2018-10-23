<?php
include_once '../config/database.php';

class Passageiro{
    private $conn;
	private $table_name = "passageiros";
	public $idPassageiro;
	public $nomePassageiro;
	public $dataNascPassageiro;
	public $cpfPassageiro;
	public $sexoPassageiro;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){
		$query = "INSERT INTO " . $this->table_name
			. " SET nomePassageiro=:nomePassageiro, dataNascPassageiro=:dataNascPassageiro, cpfPassageiro=:cpfPassageiro, sexoPassageiro=:sexoPassageiro";
		$stmt = $this->conn->prepare($query);

		$this->nomePassageiro=htmlspecialchars(strip_tags($this->nomePassageiro));
		$this->dataNascPassageiro=htmlspecialchars(strip_tags($this->dataNascPassageiro));
		$this->cpfPassageiro=htmlspecialchars(strip_tags($this->cpfPassageiro));
		$this->sexoPassageiro=htmlspecialchars(strip_tags($this->sexoPassageiro));

		$stmt->bindParam(":nomePassageiro",$this->nomePassageiro);
		$stmt->bindParam(":dataNascPassageiro",$this->dataNascPassageiro);
		$stmt->bindParam(":cpfPassageiro",$this->cpfPassageiro);
		$stmt->bindParam(":sexoPassageiro",$this->sexoPassageiro);

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

	public function readOne(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE cpfPassageiro LIKE :cpfPassageiro";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":cpfPassageiro",$this->cpfPassageiro);
		$stmt->execute();
		return $stmt;
	}

	public function readId(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE idPassageiro LIKE :idPassageiro";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":idPassageiro",$this->idPassageiro);
		$stmt->execute();
		return $stmt;
	}
}
