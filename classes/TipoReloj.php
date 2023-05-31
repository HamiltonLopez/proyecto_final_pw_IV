<?php
class TipoReloj {

	/*
		idTipo - identificador [int(15),PK,AI, NOT NULL]
		nombreTipo - [varchar(10),NOT NULL]
		descripcionTipo - [varchar(50),NOT NULL]
	*/

	private $pdo;
	private $base_root_path;
	private $table_name;
	
	function __construct() {
    global $db_host, $db_name, $db_user, $db_pwd;
		$this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->table_name = 'tipoReloj';
	}

	function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}


	public function getAll() {		
		
		$result = array();

		try {
			$sql = "SELECT idTipo, nombreTipo, descripcionTipo FROM {$this->table_name}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

  public function getById($id) {		
		
		$result = array();

		try {
			$sql = "SELECT idTipo, nombreTipo, descripcionTipo FROM {$this->table_name} WHERE idTipo = {$id}";
			$stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':idTipo', $id,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}
}