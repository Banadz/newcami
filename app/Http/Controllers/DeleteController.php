<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reference;
use App\Models\Demande;

class DeleteController extends Controller
{
    public function Demande(Request $request){
        $user = Auth::user();
        $type = $user->TYPE;
        $ref = $request->input('ref');
        $rdemande = Reference::where('REFERENCE','=', $ref);
        // $rdemande->delete();

        return response()->json([
            'success' => true,
            'ref' => $ref
        ]);
    }
}
