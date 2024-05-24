<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function tologin(LoginRequest $request){

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
            ]);
            // return redirect()->intended(route('dashbord'));
        } else {
            return response()->json([
                'error' => true,
                'alert' => "Aucun compte correspondant trouvé"
            ]);
        //     // return redirect()->route('seConnecter');
        }
    }

    public function tologout(){
        Auth::logout();
        return to_route('seConnecter');
    }

    public function ajaxTologout(){
        Auth::logout();
        return response()->json([
            'disconnected' => true,
        ]);
    }
}
