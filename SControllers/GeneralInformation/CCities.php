<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SModels/GeneralInformation/MCities.php';

class CCities {

    public static function getCities($filter) {

        return MCities::getCities($filter);
        
    }

}

?>
