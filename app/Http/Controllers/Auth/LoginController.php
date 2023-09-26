<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // 追加
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/online-vote'); // 修正
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // ログイン成功時の処理
            return redirect()->intended($this->redirectTo);
        } else {
            // ログイン失敗時の処理
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput();
        }

    }
}
