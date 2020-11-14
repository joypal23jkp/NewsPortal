<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AdminVerifyMail;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('signed')->only('verify');
//        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('admin.auth.verify');
    }

    public function send(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:admins|max:255',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $code = mt_rand(111111, 999999);

        Mail::to($request->post('email'))->send(new AdminVerifyMail($code));

        $admin = new Admin();
        $admin->name =  $request->post('name');
        $admin->email =  $request->post('email');
        $admin->password = Hash::make($request->post('password'));
        $admin->code = Hash::make($code);
        $admin->save();
        Cookie::queue('vcode', $code);
        return view('admin.auth.verificationWithCode', ['email' => $request->post('email')]);
    }

    public function verifySubmit(Request $request){
        $admin = Admin::where('email', $request->post('email'))->first();
//        dd(Carbon::now()->diffInMinutes($admin->created_at) . Cookie::get('vcode'). $request->post('code'));
        if (Carbon::now()->diffInMinutes($admin->created_at) <= 30 && Cookie::get('vcode') == $request->post('code')){
            Cookie::queue('vcode', null);
            $admin->code = null;
            $admin->save();
            return redirect(route('admin.dashboard'))->with(['success', 'Successful!']);
        }
        Admin::where('email', $request->post('email'))->delete();
        return redirect(route("admin.register"))->withErrors(['Error', 'Code Mismatched !']);
    }
}
