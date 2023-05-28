<?php
class Carrito {

    /*

    idCarrito INT PK AI NOT NULL,
    idPersona INT FK NOT NULL,
    idReloj INT NOT NULL,
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

    //Falta averiguar dónde agregar el idCarrito y de qué manera validar que los productos se agreguen al carrito correspondiente
    public function addProduct($idPersona, $idReloj, $cantidadRelojes) {
		
		try {
				$sql = 'INSERT INTO `'.$this->table_name.'` SET `idPersona` = :idPersona, `idReloj` = :idReloj, `cantidadRelojes` = :cantidadRelojes;';

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':idPersona', $idPersona,PDO::PARAM_STR);
				$stmt->bindValue(':idReloj', $idReloj,PDO::PARAM_INT);
				$stmt->bindValue(':cantidadRelojes', $cantidadRelojes,PDO::PARAM_STR);

				$stmt->execute();
			}
		catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}

    public function removeProduct($idReloj) {
		try {
			$sql ="DELETE FROM {$this->table_name} WHERE idReloj = {$idReloj}";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(':idReloj', $idReloj,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
		}
		catch(PDOException $e) {
			throw new Exception("Error trying to delete record (id): {$idReloj} from {$this->table_name} table. ".$e->getMessage());
		}

	}

    public function updateCountProduct($idReloj, $cantidadRelojes) {
		
        try {
                $sql = "UPDATE {$this->table_name} SET cantidadRelojes = {$cantidadRelojes} WHERE idReloj = {$idReloj}";
    
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':cantidadRelojes', $cantidadRelojes,PDO::PARAM_STR);
    
                $stmt->bindValue(':idReloj', $idReloj,PDO::PARAM_INT);
                $stmt->execute();
            }
            catch(PDOException $e) {
                throw new Exception("Error trying to update record (id): {$idReloj} on {$this->table_name} table. ".$e->getMessage());
              }
        }
    }

    public function clearCar($idCarrito) {
        
        try {
            $sql = "DELETE $idReloj, $cantidadRelojes FROM {$this->table_name} WHERE idCarrito = {$idCarrito}";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':idCarrito', $idCarrito,PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            throw new Exception("Error trying to update record (id): {$idCarrito} on {$this->table_name} table. ".$e->getMessage());
          }
    }
}