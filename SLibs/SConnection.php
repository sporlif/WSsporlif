<?php

require_once('./SConfig/sconfig.php');

class SConnection extends PDO {

    private $sConnection;
    private $stringConnection = "pgsql:"
            . "host=" . SDB_HOST . ";"
            . "dbname=" . SDB_NAME . ";"
            . "user=" . SDB_USER . ";"
            . "port=" . SDB_PORT . ";"
            . "sslmode=require;"
            . "password=" . SDB_PASSWORD;

    public function __construct() {

        try {
            //$this->sConnection = parent::__construct('pgsql:host='.SDB_HOST.';dbname='.SDB_NAME,SDB_USER,SDB_PASSWORD);
            $this->sConnection = parent::__construct($this->stringConnection);
        } catch (PDOException $e) {
            print "¡Error in connection, am sorry!: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

    public function sQuery($query) {//consultas select
        try {
            
            $response = parent::prepare($query);
            if ($response->execute()) {    
                return $response;
            } else {
                return "ERRORQ";
            }
            
        } catch (PDOException $e) {
            print "¡Error in query PDO, am sorry!: " . $e->getMessage() . "<br/>";
            return "ERRORCON";
        }
    }

    public function sCheck($query) {//consultas select
        try {
            $response = parent::prepare($query);
            $response->execute();

            if ($response->rowCount() > 0)
                return true;
            else
                return false;
        } catch (PDOException $e) {
            print "¡Error in check PDO, am sorry!: " . $e->getMessage() . "<br/>";
        }
    }

    public function sExec($query) {//consultas insert, update, delete
        try {
            return parent::exec($query);
        } catch (PDOException $e) {
            print "¡Error in exec PDO, am sorry!: " . $e->getMessage() . "<br/>";
        }
    }

    public function sCloseConecction() {

        $this->sConnection = null;
    }

}
