<?php

namespace App\Http\Controllers;

use App\TFA\TwoFactorAuthenticator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function __invoke()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $this->middleware('auth');

        $tfa = new TwoFactorAuthenticator();
        $viewBuilder = view('home')
            ->with('qrCode', $tfa->getQRCode())
            ->with('secret', $tfa->getSecret());

        return $viewBuilder;
    }

    public function generate()
    {
        $tfa = new TwoFactorAuthenticator();
        $tfa->setSecret();
        return redirect()->back();
    }

    public function verify(Request $request)
    {
        $this->middleware('auth');

        $tfa = new TwoFactorAuthenticator();
        $verified = $tfa->verifyCode($request->input('code'));
        $result = $verified ? 'Código OK' : 'Código inválido';

        return redirect()->back()
                ->with('result', [$verified, $result]);
    }
}
