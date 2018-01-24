<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SModels/GeneralInformation/MPositions.php';

class CPositions {

    public static function getPositions() {

        return MPositions::getPositions();
    }

}
