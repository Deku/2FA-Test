<?php

namespace App\TFA;

use Session;

class TwoFactorAuthenticator
{
    protected $tfa;
    protected $issuer = "2FA Test by Deku";
    protected $secret;

    public function __construct()
    {
        $this->tfa = new \RobThree\Auth\TwoFactorAuth($this->issuer);
        $this->secret = Session::has('tfa_secret') ? Session::get('tfa_secret') : NULL;
    }

    public function getTfa()
    {
        return $this->tfa;
    }

    public function setSecret()
    {
        if (!Session::get('tfa_secret'))
        {
            $this->secret = $this->tfa->createSecret(160);
            Session::put(['tfa_secret' => $this->secret]);
        }
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function getQRCode()
    {
        return $this->tfa->getQRCodeImageAsDataUri('Deku', $this->secret);
    }

    public function verifyCode($code)
    {
        return $this->tfa->verifyCode($this->secret, $code);
    }
}


?>