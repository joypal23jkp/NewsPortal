<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
// password via verification code.
//    public function showLinkRequestForm()
//    {
//        return view('auth.passwords.email');
//    }
//
//    public function sendResetLinkEmail(Request $request)
//    {
//        $this->validateEmail($request);
//
//        $user = User::whereEmail($request->post('email'))->first();
//        if(!$user) {
//            return redirect()->back()->withInput()->withErrors([
//                'email' => 'No User Found!'
//            ]);
//        }
//
//        $code = mt_rand(111111, 999999);
//
//        DB::table('password_resets')
//            ->updateOrInsert([
//                'email' => $user->email
//            ],
//            [
//                'token' => Hash::make($code),
//                'created_at'    => Carbon::now()
//            ]);
//
//
//        $this->mailTo($code, $request->post('email'));
//
//
////        return $response == Password::RESET_LINK_SENT
////            ? $this->sendResetLinkResponse($request, $response)
////            : $this->sendResetLinkFailedResponse($request, $response);
//    }
//
//    protected function validateEmail(Request $request)
//    {
//        $request->validate(['email' => 'required|email']);
//    }
//
//    protected function mailTo($code, $email){
//        Mail::to($email)->send(new ResetPassMail($code));
//    }

}
