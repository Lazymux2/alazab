<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails {
        verify as verifyTrait;
    }

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('signed')->only('verify'); <-- remove this: it is causing 403 for expired email verification URLs
        $this->middleware('throttle:6,1')->only('verify');
    }

    public function verify(Request $request)
    {
        
        if (!$request->hasValidSignature()) {
            // some custom message
        }
        else {
            return $this->verifyTrait($request);
        }
    }
}