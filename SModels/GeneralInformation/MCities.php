<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SLibs/SConnection.php';

class MCities {

    public static function getCities($filter) {

        $con = new SConnection();

        $filter = "'" . $filter . "'";

        $query = 'select d1, d2 from information.fukget_cities(' . $filter . ') as ("d1" integer, "d2" varchar);';

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
