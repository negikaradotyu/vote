<?php

namespace App\Http\Controllers\Auth;
use AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authファサードのuse文を追加

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // バリデーションルールを定義
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        // バリデーションを実行
        $this->validate($request, $rules);

        // 認証を試みる
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // ログイン成功時の処理
            return redirect()->intended('/online-vote'); // ログイン後のリダイレクト先
        } else {
            // ログイン失敗時の処理
            return back()->withErrors(['email' => 'ログインに失敗しました。'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // ユーザーをログアウトさせる

        return redirect('/online-vote'); // ログアウト後のリダイレクト先を指定
    }
}


