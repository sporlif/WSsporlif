<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/SModels/Users/MChangePassword.php';
require_once $pRootWS . '/SLibs/Emails.php';
require_once $pRootWS . '/SConfig/sconfig_data_emails.php';
require_once $pRootWS . '/SLibs/ConvertFormats.php';

class CChangePassword {

    public static function changePassword($emailUser) {

        $stateVerificationCode;

        $stateVerificationCode = MChangePassword::changePassword($emailUser)->fetch(PDO::FETCH_OBJ)->n;

        if ($stateVerificationCode !== 'NOFOUNDUSER') {
            return self::sendVerificationCode($emailUser, $stateVerificationCode);
        } else {
            return ConvertFormats::convertToArrayUniqueResponse($stateVerificationCode);
        }
    }

    private static function sendVerificationCode($emailAddressee, $code) {

        $email = new Emails();

        $email->launch();
        $email->setAddressee($emailAddressee);
        $email->createEmailBody(RECOVER_SUBJECT, RECOVER_BODY . $code, RECOVER_ALTBODY);

        $response = $email->sends();

        if ($response === true) {
            return ConvertFormats::convertToArrayUniqueResponse('OKSEND');
        } else {
            return ConvertFormats::convertToArrayUniqueResponse('NOSEND');
        }
    }

}

?>