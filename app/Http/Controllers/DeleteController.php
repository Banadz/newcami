<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Compte;
use App\Models\Demande;
use App\Models\Reference;
use App\Models\Division;
use App\Models\Materiel;
use App\Models\Service;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function Demande(Request $request){
        $user = Auth::user();
        $type = $user->TYPE;
        $ref = $request->input('ref');
        $rdemande = Reference::where('REFERENCE','=', $ref);
        $rdemande->delete();

        return response()->json([
            'success' => true,
            'ref' => $ref
        ]);
    }
}
