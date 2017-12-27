<?php
require_once "database.php";
class Funcionario{
	private $idFuncionario;
	private $cpf;
	private $nome;
	private $endereco;
	private $cargo;
	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}
	function setIdFuncionario($value){
		$this->idFuncionario = $value;
	}
	function setNome($value){
		$this->nome = $value;
	}
	function setCpf($value){
		$this->cpf = $value;
	}
	function setEndereco($value){
		$this->endereco = $value;
	}
	function setCargo($value){
		$this->cargo = $value;
	}
	
	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `funcionario`(`nome`, `cpf`, `endereco`, `cargo`) VALUES (:nome, :cpf, :endereco, :cargo)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":cpf", $this->cpf);
			$stmt->bindParam(":endereco", $this->endereco);
			$stmt->bindParam(":cargo", $this->cargo);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `funcionario` SET `nome` = :nome, `cpf` = :cpf, `endereco` = :endereco, `cargo` = :cargo WHERE `idfuncionario` = :idfuncionario");
			$stmt->bindParam(":idfuncionario", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":cpf", $this->cpf);
			$stmt->bindParam(":endereco", $this->endereco);
			$stmt->bindParam(":cargo", $this->cargo);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `funcionario` WHERE `idfuncionario` = :idfuncionario");
			$stmt->bindParam(":idfuncionario", $this->idfuncionario);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionario` WHERE `idfuncionario` = :idfuncionario");
		$stmt->bindParam(":idfuncionario", $this->idfuncionario);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}
	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionario` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}
	
}
?>