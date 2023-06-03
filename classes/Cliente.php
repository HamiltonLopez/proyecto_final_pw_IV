<?php
class Cliente {

    /*
        idCliente INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nombreCliente VARCHAR (30) NOT NULL,
        apellidoCliente VARCHAR (30) NOT NULL,
        tipoDocumento VARCHAR (30) NOT NULL,
        documentoCliente INT NOT NULL,
        direccionCliente VARCHAR (50) NOT NULL,
        telefonoCliente CHAR (10) NOT NULL
    */

    private $pdo;
	private $base_root_path;
	private $table_name;

    function __construct() {
        global $db_host, $db_name, $db_user, $db_pwd;
        $this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->table_name = 'cliente';
    }

    function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}

    public function getAll($orderByDesc = true) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';

		try {
			$sql = " SELECT idCliente, nombreCliente, apellidoCliente, tipoDocumento, documentoCliente, 
            direccionCliente, telefonoCliente FROM {$this->table_name}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

}


?>