<?php

/**
 * Capa de Acceso a Datos- Esta capa se encarga únicamente de interactuar con la base de datos (DB).
 * 
 */


class Db
{
    public $connection;


    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            die("ERROR: Could not connect. " . $e->getMessage());
        }

        return $this->connection;
    }

    public function run($query, $args = []) {
        $stmt=$this->connection->prepare($query);
        $stmt->execute($args);
        return $stmt; 
    }
    
    /**
     * Obtiene todos los registros de una tabla
     * 
     * @param string $table
     * @param string $columns
     * @return array
     */
     
    public function findAll(string $table, string $columns = '*'): array
    {
        $query = "SELECT {$columns} FROM {$table}";
        $stmt = $this->connection->query($query);
        return $stmt->fetchAll();
    }
   /**
     * Cierra una conexion
     *
     * @return void
     */
    public function close()
    {
        $this->connection = null;
    }
}