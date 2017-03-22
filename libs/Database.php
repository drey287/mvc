<?php

/**
 * Created by PhpStorm.
 * User: Andrei Ciubotariu
 * Date: 3/22/2017
 * Time: 10:50 AM
 */
class Database{

    private $dbh;
    private $error;
    private $stmt;



    public function __construct(){

        global $config;

        // Set DSN
        $dsn = 'mysql:host=' . $config['db']['CT_DB_HOST'] . ';dbname=' . $config['db']['CT_DB_NAME'];
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $config['db']['CT_DB_USER'], $config['db']['CT_DB_PASS'], $options);
        }
            // Catch any errors
        catch(PDOException $e){
            die ($e->getMessage());
        }
    }
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){
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
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
}