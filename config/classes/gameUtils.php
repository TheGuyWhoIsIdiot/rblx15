<?php

class gameUtils {
    public static function signv1($script) {
        $script = "\r\n" . $script;
        $sign = "";
        $key = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/config/classes/includes/private.pem");
        openssl_sign($script, $sign, $key, OPENSSL_ALGO_SHA1);
        return "--rbxsig" . sprintf("%%%s%%%s", base64_encode($sign), $script);
    }
    public static function GenerateClientTicketv1($userId, $username, $characterApp, $jobId) {

        $privatekey = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/config/classes/includes/private.pem");

        $ticket = $userId . "\n" . $jobId . "\n" . date('n\/j\/Y\ g\:i\:s\ A');

        openssl_sign($ticket, $sig, $privatekey, OPENSSL_ALGO_SHA1);

        $sig = base64_encode($sig);

        $ticket2 = $userId . "\n" . $username . "\n" . $characterApp . "\n" . $jobId . "\n" . date('n\/j\/Y\ g\:i\:s\ A');

        openssl_sign($ticket2, $sig2, $privatekey, OPENSSL_ALGO_SHA1);

        $sig2 = base64_encode($sig2);

        $final = date('n\/j\/Y\ g\:i\:s\ A') . ";" . $sig2 . ";" . $sig;
        
        return ($final);
    }
}
        
