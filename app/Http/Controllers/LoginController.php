<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function tologin(LoginRequest $request){
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashbord'));
        }
        // $users = DB::table('AGENT')->where('MATRICULE', $credentials['MATRICULE']);
        // if (! $users = 1 ){
            return to_route('seConnecter')->withErrors([
                'MATRICULE' => "Aucun identifiant correspondant"
            ])->onlyInput('MATRICULE');
        // }
        // return to_route('seConnecter')->withErrors([
        //     'password' => "Mot de passe incorrect"
        // ])->onlyInput('MATRICULE');
        // var_dump($users);
    }

    public function tologout(){
        Auth::logout();
        return to_route('seConnecter');
    }
}
