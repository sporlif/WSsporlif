<?php

@session_start();

$_SESSION['rootws'] = dirname(__FILE__);
$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SControllers/Users.php';
require_once $pRootWS . '/SLibs/ConvertFormats.php';

const NO_MODULE = "NOMODULE";
const NO_EXIST_MODULE = "NOEXISTMOD";

$module = isset($_GET['mod']) ? $_GET['mod'] : null;
$option = isset($_GET['op']) ? $_GET['op'] : null;
$filter = isset($_GET['filter']) ? $_GET['filter'] : null;

if ($module === null) {
    echo ConvertFormats::convertToArrayError (NO_MODULE);
} else {

    $res = false;
    $result;

    switch ($module) {
        case 'user':
            $result = new Users();
            $res = true;
            break;
        default:
            echo ConvertFormats::convertToArrayError (NO_EXIST_MODULE);
            break;
    }

    if ($res) {
        echo json_encode($result->getResult($option, $filter), JSON_UNESCAPED_UNICODE);
    }
}
?>