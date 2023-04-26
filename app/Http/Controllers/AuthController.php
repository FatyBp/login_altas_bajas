<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __constructor(){
        $this->Middleware(['guest'])->only(['index']);
    }
    public function login(){
        return view('login');
    }
    public function logear(Request $request){
        $credenciales = $request->only('name', 'password');
        if (Auth::attempt($credenciales)) {
            return redirect()->route('index');
        }else{
            return back()->withInput($credenciales);
        }

    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('auth-login');
    }
    public function agregarNuevo(){
        $item = new User();
        $item->name = 'cliente';
        $item->password = Hash::make('12345');
        $item->save();
        return $item;
    }
}
