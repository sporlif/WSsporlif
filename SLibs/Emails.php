<?php

@session_start();

$pRootWS = $_SESSION['rootws'];

require_once $pRootWS . '/Libs/PHPMailer/PHPMailerAutoload.php';
require_once $pRootWS . '/SConfig/sconfig_data_emails.php';

class Emails {

    private $phpMailer;

    public function launch() {

        $this->phpMailer = new PHPMailer();
        $this->phpMailer->IsSMTP();
        $this->phpMailer->SMTPAuth = true;
        $this->phpMailer->Host = HOST;
        $this->phpMailer->Username = USERNAME;
        $this->phpMailer->Password = PASSWORD;
        $this->phpMailer->SMTPSecure = 'tls';
        $this->phpMailer->Port = PORT;
        $this->phpMailer->From = FROM;
        $this->phpMailer->FromName = FROM_NAME;
        $this->phpMailer->IsHTML(true);
        
    }

    public function setAddressee($emailAddressee) {
        $this->phpMailer->addAddress($emailAddressee);
    }

    public function createEmailBody($subject, $body, $altBody) {
        $this->phpMailer->Subject = $subject;
        $this->phpMailer->Body = $body;
        $this->phpMailer->AltBody = $altBody;
    }

    private function send() {
        return $this->phpMailer->Send();
    }

    public function sends() {

        $intents = 0;
        $response;

        do {

            $response = $this->send();
            $intents++;
        } while (($response === false) && ($intents < 3));

        return $response === false ? "Error: " . $this->phpMailer->ErrorInfo : $response;
    }

}

?>
