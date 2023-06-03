<?php
class User {

    /*
        idUser INT PK AI NOT NULL
        userName VARCHAR(30) NOT NULL,
        userPassword VARCHAR(30) NOT NULL,
        userEmail VARCHAR(40) NOT NULL
    */

    private $pdo;
	private $base_root_path;
	private $table_name;

    function __construct() {
        global $db_host, $db_name, $db_user, $db_pwd;
        $this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->table_name = 'usuario';
    }

    function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}

    public function createUser($userName, $userPassword, $userEmail) {
		
		try {
				$sql = 'INSERT INTO `'.$this->table_name.'` SET `userName` = :userName, `userPassword` = :userPassword, `userEmail` = :userEmail;';

				$passwordEncrypt = sha1($userPassword);
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':userName', $userName,PDO::PARAM_STR);
				$stmt->bindValue(':userPassword', $passwordEncrypt,PDO::PARAM_INT);
				$stmt->bindValue(':userEmail', $userEmail,PDO::PARAM_STR);

				$stmt->execute();
		}
        catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}

    public function getAll($orderByDesc = true) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';

		try {
			$sql = " SELECT idUser, userName, userPassword, userEmail FROM {$this->table_name}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

	function validateCredential($userEmail, $userPassword){

		$result = array();

		try {
			$sql = " SELECT * FROM {$this->table_name} ";
      $sql .= ' WHERE userEmail = :userEmail AND userPassword = :userPassword';
			$stmt = $this->pdo->prepare($sql);

			$encryptedPassword = sha1($userPassword);
      $stmt->bindValue(':userEmail', $userEmail,PDO::PARAM_STR);
			$stmt->bindValue(':userPassword', $encryptedPassword,PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $stmt->rowCount()>0?$result:null;

	}

    public function getById($idUser) {		
		
		$result = array();

		try {
			$sql = " SELECT idUser, userName, userPassword, userEmail FROM {$this->table_name} WHERE idUser = :idUser";
			$stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':idUser', $idUser,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

    public function deleteUser($idUser) {
		try {
			$sql ="DELETE FROM {$this->table_name} WHERE idUser = :idUser";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':idUser', $idUser,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to delete record (id): {$idUser} from {$this->table_name} table. ".$e->getMessage());
		}

	}

    public function updateUser($idUser, $userPassword) {
		
        try {

				$passwordEncrypt = sha1($userPassword);
                $sql = "UPDATE {$this->table_name} SET `userPassword` = :userPassword WHERE `idUser` = :idUser";
    
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':userPassword', $passwordEncrypt,PDO::PARAM_STR);
                $stmt->bindValue(':idUser', $idUser,PDO::PARAM_INT);
                $stmt->execute();
        }
        catch(PDOException $e) {
            throw new Exception("Error trying to update record (id): {$idUser} on {$this->table_name} table. ".$e->getMessage());
        }
    }
    
}