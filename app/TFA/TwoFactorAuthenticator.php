<?php

namespace App\TFA;

use Session;

class TwoFactorAuthenticator
{
    protected $tfa;
    protected $issuer = "2FA Test by Deku";
    protected $secret;
    protected $user;

    public function __construct()
    {
        if (!\Auth::user())
            throw new \Illuminate\Auth\Access\AuthorizationException();

        $this->user = \Auth::user();
        $this->tfa = new \RobThree\Auth\TwoFactorAuth($this->issuer);
        $this->secret =$this->user->tfa_secret;
    }

    public function getTfa()
    {
        return $this->tfa;
    }

    public function setSecret()
    {
        $this->user->tfa_secret = $this->tfa->createSecret(160);
        $this->user->update();
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function getQRCode()
    {
        return $this->tfa->getQRCodeImageAsDataUri($this->user->name, $this->secret);
    }

    public function verifyCode($code)
    {
        return $this->tfa->verifyCode($this->secret, $code);
    }
}


?>