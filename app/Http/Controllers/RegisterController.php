<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kenlists;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Types;

class RegisterController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');

    }
    
    public function register()
    {
        $kens=Kenlists::get();
        return view('register', compact('kens'));
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $user_id = User::insertGetId([
            'username' => $data['username'],
             'email' => $data['email'], 
             'password' => bcrypt($data['password']), 
             'age_group' => $data['age_group'], 
             'gender'=>$data['gender'], 
             'location' => $data['location'], 
            ]);
            Auth::login(User::find($user_id));
            return redirect()->route('vote');
    }
}