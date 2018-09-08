<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\TFA\TwoFactorAuthenticator;
use Illuminate\Http\Request;

class TwoFactorAuthController extends Controller
{
    public function __invoke()
    {
        $tfa = new TwoFactorAuthenticator();
        $tfa->setSecret();
        return view('welcome')
                ->with('qrCode', $tfa->getQRCode())
                ->with('secret', $tfa->getSecret());
    }

    public function check(Request $request)
    {
        $tfa = new TwoFactorAuthenticator();
        $verified = $tfa->verifyCode($request->input('code'));
        $result = $verified ? 'Código OK' : 'Código inválido';

        return view('welcome')
                ->with('qrCode', $tfa->getQRCode())
                ->with('secret', $tfa->getSecret())
                ->with('result', [$verified, $result]);
    }
}

?>