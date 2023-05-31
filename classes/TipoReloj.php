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

	public function save( $idTipo, $nombreTipo, $descripcionTipo) {
		
		try {
				$sql = "INSERT INTO {$this->table_name} VALUES ({$idTipo}, {$nombreTipo}, {$descripcionTipo});";

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':idTipo', $idTipo,PDO::PARAM_STR);
				$stmt->bindValue(':nombreTipo', $nombreTipo,PDO::PARAM_STR);
				$stmt->bindValue(':descripcionTipo', $descripcionTipo,PDO::PARAM_INT);

				$stmt->execute();
			}
		catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}

	public function getAll() {		
		
		$result = array();

		try {
			$sql = "SELECT idTipo, nombreTipo, descripcionTipo, tipoReloj, precioReloj FROM {$this->table_name} ORDER BY {$orderBy}";
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

	public function delete($id) {
		try {
			$sql ="DELETE FROM {$this->table_name} WHERE idTipo = {$id}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':id', $id,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to delete record (id): {$id} from {$this->table_name} table. ".$e->getMessage());
		}

	}

  public function update( $idTipo, $nombreTipo, $descripcionTipo, $tipoReloj, $precioReloj) {
		
    try {
			$sql = "UPDATE {$this->table_name} SET nombreTipo = {$nombreTipo}, descripcionTipo = {$descripcionTipo} WHERE idTipo = {$idTipo}";

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':nombreTipo', $nombreTipo,PDO::PARAM_STR);
			$stmt->bindValue(':descripcionTipo', $descripcionTipo,PDO::PARAM_STR);

            $stmt->bindValue(':id', $id,PDO::PARAM_INT);
			$stmt->execute();
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to update record (id): {$id} on {$this->table_name} table. ".$e->getMessage());
		  }
	}
}