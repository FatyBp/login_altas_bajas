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
        $this->middleware(['guest'])->only(['auth-login']);
    }
    public function login(){
        return view('login');
    }
    public function logear(Request $request){
        $credenciales = $request->only('name', 'password');
        if (Auth::attempt($credenciales)) {
            alert()->success('Bienvenido');
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
    return view('/createUsuario');
    }
    public function nuevo(Request $request){
        $item = new User();
        $item->name = $request->name;
        $item->password = Hash::make($request->password);
        $item->save();
        return redirect()->route('auth-login');
    }
}
