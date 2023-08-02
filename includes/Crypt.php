<?php

Class Crypt
{
    private $ENC_METHOD = "AES-256-CBC";
    private $ENC_KEY = "&=+ab4#3CM_fg_-:/z1875k&à-ç-è";
    private $ENC_IV = "00213005540199821";
    private $ENC_SALT = "xS$";

    function __construct($METHOD = NULL, $KEY = NULL, $IV = NULL, $SALT = NULL)
    {
        try {
            $this->ENC_METHOD = (isset($METHOD) && !empty($METHOD) && $METHOD != NULL) ?
                $METHOD : $this->ENC_METHOD;
            $this->ENC_KEY = (isset($KEY) && !empty($KEY) && $KEY != NULL) ?
                $KEY : $this->ENC_KEY;
            $this->ENC_IV = (isset($IV) && !empty($IV) && $IV != NULL) ?
                $IV : $this->ENC_IV;
            $this->ENC_SALT = (isset($SALT) && !empty($SALT) && $SALT != NULL) ?
                $SALT : $this->ENC_SALT;
        } catch (Exception $e) {
            return "Caught exception: " . $e->getMessage();
        }
    }

    public function Encrypt($string)
    {
        try {
            $output = false;
            $key = hash('sha256', $this->ENC_KEY);
            $iv = substr(hash('sha256', $this->ENC_IV), 0, 16);
            $output = openssl_encrypt($string, $this->ENC_METHOD, $key, 0, $iv);
            $output = base64_encode($output);
            return $output;
        } catch (Exception $e) {
            return "Caught exception: " . $e->getMessage();
        }
    }

    public function Decrypt($string)
    {
        try {
            $output = false;
            $key = hash('sha256', $this->ENC_KEY);
            $iv = substr(hash('sha256', $this->ENC_IV), 0, 16);

            $output = openssl_decrypt(base64_decode($string), $this->ENC_METHOD, $key, 0, $iv);
            return $output;
        } catch (Exception $e) {
            return "Caught exception: " . $e->getMessage();
        }
    }
}

