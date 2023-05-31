<?php
class Reloj {

	/*
		idReloj - identificador [int(15),PK,AI, NOT NULL]
		nombreReloj - [varchar(50),NOT NULL]
		modeloReloj - [varchar(50),NOT NULL]
		tipoReloj - [varchar(10),NULL]
	*/

	private $pdo;
	private $base_root_path;
	private $table_name;
	
	function __construct() {
    global $db_host, $db_name, $db_user, $db_pwd;
		$this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->table_name = 'reloj';
	}

	function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}
    /*
	public function save( $nombreReloj, $modeloReloj, $idReloj, $tipoReloj) {
		
		try {
				$sql = 'INSERT INTO `'.$this->table_name.'` SET `nombreReloj` = :nombreReloj, `modeloReloj` = :modeloReloj, `idReloj` = :idReloj, `tipoReloj` = :tipoReloj;';

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':nombreReloj', $nombreReloj,PDO::PARAM_STR);
				$stmt->bindValue(':modeloReloj', $modeloReloj,PDO::PARAM_STR);
				$stmt->bindValue(':idReloj', $idReloj,PDO::PARAM_INT);
				$stmt->bindValue(':tipoReloj', $tipoReloj,PDO::PARAM_STR);

				$stmt->execute();
			}
		catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}
*/
	public function getAll($orderByDesc = true) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';
		
			$sql = " SELECT * FROM {$this->table_name}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		

		return $result;
	}
/*
  public function getById($id) {		
		
		$result = array();

		try {
			$sql = " SELECT idReloj, nombreReloj, modeloReloj, tipoReloj FROM {$this->table_name} WHERE idReloj = {$id}";
			$stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id,PDO::PARAM_INT);
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
			$sql ="DELETE FROM {$this->table_name} WHERE idReloj = {$id}";
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
/*
  public function update( $idReloj, $nombreReloj, $modeloReloj, $tipoReloj) {
		
    try {
			$sql = "UPDATE {$this->table_name} SET nombreReloj = {$nombreReloj}, modeloReloj = {$modeloReloj}, tipoReloj = ${$tipoReloj} WHERE idReloj = {$idReloj}";

			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':nombreReloj', $nombreReloj,PDO::PARAM_STR);
			$stmt->bindValue(':modeloReloj', $modeloReloj,PDO::PARAM_STR);
			$stmt->bindValue(':tipoReloj', $tipoReloj,PDO::PARAM_INT);

            $stmt->bindValue(':id', $id,PDO::PARAM_INT);
			$stmt->execute();
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to update record (id): {$id} on {$this->table_name} table. ".$e->getMessage());
		  }
	}
    */
}