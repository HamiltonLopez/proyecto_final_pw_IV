<?php
class DetalleVenta {

    /*
        idDetalleVenta INT PK NOT NULL,
        idVenta INT FK NOT NULL,
        idReloj INT FK NOT NULL,
        cantidadRelojes INT NOT NULL
    */

    private $pdo;
	private $base_root_path;
	private $table_name;

    function __construct() {
        global $db_host, $db_name, $db_user, $db_pwd;
        $this->pdo = new pdo('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pwd); //Se crea una nueva conexíon a la base de datos
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->table_name = 'detalleVenta';
    }

    function __destruct() {
		$this->pdo = null; //Se destruye la conexíon a la base de datos creada en el constructor
	}

    public function addProduct($idVenta, $idReloj, $cantidadRelojes) {
		
		try {
				$sql = 'INSERT INTO `'.$this->table_name.'` SET `idVenta` = :idVenta, `idReloj` = :idReloj,
                `cantidadRelojes` = :cantidadRelojes;';

				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':idVenta', $idVenta,PDO::PARAM_INT);
                $stmt->bindValue(':idReloj', $idReloj,PDO::PARAM_INT);
				$stmt->bindValue(':cantidadRelojes', $cantidadRelojes ,PDO::PARAM_INT);

				$stmt->execute();
			}
		catch(PDOException $e) {
			throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
		}
	}

    public function getRelojById($id){
        try {
            $sql = "SELECT reloj.nombreReloj, cantidadRelojes, FROM {$this->table_name} 
                JOIN reloj ON reloj.idReloj = idReloj;
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            throw new Exception("Error trying to add record to {$this->table_name} table: ".$e->getMessage());
        }

        return $result;
    }
}
?>