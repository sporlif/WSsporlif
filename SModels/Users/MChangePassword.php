<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SLibs/SConnection.php';

class MChangePassword {

    public static function changePassword($emailUser) {

        $con = new SConnection();
        $email = "'" . $emailUser . "'";

        $query = 'select n from security.fukcreate_numberfr(' . $email . ') as ("n" varchar);';

        $res = $con->sQuery($query);
        $con->sCloseConecction();

        return $res;
    }

}

?>
