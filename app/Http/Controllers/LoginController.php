<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function tologin_perform(LoginRequest $request){
        $credentials = $request->validated();
        $matricule = $request->input('MATRICULE');
        $user = Agent::where('MATRICULE', '=', $matricule)->first();
        if ($user){
            $pass = $request->input('password');
            if (Hash::check($pass, $user->PASSWORD)) {

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
        
                    return response()->json([
                        'success' => true,
                    ]);
                    // return redirect()->intended(route('dashbord'));
                } else {
                    return response()->json([
                        'error' => true,
                        'alert' => "Le mot de passe et le matricule ne correspond pas"
                    ]);
                //     // return redirect()->route('seConnecter');
                }

            } else {
                return response()->json([
                    'error' => true,
                    'alert' => "Votre mot de passe est incorrect"
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'alert' => "Aucun compte correspondant avec votre matricule."
            ]);
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
