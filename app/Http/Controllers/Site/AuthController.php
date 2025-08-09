<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialtie;
Use Alert;
use Auth;
use App\Enums\AcademicDegrees;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function index(){
        $specialties = Specialtie::all();
        $degrees = AcademicDegrees::options();
        return view('Site.Auth.register', compact('specialties','degrees'));
    }
    public function loginIndex(){
        return view('Site.Auth.login');
    }


    public function resetpassword()
    {
        return view('Site.Auth.resset_password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
        ]);

        $user = User::where('phone', $request->phone)->first();

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        $link = url('/reset-password/form?token=' . $token . '&email=' . urlencode($user->email));
        return redirect($link);
    }

    public function showResetForm(Request $request)
    {
        return view('Site.Auth.reset_form', [
            'token' => $request->token,
            'email' => $request->email
        ]);
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $reset = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$reset) {
            Alert::error(__('Error'), __('Invalid or expired token.'));
            return back();
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        Alert::success(__('Success'), __('Password reset successfully'));
        return redirect()->route('Site.home.index');
    }

    public function register(Request $request){

        $validated = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:8|confirmed',
        ]);


        User::create($request->except(['password_confirmation']));

        Alert::success(__('Success'),__('register success'));
        return redirect()->route('Site.login.index');

    }

    public function login(Request $request)
    {

        $credentials = request(['email','password']);


        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('Site.home.index');
        }
        return redirect()->route('Site.login.index')->withErrors(['credential' => __('Incorrect email or password')])->withInput();
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        Alert::success(__('Success'), __('Logout Successfully'));
        return redirect()->route('Site.home.index');
    }

}
