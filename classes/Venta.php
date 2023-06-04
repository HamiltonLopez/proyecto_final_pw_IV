<?php
class Venta {

    /*
        idVenta INT PK NOT NULL,
		estadoVenta VARCHAR(10) NOT NULL
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

    public function crearVenta($nombreEmpresa, $telefonoEmpresa, $idCliente, $fechaRealizacionVenta) {
		
		try {
				$sql = 'INSERT INTO `'.$this->table_name.'` SET `estadoVenta` = :estadoVenta,
				`nombreEmpresa` = :nombreEmpresa, `telefonoEmpresa` = :telefonoEmpresa, `idCliente` = :idCliente, 
                `fechaRealizacionVenta` = :fechaRealizacionVenta, `totalVenta` = :totalVenta;';

                $totalVenta = 0;

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':estadoVenta', 'generada',PDO::PARAM_STR);
				$stmt->bindValue(':nombreEmpresa', $nombreEmpresa,PDO::PARAM_STR);
				$stmt->bindValue(':telefonoEmpresa', $telefonoEmpresa ,PDO::PARAM_STR);
                $stmt->bindValue(':idCliente', $idCliente ,PDO::PARAM_INT);
                $stmt->bindValue(':fechaRealizacionVenta', $fechaRealizacionVenta ,PDO::PARAM_STR);
                $stmt->bindValue(':totalVenta', $totalVenta , PDO::PARAM_INT);

				$stmt->execute();
			}
		catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}

	public function getById($idVenta) {		
		
		$result = array();

		try {
			$sql = " SELECT idVenta, estadoVenta, nombreEmpresa, telefonoEmpresa, idCliente, fechaRealizacionVenta, 
			totalVenta FROM {$this->table_name} AS vt WHERE idVenta = :idVenta";
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

    public function getAll($orderByDesc = true) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';

		try {
			$sql = " SELECT idVenta, estadoVenta, nombreEmpresa, telefonoEmpresa, cl.nombreCliente, cl.apellidoCliente,
			fechaRealizacionVenta, totalVenta FROM {$this->table_name} AS vt 
			JOIN cliente cl ON vt.idCliente = cl.idCliente";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}
	public function getID($orderByDesc = true) {		
		$result = array();
		$maximo = 0;
		//$orderBy = $orderByDesc?'DESC':'ASC';

		try {
			$sql = " SELECT MAX(idVenta) as maximo
			FROM {$this->table_name}  ";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
		//	$maximo = maximo;
		  
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			var_dump($result);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}
		return $result;

		
	}

	public function calcularTotal($idVenta) {		
		

		$result = array();

		try {
			$sql = "SELECT SUM(rl.precioReloj * dv.cantidadRelojes) AS totalVenta FROM detalleVenta AS dv 
			JOIN reloj  AS rl ON dv.idReloj = rl.idReloj WHERE dv.idVenta = :idVenta";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':idVenta', $idVenta, PDO::PARAM_INT);		
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
		
		   $result = $result['totalVenta'];
			var_dump($result);

			$sql = "UPDATE {$this->table_name} SET totalVenta = :totalVenta WHERE idVenta = :idVenta";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':totalVenta', $result, PDO::PARAM_INT);
			$stmt->bindValue(':idVenta', $idVenta, PDO::PARAM_INT);
			$stmt->execute();
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {detalleVenta} table: ".$e->getMessage());
		}
	}

	public function anularVenta($idVenta) {

		try {
			$sql = "UPDATE {$this->table_name} SET estadoVenta = :estadoVenta WHERE idVenta = :idVenta";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':idVenta', $idVenta,PDO::PARAM_INT);
			$stmt->bindValue(':estadoVenta', 'anulada',PDO::PARAM_STR);
			$stmt->execute();
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to update record (id): {$idVenta} on {$this->table_name} table. ".$e->getMessage());
		}
	}

	}

