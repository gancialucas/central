<?php

// Clase para conectarse con la Base de Datos y ejecutar consultas
class DataBase
{

    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $dbh; // "data base handler"
    private $stmt; // "statment"
    private $error;

    public function __construct()
    {
        // Configurar conexión
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Crear una instancia de PDO
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Preparamos la consulta
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Vinculamos la consulta con bind
    public function bind($parameter, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($parameter, $value, $type);
    }

    // Función que ejecuta la consulta
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Obtener los registros de la consulta
    public function registers()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtener un solo registro de la consulta
    public function register()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Obtener la cantidad de filas con el método rowCount
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
