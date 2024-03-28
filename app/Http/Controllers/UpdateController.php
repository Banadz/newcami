<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Categorie;
use App\Models\Compte;
use App\Models\Division;
use App\Models\Service;
use App\Models\Article;
use App\Models\Historique;
use App\Models\Materiel;
use App\Models\Sortie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function Service(Request $request){
        $code_service = $request->input('code_service');
        $service = Service::where('CODE_SERVICE', $code_service)->first();

        $service->LABEL_SERVICE = $request->input('label_service');
        $service->VILLE_SERVICE = $request->input('ville_service');
        $service->ADRESSE_SERVICE = $request->input('adresse_service');
        $service->ADRESSE_MAIL = $request->input('adresse_mail');
        $service->CONTACT_SERVICE = $request->input('contact_service');
        $service->SIGLE_SERVICE = $request->input('sigle_service');
        $service->ENTETE1 = $request->input('entete1');
        $service->ENTETE2 = $request->input('entete2');
        $service->ENTETE3 = $request->input('entete3');
        $service->ENTETE4 = $request->input('entete4');
        $service->ENTETE5 = $request->input('entete5');
        $service->save();

        return response()->json([
            'success' => true,
            'service' => $code_service
        ]);

    }

    public function Division(Request $request){
        $code_division = $request->input('code_division');
        $division = Division::where('CODE_DIVISION', $code_division)->first();

        $division->CODE_DIVISION = $request->input('code_division');
        $division->LABEL_DIVISION = $request->input('label_division');
        $division->CODE_SERVICE = $request->input('code_service');
        $division->save();

        return response()->json([
            'success' => true,
            'service' => $code_division
        ]);

    }

    public function Agent(Request $request){
        $matricule = $request->input('matricule');
        $agent = Agent::where('MATRICULE', $matricule)->first();

        $agent->NOM = $request->input('nom');
        $agent->PRENOM = $request->input('prenom');
        $agent->GENRE = $request->input('genre');
        $agent->ADRESSE_PHYSIQUE = $request->input('adresse_physique');
        $agent->TELEPHONE = $request->input('telephone');
        $agent->EMAIL = $request->input('email');
        $agent->PSEUDO = $request->input('pseudo');
        $agent->TYPE = $request->input('type');
        $agent->FONCTION = $request->input('fonction');
        $agent->CODE_DIVISION = $request->input('code_division');
        $agent->save();

        return response()->json([
            'success' => true,
            'agent' => $matricule
        ]);

    }

    public function UpdateProfil(Request $request){
        $matricule = $request->input('matricule');
        $agent = Agent::where('MATRICULE', $matricule)->first();

        $agent->TELEPHONE = $request->input('telephone');
        $agent->EMAIL = $request->input('email');
        $agent->PASSWORD = $request->input('password');
        $agent->save();

        return response()->json([
            'success' => true,
            'agent' => $matricule
        ]);

    }

    public function Profil(Request $request){
        // $user = Auth::user();
        // $matricule = $user->MATRICULE;

        // $agent = Agent::where('MATRICULE', $matricule)->first();

        // $agent->NOM = $request->input('nomP');
        // $agent->PRENOM = $request->input('prenomP');
        // $agent->GENRE = $request->input('genreP');
        // $agent->ADRESSE_PHYSIQUE = $request->input('adresseP');
        // $agent->PSEUDO = $request->input('title');

        // // $agent->save();

        // return response()->json([
        //     'success' => true,
        //     'agent' => $matricule
        // ]);
        dump($request->input('title'));

    }

    public function Compte(Request $request){
        $comptes = $request->input('compte');
        $compte = Compte::where('COMPTE', $comptes)->first();
        $compte->COMPTE = $request->input('compte');
        $compte->LABEL_COMPTE = $request->input('label_compte');
        $compte->save();

        return response()->json([
            'success' => true,
            'compte' => $comptes
        ]);
    }
    public function Categorie(Request $request){
        $id = $request->input('id');
        $categorie = Categorie::where('id', $id)->first();
        $categorie->LABEL_CATEGORIE = $request->input('label_categorie');
        $categorie->COMPTE = $request->input('compte');
        $categorie->save();
        // return $categorie;
        return response()->json([
            'success' => true,
            'categorie' => $id
        ]);
    }
    public function Article(Request $request, $id){
        $article = Article::where('id', $id)->first();
        if (!$article){
            abort(404);
        }
        $article->id_categorie = $request->input('id_categorie');
        $article->DESIGNATION = $request->input('designation');
        $article->SPECIFICATION = $request->input('specification');
        $article->UNITE = $request->input('unite');
        $article->save();

        return redirect('http://127.0.0.1:8000/article');
    }
    public function Materiel(Request $request, $num)
    {
        $materiel = Materiel::where('id', $num)->first();
        if (!$materiel){
            abort(404);
        }
        // if ($request->input('references') != NULL && $request->input('reference') != ''){
        //     $materiel->REF_MAT = $request->input('references');
        // }
        if ($request->input('etat') != $materiel->ETAT_MAT){
            $newHisto = new Historique();
            $newHisto->ETAT_MAT = $materiel->ETAT_MAT;
            $newHisto->id_materiel = $materiel->id;

            $historique = Historique::where('id_materiel', $materiel->id)
            ->where('ETAT_MAT', '!=', NULL)->orderBy('id', 'desc')->first();

            if ($historique){
                $newHisto->DATE_DEB = $historique->DATE_FIN;
                $newHisto->DATE_FIN = Carbon::now();
            }else{
                $newHisto->DATE_DEB = $materiel->created_at;
                $newHisto->DATE_FIN = Carbon::now();
            }
            $newHisto->save();
            // dd($newHisto);
        }

        $materiel->id_nomenclature = $request->input('id_nomenclature');
        $materiel->id_categorie = $request->input('id_categorie');
        $materiel->ETAT_MAT = $request->input('etat');
        $materiel->DESIGN_MAT = $request->input('designation');
        $materiel->SPEC_MAT = $request->input('specification');
        // dd($materiel);
        $materiel->save();
        return redirect('http://127.0.0.1:8000/enteredMateriel');
    }
    public function Detenteur(Request $request, $num)
    {
        $materiel = Materiel::where('id', $num)->first();
        if (!$materiel){
            abort(404);
        }
        // if ($request->input('reference') != NULL && $request->input('reference') != ''){
        //     $materiel->REF_MAT = $request->input('reference');
        // }
        $historique = new Historique();
        $historique->id_materiel = $materiel->id;
        $historique->MATRICULE = $materiel->MATRICULE;
        $historique->DATE_DEB = $materiel->DATE_DEB;
        $historique->DATE_FIN = $request->input('dateDeb');

        if ($request->input('etat') != $materiel->ETAT_MAT){
            $newHisto = new Historique();
            $newHisto->ETAT_MAT = $materiel->ETAT_MAT;
            $newHisto->id_materiel = $materiel->id;

            $histo = Historique::where('id_materiel', $materiel->id)
            ->where('ETAT_MAT', '!=', NULL)->orderBy('id', 'desc')->first();

            if ($histo){
                $newHisto->DATE_DEB = $histo->DATE_FIN;
                $newHisto->DATE_FIN = Carbon::now();
            }else{
                $newHisto->DATE_DEB = $materiel->created_at;
                $newHisto->DATE_FIN = Carbon::now();
            }
            $newHisto->save();
            // dd($newHisto);
        }

        $materiel->ETAT_MAT = $request->input('etat');
        $materiel->MATRICULE = $request->input('matricule');
        $materiel->DATE_DEB = $request->input('dateDeb');
        // dd($historique);
        $materiel->save();
        $historique->save();
        return redirect('http://127.0.0.1:8000/materiel');
    }
    public function attribuerMateriel(Request $request, $num){
        $materiel = Materiel::where('id', $num)->first();
        if (!$materiel){
            abort(404);
        }
        if ($request->input('etat') != $materiel->ETAT_MAT){
            $newHisto = new Historique();
            $newHisto->ETAT_MAT = $materiel->ETAT_MAT;
            $newHisto->id_materiel = $materiel->id;

            $histo = Historique::where('id_materiel', $materiel->id)
            ->where('ETAT_MAT', '!=', NULL)->orderBy('id', 'desc')->first();

            if ($histo){
                $newHisto->DATE_DEB = $histo->DATE_FIN;
                $newHisto->DATE_FIN = Carbon::now();
            }else{
                $newHisto->DATE_DEB = $materiel->created_at;
                $newHisto->DATE_FIN = Carbon::now();
            }
            $newHisto->save();
            // dd($newHisto);
        }

        $materiel->REF_MAT = $request->input('reference');
        $materiel->MATRICULE = $request->input('matricule');
        $materiel->ETAT_MAT = $request->input('etat');
        $materiel->DATE_DEB = $request->input('dateDeb');
        // dd($materiel);
        $materiel->save();

        return redirect('http://127.0.0.1:8000/materiel');
    }

    public function condamnation(Request $request, $num){
        $materiel = Materiel::where('id', $num)->first();

        if (!$materiel){
            abort(404);
        }
        $historique = new Historique();
        $historique->id_materiel = $materiel->id;
        $historique->MATRICULE = $materiel->MATRICULE;
        $historique->DATE_DEB = $materiel->DATE_DEB;
        $historique->DATE_FIN = $request->input('dateDeb');

            $newHisto = new Historique();
            $newHisto->ETAT_MAT = $materiel->ETAT_MAT;
            $newHisto->id_materiel = $materiel->id;

            $histo = Historique::where('id_materiel', $materiel->id)
            ->where('ETAT_MAT', '!=', NULL)->orderBy('id', 'desc')->first();

            if ($histo){
                $newHisto->DATE_DEB = $histo->DATE_FIN;
                $newHisto->DATE_FIN = Carbon::now();
            }else{
                $newHisto->DATE_DEB = $materiel->created_at;
                $newHisto->DATE_FIN = Carbon::now();
            }
            $newHisto->save();

        // $request->input('reference');
        $sortie = new Sortie();

        $sortie->REF_SORTIE = $request->input('reference');
        $sortie->id_materiel = $materiel->id;
        $sortie->OBJET = $request->input('objet');
        $sortie->STATUT = $request->input('statut');
        $sortie->DATE = $request->input('dateDeb');

        $materiel->MATRICULE = NULL;
        $materiel->ETAT_MAT = 'CONDAMNE';
        $materiel->DATE_DEB = $request->input('dateDeb');

        $materiel->save();
        $historique->save();
        $materiel->sortie()->save($sortie);
        return redirect('http://127.0.0.1:8000/outedMateriel');
    }

}
