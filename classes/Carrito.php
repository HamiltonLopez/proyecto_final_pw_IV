<?php
class Carrito {

    /*

        idCarrito INT PK AI NOT NULL,
        idReloj INT FK NOT NULL,
        cantidadRelojes TINYINT NOT NULL

    */

    private $pdo;
	private $base_root_path;
	private $table_name;

    function __construct() {
        global $db_host, $db_name, $db_user, $db_pwd;
        $this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->table_name = 'carrito';
    }

    function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}

    public function addProduct($idReloj, $cantidadRelojes) {
		
		try {
				$sql = 'INSERT INTO `'.$this->table_name.'` SET `idReloj` = :idReloj, `cantidadRelojes` = :cantidadRelojes;';

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':idReloj', $idReloj,PDO::PARAM_INT);
				$stmt->bindValue(':cantidadRelojes', $cantidadRelojes,PDO::PARAM_INT);
				$stmt->execute();
				echo('El reloj seleccionado ha sido añadido al carrito');
			}
		catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}

    public function getAll($orderByDesc = true) {		
		
		$result = array();
		$orderBy = $orderByDesc?'DESC':'ASC';

		try {
			$sql = "SELECT ct.idCarrito, rl.nombreReloj, tr.nombreTipo, rl.modeloReloj, ct.cantidadRelojes 
			FROM {$this->table_name}  AS ct 
			JOIN reloj AS rl ON ct.idReloj = rl.idReloj
			JOIN tipoReloj AS tr ON rl.idTipoReloj = tr.idTipo 
			ORDER BY {$orderBy}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

    public function getProduct($idCarrito) {		
		
		$result = array();

		try {
			$sql = "SELECT idCarrito, idReloj, cantidadRelojes FROM {$this->table_name} WHERE idCarrito = :idCarrito";
			$stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':idCarrito', $idCarrito,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to get records from {$this->table_name} table: ".$e->getMessage());
		}

		return $result;
	}

    public function removeProduct($idCarrito) {
		try {
			$sql ="DELETE FROM {$this->table_name} WHERE idCarrito = :idCarrito";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':idCarrito', $idCarrito,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to delete record (id): {$idCarrito} from {$this->table_name} table. ".$e->getMessage());
		}

	}

    public function updateCountProduct($idCarrito, $cantidadRelojes) {
		
        try {
                $sql = "UPDATE {$this->table_name} SET cantidadRelojes = :cantidadRelojes WHERE idCarrito = :idCarrito";
    
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':cantidadRelojes', $cantidadRelojes,PDO::PARAM_INT);
                $stmt->bindValue(':idCarrito', $idCarrito,PDO::PARAM_INT);
                $stmt->execute();
            }
            catch(PDOException $e) {
                throw new Exception("Error trying to update record (id): {$idCarrito} on {$this->table_name} table. ".$e->getMessage());
            }
        
    }

    public function clearCar() {
        
        try {
            $sql = "DELETE FROM {$this->table_name}";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            throw new Exception("Error trying to delete {$this->table_name} table. ".$e->getMessage());
          }
    }
}