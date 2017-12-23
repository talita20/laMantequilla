<?php

require_once "database.php";

class Fornecedor{

	private $idFornecedor;
	private $nomeEmpresa;
	private $nomeRepresentante;
	private $cnpj;
	private $endereco;
	private $telefoneEmpresa;
	private $telefoneRepresentante;
	private $emailEmpresa;
	private $emailRepresentante;


	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setIdFornecedor($value){
		$this->idfornecedor = $value;
	}

	function setNomeEmpresa($value){
		$this->nomeEmpresa = $value;
	}

	function setNomeRepresentante($value){
		$this->nomeRepresentante = $value;
	}

	function setCnpj($value){
		$this->cnpj = $value;
	}

	function setEndereco($value){
		$this->endereco = $value;
	}

	function setTelefoneEmpresa($value){
		$this->telefoneEmpresa = $value;
	}
	function setTelefoneRepresentante($value){
		$this->telefoneRepresentante = $value;
	}
	function setEmailEmpresa($value){
		$this->emailEmpresa = $value;
	}
	function setEmailRepresentante($value){
		$this->emailRepresentante = $value;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `fornecedor`(`nomeEmpresa`, `nomeRepresentante`, `cnpj`, `endereco`, `telefoneEmpresa`,`telefoneRepresentante`,`emailEmpresa`,`emailRepresentante`) VALUES (:nomeEmpresa, :nomeRepresentante, :cnpj, :endereco, :telefoneEmpresa, :telefoneRepresentante, :emailEmpresa, :emailRepresentante)");
			$stmt->bindParam(":nomeEmpresa", $this->nomeEmpresa);
			$stmt->bindParam(":nomeRepresentante", $this->nomeRepresentante);
			$stmt->bindParam(":cnpj", $this->cnpj);
			$stmt->bindParam(":endereco", $this->endereco);
			$stmt->bindParam(":telefoneEmpresa", $this->telefoneEmpresa);
			$stmt->bindParam(":telefoneRepresentante", $this->telefoneRepresentante);
			$stmt->bindParam(":emailEmpresa", $this->emailEmpresa);
			$stmt->bindParam(":emailRepresentante", $this->emailRepresentante);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `fornecedor` SET `nomeEmpresa` = :nomeEmpresa, `nomeRepresentante` = :nomeRepresentante, `cnpj` = :cnpj, `endereco` = :endereco, `telefoneEmpresa` = :telefoneEmpresa, `telefoneRepresentante` = :telefoneRepresentante, `emailEmpresa` = :emailEmpresa, `emailRepresentante` = :emailRepresentante  WHERE `idFornecedor` = :idFornecedor");
			$stmt->bindParam(":idFornecedor", $this->id);
			$stmt->bindParam(":nomeEmpresa", $this->nomeEmpresa);
			$stmt->bindParam(":nomeRepresentante", $this->nomeRepresentante);
			$stmt->bindParam(":cnpj", $this->cnpj);
			$stmt->bindParam(":endereco", $this->endereco);
			$stmt->bindParam(":telefoneEmpresa", $this->telefoneEmpresa);
			$stmt->bindParam(":telefoneRepresentante", $this->telefoneRepresentante);
			$stmt->bindParam(":emailEmpresa", $this->emailEmpresa);
			$stmt->bindParam(":emailRepresentante", $this->emailRepresentante);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `fornecedor` WHERE `idFornecedor` = :idFornecedor");
			$stmt->bindParam(":idFornecedor", $this->idFornecedor);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `fornecedor` WHERE `idFornecedor` = :idFornecedor");
		$stmt->bindParam(":idFornecedor", $this->idFornecedor);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `fornecedor` WHERE 1 ORDER BY `nomeEmpresa`");
		$stmt->execute();
		return $stmt;
	}

	
}
?>