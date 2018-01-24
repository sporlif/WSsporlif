<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SLibs/SConnection.php';

class MGenders {

    public static function getGenders() {

        $con = new SConnection();

        $query = 'select d1, d2, d3 from users.fukget_gender() as ("d1" integer, "d2" varchar, "d3" varchar);';

        $i = 0;
        $requestq = array();
        $res = $con->sQuery($query);

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            $requestq[$i] = $row;
            $i++;
        }

        $con->sCloseConecction();
        return $requestq;
    }

}
