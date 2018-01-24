<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SControllers/GeneralInformation/CCities.php';
require_once $pRootWS . '/SControllers/GeneralInformation/CGenders.php';
require_once $pRootWS . '/SControllers/GeneralInformation/CPositions.php';
require_once $pRootWS . '/SControllers/Users/CChangePassword.php';
require_once $pRootWS . '/SLibs/ConvertFormats.php';

const NO_ISSET_OP = "NOISSETOP";
const EMPTY_VAR_OP = "EMPTYVAROP";
const NO_FILTER = "NOFILTER";
const NO_EXIST_ARGUMENT = "NOEXISTARGU";

class Users {

    public function getResult($option, $filter) {

        if ($option === null)
            return ConvertFormats::convertToArrayError (NO_ISSET_OP);
        else if (empty($option))
            return ConvertFormats::convertToArrayError (EMPTY_VAR_OP);
        else {

            switch ($option) {
                case 'getC':
                    return $filter === null ? ConvertFormats::convertToArrayError (NO_FILTER) : CCities::getCities($filter);
                case 'getG':
                    return CGenders::getGneders();
                case 'getP':
                    return CPositions::getPositions();
                case 'changedP':
                    return $filter === null ? ConvertFormats::convertToArrayError (NO_FILTER) : CChangePassword::changePassword($filter);
                default:
                    return ConvertFormats::convertToArrayError (NO_EXIST_ARGUMENT);
                    break;
            }
        }
    }

}
?>

