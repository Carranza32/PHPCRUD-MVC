<?php

class Database {
    // Contenedor Instancia de la clase
    private static $instance = NULL;
    private $connection = NULL;

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "inventario_test";

    private function __contruct() {}
    // Constructor privado, previene la creación de objetos vía new
    private function __construct() {
        $connectionString = "mysql:host={$this->host};dbname={$this->db};charset=utf8";

        try {
            $this->connection = new PDO($connectionString, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            $this->connection = "Error de conexion";

            echo "ERROR: {$e->getMessage()}";
        }
    }

    // Clone no permitido
    private function __clone() { }

    // Método singleton 
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }
     
    public function executeQuery($sql) {
        $statement = $this->connection->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
     
    public function getResult() {
    }
     
    public function disconnect() {
    }
}
