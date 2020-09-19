<?php
class CBCCrypt {
    private $iv;
 
    private $encryptKey;

    public function __construct()
    {
        $this->iv = "cbcisfunsoisbase";
        $this->encryptKey = file_get_contents('/secret.txt');
    }

    public function encrypt($encryptStr) {
        $iv = $this->iv;
        $encryptKey = $this->encryptKey;

        $encrypted=openssl_encrypt($encryptStr, 'aes-128-cbc', $encryptKey, true, $iv);
 
        return base64_encode($iv.$encrypted);
 
    }

    public function decrypt($encryptStr) {
        $iv = substr(base64_decode($encryptStr),0,16);
        $encryptKey = $this->encryptKey;
        $encrypted = substr(base64_decode($encryptStr),16);
        $decrypted = openssl_decrypt($encrypted, 'aes-128-cbc', $encryptKey, true, $iv);

        return $decrypted;
    }
}