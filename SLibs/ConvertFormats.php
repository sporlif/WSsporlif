<?php

class ConvertFormats {

    public static function convertToArrayUniqueResponse($e) {

        return array("Response" => $e);
    }

    public static function convertToArrayError($e) {

        return array("Error" => $e);
    }

}

?>
