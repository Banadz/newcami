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
use Illuminate\Support\Facades\Hash;

class getController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('fr');
    }
    public function Service(Request $request){
        $code_service = $request->input('code_service');
        if(!$code_service){
            $services = Service::all();
        }
        $services = Service::where('CODE_SERVICE', $code_service)->get();

        return response()->json([
            'success' => true,
            'service' => $services
        ]);
    }
    public function allService(Request $request){
        // $code_service = $request->input('code_service');
        // if(!$code_service){
        $services = Service::all();
        // }
        // $services = Service::where('CODE_SERVICE', $code_service)->get();

        return response()->json([
            'success' => true,
            'service' => $services
        ]);
    }

    public function Division(Request $request){
        $code_division = $request->input('code_division');
        $division = Division::where('CODE_DIVISION', '=',$code_division)->limit(1)->get();
        $services = Service::get();
        return response()->json([
            'success' => true,
            'division' => $division,
            'allService' => $services
        ]);
    }
    public function allDivision(Request $request){
        $divisions = Division::all();
        return response()->json([
            'success' => true,
            'division' => $divisions
        ]);
    }
    public function GroupDivision(Request $request){
        $code_service = $request->input('code_service');
        $divisions = Division::where('CODE_SERVICE', '=', $code_service)->get();
        return response()->json([
            'success' => true,
            'divisions' => $divisions
        ]);
    }

    public function Agent(Request $request){
        $matricule = $request->input('matricule');
        $agent = Agent::where('MATRICULE', '=', $matricule)->limit(1)->with('division')->get();
        $code_service = $agent[0]->division?->CODE_SERVICE;

        $divisions = Division::where('CODE_SERVICE', '=', $code_service)->get();

        $user = Auth::user();
        $matricule = $user->MATRICULE;
        
        $important = $user->PASSWORD;
        if (Hash::check('0000', $important)) {
            $match = true;
        } else {
            $match = false;
        }

        return response()->json([
            'success' => true,
            'agent' => $agent,
            'divisions' => $divisions,
            'newUser' => $match
        ]);
    }
    public function allAgent(Request $request){
        $agents = Agent::all();
        return response()->json([
            'success' => true,
            'agent' => $agents
        ]);
    }

    public function Categorie(Request $request){
        $id = $request->input('id');
        $categorie = Categorie::where('id', $id)->get();

        $comptes = Compte::get();
        return response()->json([
            'success' => true,
            'categorie' => $categorie,
            'comptes' => $comptes
        ]);

    }

    public function GroupCategorie(Request $request){
        $compte = $request->input('compte');
        $categories = Categorie::where('COMPTE', '=', $compte)->get();
        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);
    }

    public function getArticle(Request $request){
        $id = $request->input('id');
        $article = Article::where('id', $id)->get();

        $comptes = Compte::get();
        $categories = Categorie::get();
        return response()->json([
            'success' => true,
            'categorie' => $categories,
            'comptes' => $comptes,
            'articles' => $article
        ]);
    }

    public function GroupArticle(Request $request){
        $id_categroie = $request->input('id_categorie');
        $articles = Article::where('id_categorie', '=', $id_categroie)->get();
        return response()->json([
            'success' => true,
            'articles' => $articles
        ]);
    }

    public function GroupAgent(Request $request){
        $num = $request->input('num');
        $materiel = Materiel::where('REF_MAT', '=', $num)->first();

        $division = $request->input('division');
        $agents = Agent::where('CODE_DIVISION', '=', $division)
        ->where('CODE_DIVISION', '=', $division)
        ->where('MATRICULE', '!=', $materiel->MATRICULE)->get();
        return response()->json([
            'success' => true,
            'agents' => $agents
        ]);
    }
    public function GroupDetenteur(Request $request){
        $num = $request->input('num');
        $materiel = Materiel::where('REF_MAT', '=', $num)->first();

        $division = $request->input('division');
        $agents = Agent::where('CODE_DIVISION', '=', $division)->get();
        return response()->json([
            'success' => true,
            'agents' => $agents
        ]);
    }

    public function Quantite(Request $request){
        $id = $request->input('article');
        $article = Article::where('id', '=', $id)->get();
        return response()->json([
            'success' => true,
            'article' => $article
        ]);
    }

    public function QuantiteValidation(Request $request){
        $id = $request->input('article');
        $article = Article::where('id', '=', $id)->get();
        $cumulus = Demande::where('id_article', '=', $id)
                            ->where('ETAT_DEMANDE', '=', 'Livring')->get();
        $qcumulus = 0;
        foreach ($cumulus as $cumulu) {
            $qcumulus = $qcumulus + $cumulu->QUANTITE_ACC;
        }
        return response()->json([
            'success' => true,
            'article' => $article,
            'qcumulus' => $qcumulus
        ]);
    }

    public function allData(Request $request){

        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $comptes = Compte::get();
        $categories = Categorie::with('compte')->get();
        $articles = Article::with('categorie.compte')->where('CODE_SERVICE', '=', $code_service)->get();
        return response()->json([
            'comptes' => $comptes,
            'categories' => $categories,
            'articles' => $articles
        ]);
    }
    public function demandeDivision(Request $request){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $nombreDemandesParDivision = Division::with(['agents.references'])
        ->where('CODE_SERVICE', '=', $code_service )->get()
        ->map(function ($division) {
            $nombreReferences = 0;
    
            foreach ($division->agents as $agent) {
                $nombreReferences += $agent->references->count();
            }
    
            return [
                'CODE_DIVISION' => $division->CODE_DIVISION,
                'nombre_references' => $nombreReferences,
            ];
        });
        // $nombreDemandesParDivision = Division::with(['agents.references'])
        // ->get();

        // $demandes = Division::with('agents.references')->groupBy('divisinon.agents.references.CODE_DIVISION')->count();
        return response()->json([
            'success' => true,
            'demandes' => $nombreDemandesParDivision
        ]);
    }

    public function GroupDemande(Request $request){
        $user = Auth::user();
        $type = $user->TYPE;

        $ref = $request->input('ref');
        $demandes = Demande::with('article', 'reference')->where('REF_DEMANDE', '=', $ref)->get();
        return response()->json([
            'success' => true,
            'demandes' => $demandes,
            'user' => $type
        ]);
    }

    public function VerifyDemande(Request $request){
        $user = Auth::user();
        $type = $user->TYPE;

        $ref = $request->input('ref');
        $demande = Reference::with('demandes')->where('REFERENCE', '=', $ref)->first();
        $statut = $demande->ETAT;
        return response()->json([
            'success' => true,
            'statut' => $statut
        ]);
    }

    public function SearchCondemnation(Request $request){
        $materiel = Materiel::with('origine.reference.service', 'nomenclature', 'categorie.compte', 'sortie')
                    ->where('id', '=', $request->input('id'))->first();
        $carbonDate = Carbon::parse($materiel->sortie->DATE);
        $materiel->sortie->DATE = $carbonDate->isoFormat('D MMMM YYYY');
        $carbonDate = Carbon::parse($materiel->origine->reference->DATE_ORIGINE);
        $materiel->origine->reference->DATE_ORIGINE = $carbonDate->isoFormat('D MMMM YYYY');
        return response()->json([
            'success' => true,
            'materiel' => $materiel
        ]);
    }
    
    public function searchDem(Request $request)
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $dates = $request->input('date');
        $typedate = $request->input('typedate');
        $endDate = $request->input('endDate');
        $structure = $request->input('structure');
        $article = $request->input('article');

        $query = Reference::query();
        $query->with('demandes.article','agent.division');
        $query->where('CODE_SERVICE', '=', $code_service);
        $query->where('ETAT', '=', 'Waiting');
        $query->withCount('demandes');

        if ($dates) {
            if ($typedate == 'UNIQUE'){
                $query->whereDate('DATE_DEMANDE', '=', $dates);
            }
            if ($typedate == 'START'){
                $query->whereDate('DATE_DEMANDE', '>=', $dates);
                if ($endDate){
                    $query->whereDate('DATE_DEMANDE', '<=', $endDate);
                }
            }
            if ($typedate == 'END'){
                $query->whereDate('DATE_DEMANDE', '<=', $dates);
            }
        }

        // Ajouter d'autres conditions si nécessaire
        if ($structure) {
            $query->whereHas('agent.division', function($conditionnal) use ($structure){
                $conditionnal->where('CODE_DIVISION', '=', $structure);
            });
        }
        if ($article) {
            $query->whereHas('demandes.article', function($condition) use ($article){
                $condition->where('DESIGNATION', 'LIKE', "%$article%");
            });
        }

        // Exécuter la requête et récupérer les résultats
        
        if ($user->TYPE == "User"){
            $query->where('MATRICULE', '=', $matricule);
        }
        $references = $query->get();

        foreach ($references as $dd) {
            $carbonDateDEB = Carbon::parse($dd->DATE_DEMANDE);
            $dd->DATE_DEMANDE = $carbonDateDEB->isoFormat('D MMMM YYYY [à] H [heure et] mm [minutes]');
        }
        

        return response()->json([
            'references' => $references
        ]);
    }

    

    public function verifypass(Request $request){
        $user = Auth::user();
        $matricule = $user->MATRICULE;

        $oldpass = $request->input('oldpass');
        
        $important = $user->PASSWORD;
        

        if (Hash::check($oldpass, $important)) {
            return response()->json([
                'success' => true,
                'match' => true
            ]);
        } else {
            return response()->json([
                'success' => true,
                'match' => false
            ]);
        }
    }

}
