<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Division;
use App\Models\Service;
use Illuminate\Http\Request;

class SupressionController extends Controller
{
    public function Service(Request $request){
        $code_service = $request->input('code_service');
        $service = Service::where('CODE_SERVICE', $code_service);
        $service->delete();
        // Service::destroy($label_service);
        return response()->json([
            'success' => true,
            'message' => "$code_service."
        ]);
    }

    public function Division (Request $request){
        $code_division = $request->input('code_division');
        $division = Division::where('CODE_DIVISION', $code_division);
        $division->delete();
        return response()->json([
            'success' => true,
            'message' => "$code_division."
        ]);
    }

    public function Compte(Request $request){
        $comptes = $request->input('compte');
        $compte = Compte::where('COMPTE', '=', $comptes);
        $compte->delete();
        return response()->json([
            'success' => true,
            'message' => "$comptes."
        ]);
    }
}
