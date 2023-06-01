<?php
class Venta {

    /*
        idVenta INT PK NOT NULL,
        nombreEmpresa VARCHAR(30) NOT NULL,
        telefonoEmpresa CHAR(10) NOT NULL,
        idCliente INT FK NOT NULL,
        fechaRealizacionVenta DATE NOT NULL,
        totalVenta DOUBLE NOT NULL
    */

    private $pdo;
	private $base_root_path;
	private $table_name;

    function __construct() {
        global $db_host, $db_name, $db_user, $db_pwd;
        $this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->table_name = 'venta';
    }

    function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}

    public function crearVenta($idCliente) {
		
		try {
				$sql = 'INSERT INTO `'.$this->table_name.'` SET `nombreEmpresa` = :nombreEmpresa, 
                `telefonoEmpresa` = :telefonoEmpresa, `idCliente` = :idCliente, 
                `fechaRealizacionVenta` = :fechaRealizacionVenta, `totalVenta` = :totalVenta;';

                $fechaActual = date('Y-m-d');
                $totalVenta = 0,0;

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':nombreEmpresa', 'TEMPUS FUGIT',PDO::PARAM_INT);
				$stmt->bindValue(':telefonoEmpresa', '3156263333',PDO::PARAM_STR);
                $stmt->bindValue(':idCliente', $idCliente ,PDO::PARAM_STR);
                $stmt->bindValue(':fechaRealizacionVenta', $fechaActual ,PDO::PARAM_STR);
                $stmt->bindValue(':totalVenta', $totalVenta , PDO::PARAM_STR);

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
			$sql = " SELECT idVenta, nombreEmpresa, telefonoEmpresa, idCliente, fechaRealizacionVenta, totalVenta
             FROM {$this->table_name} ORDER BY {$orderBy}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

    public function getById($idVenta) {		
		
		$result = array();

		try {
			$sql = " SELECT idVenta, nombreEmpresa, telefonoEmpresa, idCliente, fechaRealizacionVenta, totalVenta
             FROM {$this->table_name} WHERE idVenta = {$idVenta}";
			$stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':idVenta', $idVenta,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}
}