<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SModels/GeneralInformation/MGenders.php';

class CGenders {

    public static function getGneders() {

        return MGenders::getGenders();
    }

}
