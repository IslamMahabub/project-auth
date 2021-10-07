<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Validator;

class OTPController extends Controller
{

    /**
     * Show OTP login page
     *
     * @return View
     */
    public function login(): View
    {
        return view('auth/otp_login');
    }

    /**
     * Validate and login using OTP
     *
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function loginWithOtp(Request $request)
    {
        $user  = User::where([['mobile','=',request('mobile')],['otp','=',request('otp')]])->first();
        if( $user){
            Auth::login($user, true);
            User::where('mobile','=',$request->mobile)->update(['otp' => null]);
            return view('home');
        }
        else{
            return redirect()->route('login-with-otp')
                ->with('error','Invalid OTP, Resend OTP');
        }
    }

    /**
     * Send OTP ajax request
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendOtp(Request $request): JsonResponse
    {
        $otp = rand(1000,9999);
        $user = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);

        // send otp to mobile no using sms api
        Log::info("otp = ".$otp);
        // send otp to mobile no using sms api

        return response()->json([$user],200);
    }
}
