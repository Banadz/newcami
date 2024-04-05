<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Compte;
use App\Models\Division;
use App\Models\Demande;
use App\Models\Materiel;
use App\Models\Origine;
use App\Models\OrigineMat;
use App\Models\Reference;
use App\Models\ReferenceOrigne;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Facades\Alert;

class InsertionController extends Controller
{
    public function Service(Request $request){

        $service = new Service;
        $service->CODE_SERVICE = $request->input('code_service');
        $service->LABEL_SERVICE = $request->input('label_service');
        $service->ENTETE1 = $request->input('entete1');
        $service->ENTETE2 = $request->input('entete2');
        $service->ENTETE3 = $request->input('entete3');
        $service->ENTETE4 = $request->input('entete4');
        $service->ENTETE5 = $request->input('entete5');
        $service->SIGLE_SERVICE = $request->input('sigle_service');
        $service->VILLE_SERVICE = $request->input('ville_service');
        $service->ADRESSE_SERVICE = $request->input('adresse_service');
        $service->CONTACT_SERVICE = $request->input('contact_service');
        $service->ADRESSE_MAIL = $request->input('adresse_mail');
        $service->save();

        return redirect()->route('service');
    }

    public function Division(Request $request){
        $division = new Division;
        $division->CODE_DIVISION = $request->input('code_division');
        $division->LABEL_DIVISION = $request->input('label_division');
        $division->CODE_SERVICE = $request->input('code_service');
        $division->save();
        // return $division;
        return redirect()->route('division');
    }

    public function multiAgent (Request $request){
        $dataAgent = $request->input('donnees');
        $donneesAgent = json_decode($dataAgent, true);
        $eff = 0;
        foreach($donneesAgent as $agentss){
            $agent = new Agent();
            $agent->MATRICULE = $agentss[0];
            $agent->NOM = $agentss[1];
            $agent->PRENOM = $agentss[2];
            $agent->GENRE = $agentss[3];
            $agent->CODE_DIVISION = $agentss[4];
            $agent->PHOTO = "";
            $agent->FONCTION = $agentss[5];
            $agent->TYPE = 'User';
            $agent->EMAIL = $agentss[6];
            $agent->PSEUDO = $agentss[1];
            $agent->PASSWORD = Hash::make('0000');
            $agent->ADRESSE_PHYSIQUE = $agentss[9];
            $agent->TELEPHONE = $agentss[7];
            // return $agent;
            $agent->save();
            $eff = $eff + 1;
        }
        return response()->json([
            'success' => true,
            'eff' => $eff
        ]);
    }

    public function multiArticle (Request $request){
        $user = Auth::user();
        $matricule = $user->MATRICULE;

        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $dataArticle = $request->input('donnees');
        $donneesArticle = json_decode($dataArticle, true);
        $eff = 0;
        try{
            foreach($donneesArticle as $articless){
                $label_cat = $articless[0];
                $categorie = Categorie::where('LABEL_CATEGORIE', '=', $label_cat)->first();
                $id_cool = $categorie['id'];

                $article = new Article();
                $article->id_categorie = $id_cool;
                $article->DESIGNATION = $articless[1];
                if(isset($articless[2])){
                    $article->SPECIFICATION = $articless[2];
                }
                $article->UNITE = $articless[3];
                $article->EFFECTIF = 0;
                $article->DISPONIBLE = true;
                $article->CODE_SERVICE = $code_service;
                $article->save();
                $eff = $eff + 1;
            }
            return response()->json([
                'success' => true,
                'eff' => $eff
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => $e
            ]);
        }
        
    }

    public function Agent (Request $request){
        $agent = new Agent();
        $agent->MATRICULE = $request->input('matricule');
        $agent->NOM = $request->input('nom');
        $agent->PRENOM = $request->input('prenom');
        $agent->CODE_DIVISION = $request->input('code_division');
        $agent->GENRE = $request->input('genre');
        $agent->PHOTO = "";
        $agent->FONCTION = $request->input('fonction');
        $agent->TYPE = $request->input('type');
        $agent->PSEUDO = $request->input('pseudo');
        $agent->EMAIL = $request->input('email');
        $agent->PASSWORD = Hash::make($request->input('password'));
        $agent->ADRESSE_PHYSIQUE = $request->input('adresse_physique');
        $agent->TELEPHONE = $request->input('telephone');
        // return $agent;
        $agent->save();

        return redirect()->route('agent');
    }

    public function Compte(Request $request){
        $compte = new Compte;
        $compte->COMPTE = $request->input('compte');
        $compte->LABEL_COMPTE = $request->input('label_compte');
        $compte->save();
        // return $compte;
        return redirect()->route('compte');
    }

    public function Categorie(Request $request){
        $categorie = new Categorie;
        $categorie->COMPTE = $request->input('compte');
        $categorie->LABEL_CATEGORIE = $request->input('label_categorie');
        $categorie->save();
        // return $categorie;
        return redirect()->route('categorie');
    }

    public function Article (Request $request){
        $user = Auth::user();
        $matricule = $user->MATRICULE;

        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        $article = new Article();
        $article->id_categorie = $request->input('id_categorie');
        $article->DESIGNATION = $request->input('designation');
        $article->SPECIFICATION = $request->input('specification');
        $article->UNITE = $request->input('unite');
        $article->EFFECTIF = 0;
        $article->DISPONIBLE = true;
        $article->CODE_SERVICE = $code_service;
        $article->save();

        return redirect()->route('article');
    }

    public function Demande(Request $request){
        $data = $request->input('donnees');
        $donnees = json_decode($data, true);

        $reference = new Reference();
        $ref = $reference->createReference();

        $user = Auth::user();
        $id = $user->MATRICULE;

        $agent = Agent::with('division.service')->where('MATRICULE', $id)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $reference->REFERENCE = $ref;
        $reference->MATRICULE = $id;
        $reference->ETAT = 'En attente';
        $reference->DATE_DEMANDE = Carbon::now();
        $reference->VALIDATION = null;
        $reference->LIVRAISON = null;
        $reference->CODE_SERVICE = $code_service;
        // Enregistrez le modèle dans la base de données
        $reference->save();

        foreach ($donnees as $ligne) {
            // Créez une nouvelle instance de votre modèle
            $demande = new Demande();

            $article = Article::where('id', $ligne[0])->first();
            // Affectez les données aux colonnes du modèle
            $demande->REF_DEMANDE = $ref;
            $demande->id_article = $ligne[0];
            $demande->QUANTITE = $ligne[3];
            $demande->STOCK = $article->EFFECTIF;
            $demande->UNITE = $article->UNITE;
            $demande->ETAT_DEMANDE = 'En attente';
            // ...

            // Enregistrez le modèle dans la base de données
            $demande->save();
        }

        return response()->json([
            'success' => true,
            'ref' => $ref
        ]);
    }//vita
    }//vita
    public function validerDem(Request $request){
        $data = $request->input('donnees');
        $donnees = json_decode($data, true);
        $reference = $request->input('reference');
        try{
            $de = Demande::where('id', $donnees[0][0])->first();
            $ref_demande = Reference::where('REFERENCE', '=', $de->REF_DEMANDE)->first();
            $ref_demande->ETAT = 'Livring';
            // $ref_demande->save();

            foreach ($donnees as $ligne) {
                $demande = Demande::with('article')->where('id', $ligne[0])->first();
                if ($ligne[4] == 0){
                    $demande->ETAT_DEMANDE = "Refused";
                }else{
                    if($ligne[4] != 0){
                        $demande->ETAT_DEMANDE = "Livring";
                    }else{
                        abort(404);
                    }
                }
                $demande->QUANTITE_ACC = $ligne[4];
                // $demande->save();

                $stock = $demande->article->EFFECTIF;
                $demande->article->EFFECTIF = $stock - $ligne[4];
                // $demande->article->save();
            }
            return response()->json([
                'success' => true,
                'ref' => $reference,
                'data' => $donnees
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e
            ]);
        }
    }

    public function refuserDem(Request $request){
        $data = $request->input('donnees');
        $donnees = json_decode($data, true);
        $reference = $request->input('reference');

        $de = Demande::where('id', $donnees[0][0])->first();
        $ref_demande = Reference::where('REFERENCE', '=', $de->REF_DEMANDE)->first();
        $ref_demande->ETAT = 'Refused';
        $ref_demande->save();

        foreach ($donnees as $ligne) {
            $demande = Demande::with('article')->where('id', $ligne[0])->first();
            $demande->ETAT_DEMANDE = "Refused";
            $demande->save();
        }
        return response()->json([
            'success' => true,
            'ref' => $reference
        ]);
    }

    public function confirmerDem(Request $request){
        $data = $request->input('donnees');
        $donnees = json_decode($data, true);
        $reference = $request->input('reference');

        foreach ($donnees as $ligne) {
            $demande = Demande::with('article')->where('id', $ligne[0])->first();
            $demande->QUANTITE_LIV = $ligne[5];
            $demande->ETAT_DEMANDE = 'Livré';
            $demande->save();
        }

        $de = Demande::where('id', $donnees[0][0])->first();
        $ref_demande = Reference::where('REFERENCE', '=', $de->REF_DEMANDE)->first();
        $ref_demande->ETAT = 'Livré';
        $ref_demande->save();

        return response()->json([
            'success' => true,
            'ref' => $reference
        ]);
    }
    public function Origine(Request $request){
        $data = $request->input('donnees');
        $nfact = $request->input('nfact');
        $donnees = json_decode($data, true);

        $reference = new ReferenceOrigne();
        $ref = $reference->createReference();

        $user = Auth::user();
        $matricule = $user->MATRICULE;

        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        // dd($code_service);

        // PRIX TOTAL...........
        $som = 0;
        foreach ($donnees as $ligne) {
            $som = $som + $ligne[6];
        }

        $reference->REFERENCE = $ref;
        $reference->CODE_SERVICE = $code_service;
        $reference->FACTURE = $ref;
        $reference->PRIX_TOTAL = $som;
        $reference->DATE_ORIGINE = Carbon::now();
        // Enregistrez le modèle dans la base de données
        $reference->save();

        foreach ($donnees as $ligne) {
            // Créez une nouvelle instance de votre modèle
            $origine = new Origine();

            $article = Article::where('id', $ligne[0])->first();
            // Affectez les données aux colonnes du modèle
            $origine->REF_ORIGINE = $ref;
            $origine->id_article = $ligne[0];
            $origine->QUANTITE = $ligne[3];
            $origine->STOCK = $article->EFFECTIF;
            $origine->PRIX = $ligne[5];
            $origine->MONTANT = $ligne[6];
            $origine->UNITE = $article->UNITE;
            $origine->ORIGINE = $ligne[7];
            // Enregistrez le modèle dans la base de données

            $oldEff = $article->EFFECTIF;
            $article->EFFECTIF = $oldEff + $ligne[3];
            $article->save();
            $origine->save();
        }

        return response()->json([
            'success' => true,
            'ref' => $ref
        ]);
    }
    public function Materiel(Request $request){
        $data = $request->input('donnees');
        $nfact = $request->input('nfact');
        $donnees = json_decode($data, true);

        $reference = new ReferenceOrigne();
        $ref = $reference->createReference();

        $user = Auth::user();
        $matricule = $user->MATRICULE;

        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        // dd($code_service);

        // PRIX TOTAL...........
        $som = 0;
        foreach ($donnees as $ligne) {
            $som = $som + $ligne[6];
        }

        $reference->REFERENCE = $ref;
        $reference->CODE_SERVICE = $code_service;
        $reference->FACTURE = $ref;
        $reference->PRIX_TOTAL = $som;
        $reference->DATE_ORIGINE = Carbon::now();
        // Enregistrez le modèle dans la base de données
        $reference->save();

        foreach ($donnees as $ligne) {
            // Créez une nouvelle instance de votre modèle
            $origine = new OrigineMat();
            // Affectez les données aux colonnes du modèle
            $origine->REF_ORIGINE = $ref;
            $origine->QUANTITE = $ligne[4];
            $origine->PRIX = $ligne[5];
            $origine->MONTANT = $ligne[6];
            $origine->ORIGINE = $ligne[0];
            // Enregistrez le modèle dans la base de données
            $origine->save();

            $id_origine = $origine->id;
            $compte = $ligne[4];
            for ($i = 1; $i < $compte + 1; $i++){
                $materiel = new Materiel();
                $materiel->DESIGN_MAT = $ligne[2];
                $materiel->SPEC_MAT = $ligne[3];
                $materiel->ETAT_MAT = "BON";
                $materiel->DATE_DEB = Carbon::now();
                $materiel->CODE_SERVICE = $code_service;
                $materiel->id_nomenclature = $ligne[8];
                $materiel->id_categorie = $ligne[7];
                $materiel->id_origine = $id_origine;

                $materiel->save();
            }
        }

        return response()->json([
            'success' => true,
            'ref' => $ref,
        ]);
    }
}
