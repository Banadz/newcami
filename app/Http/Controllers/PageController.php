<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Compte;
use App\Models\Demande;
use App\Models\Division;
use App\Models\Historique;
use App\Models\Materiel;
use App\Models\Nomenclature;
use App\Models\Reference;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Sortie;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function formatNumber($number)
    {
        if ($number === 0) {
            return '0';
        }
        if ($number < 10) {
            return '0' . $number;
        } else {
            return $number;
        }
    }
    public function dashboard(){
        $type2 = "Admin";
        $type3 = "Super Admin";
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        
        $nouveau = $this->formatNumber(Reference::where('MATRICULE', '=', $matricule)
        ->where('ETAT', '=', 'En attente')->count());

        $refus = $this->formatNumber(Reference::where('MATRICULE', '=', $matricule)
        ->where('ETAT', '=', 'Refused')->count());

        $livraison = $this->formatNumber(Reference::where('MATRICULE', '=', $matricule)
        ->where('ETAT', '=', 'Livring')->count());

        $recu = $this->formatNumber(Reference::where('MATRICULE', '=', $matricule)
        ->where('ETAT', '=', 'Livred')->count());

        $total = $this->formatNumber(Reference::where('MATRICULE', '=', $matricule)->count());

        if ($user->TYPE == $type2 || $user->TYPE == "Super Admin"){
            $nouveau = $this->formatNumber(Reference::where('ETAT', '=', 'En attente')
            ->where('CODE_SERVICE', '=', $code_service)->count());

            $refus = $this->formatNumber(Reference::where('CODE_SERVICE', '=', $code_service)
            ->where('ETAT', '=', 'Refused')->count());

            $livraison = $this->formatNumber(Reference::where('CODE_SERVICE', '=', $code_service)
            ->where('ETAT', '=', 'Livring')->count());

            $recu = $this->formatNumber(Reference::where('CODE_SERVICE', '=', $code_service)
            ->where('ETAT', '=', 'Livred')->count());

            $total = $this->formatNumber(Reference::where('CODE_SERVICE', '=', $code_service)
            ->count());
        }
        $dashbord = [
            'NEW' => $nouveau,
            'DENIED' => $refus,
            'LIVRING' => $livraison,
            'LIVRED' => $recu,
            'ALL' => $total
        ];
        return view('pages.index', ['dashboard' => $dashbord]);
    }

    public function __construct()
    {
        Carbon::setLocale('fr');
    }
// PAGE
    public function whoIsConneted(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        return $code_service;
    }
    public function pageService()
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $service = Service::where('CODE_SERVICE', '!=', 'ADMIN')->get();
        if ($code_service == "ADMIN"){
            $service = Service::get();
        }
        return view('pages.service', ['services' => $service]);
    }
    public function pageDivision()
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $divisions = Division::where('CODE_SERVICE', '!=', 'ADMIN')->with('service')->get();
        if ($code_service == "ADMIN"){
            $divisions = Division::get();
        }

        // return $divisions;
        return view('pages.division', ['divisions' => $divisions]);
    }
    public function pageAgent()
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $agents = Agent::whereHas('division.service', function($query) use ($code_service){
            $query->where('CODE_SERVICE', '=', $code_service);
        })->get();
        $divisions = Division::where('CODE_SERVICE', $code_service)->get();
        if ($code_service == "ADMIN"){
            $agents = Agent::with('division.service')->get();
        }

        return view('pages.agent', [
            'agents'=> $agents,
            'divisions' => $divisions,
        ]);
    }

    public function pageCompte(){
        $comptes = Compte::get();
        return view('pages.compte', ['comptes'=> $comptes]);
    }


    public function userProfil(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();

        return view('pages.profile', ['agent'=> $agent]);
    }



    public function userProfil(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();

        return view('pages.profile', ['agent'=> $agent]);
    }

    public function pageCategorie(){
        $categories = Categorie::with('compte')->get();
        $comptes = Compte::get();
        return view('pages.categorie', ['categories'=> $categories, 'comptes' => $comptes]);
    }
    public function pageArticle(){
        $comptes = Compte::get();
        $categories = Categorie::get();
        $articles = Article::with('categorie')->get();
        return view('pages.article', ['articles'=> $articles], ['categories'=> $categories, 'comptes' => $comptes]);
    }
    public function pageDemande(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $references = Reference::with('demandes.article', 'agent.division')
        ->where('CODE_SERVICE', '=', $code_service)->where('ETAT', '=', 'En attente')
        ->withCount('demandes')->get();

        // Vérifier le type d"Agent...
        if ($user->TYPE == "User" ){
            $references = Reference::with('demandes.article', 'agent.division')
            ->where('MATRICULE', '=', $matricule)->where('ETAT', '=', 'En attente')
            ->withCount('demandes')->get();
        }

        // Vérifier le type d"Agent...
        if ($user->TYPE == "User" ){
            $references = Reference::with('demandes.article', 'agent.division')
            ->where('MATRICULE', '=', $matricule)->where('ETAT', '=', 'En attente')
            ->withCount('demandes')->get();
        }
        foreach ($references as $dd) {
            $carbonDateDEB = Carbon::parse($dd->DATE_DEMANDE);
            $dd->DATE_DEMANDE = $carbonDateDEB->isoFormat('D MMMM YYYY [à] H [heure et] mm [minutes]');
        }
        return view('pages.demande', [
            'references' => $references
        ]);
    }
    public function pagedemandeLivring(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $references = Reference::with('demandes.article', 'agent.division')
        ->where('CODE_SERVICE', '=', $code_service)->where('ETAT', '=', 'Livring')
        ->withCount('demandes')->get();

        // Vérifier le type d"Agent...
        if ($user->TYPE == "User" ){
            $references = Reference::with('demandes.article', 'agent.division')
            ->where('MATRICULE', '=', $matricule)->where('ETAT', '=', 'Livring')
            ->withCount('demandes')->get();
        }

        foreach ($references as $dd) {
            $carbonDateDEB = Carbon::parse($dd->DATE_DEMANDE);
            $dd->DATE_DEMANDE = $carbonDateDEB->isoFormat('D MMMM YYYY [à] H [heure et] mm [minutes]');
        }
        // return $references;
        return view('pages.demandeLivraison', [
            'references' => $references
        ]);
    }
    public function pagedemandeLivred(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $references = Reference::with('demandes.article', 'agent.division')
        ->where('CODE_SERVICE', '=', $code_service)->where('ETAT', '=', 'Livré')
        ->withCount('demandes')->get();

        // Vérifier le type d"Agent...
        if ($user->TYPE == "User" ){
            $references = Reference::with('demandes.article', 'agent.division')
            ->where('MATRICULE', '=', $matricule)->where('ETAT', '=', 'Livré')
            ->withCount('demandes')->get();
        }

        foreach ($references as $dd) {
            $carbonDateDEB = Carbon::parse($dd->DATE_DEMANDE);
            $dd->DATE_DEMANDE = $carbonDateDEB->isoFormat('D MMMM YYYY [à] H [heure et] mm [minutes]');
        }
        return view('pages.demandeLivred', [
            'references' => $references
        ]);
    }
    public function pagedemandeDenied(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $references = Reference::with('demandes.article', 'agent.division')
        ->where('CODE_SERVICE', '=', $code_service)->where('ETAT', '=', 'Refused')
        ->withCount('demandes')->get();

        // Vérifier le type d"Agent...
        if ($user->TYPE == "User" ){
            $references = Reference::with('demandes.article', 'agent.division')
            ->where('MATRICULE', '=', $matricule)->where('ETAT', '=', 'Refused')
            ->withCount('demandes')->get();
        }

        foreach ($references as $dd) {
            $carbonDateDEB = Carbon::parse($dd->DATE_DEMANDE);
            $dd->DATE_DEMANDE = $carbonDateDEB->isoFormat('D MMMM YYYY [à] H [heure et] mm [minutes]');
        }
        return view('pages.demandeRefused', [
            'references' => $references
        ]);
    }
    public function pageMateriel(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $materiel = Materiel::with('origine', 'nomenclature', 'categorie.compte')
                    ->where('CODE_SERVICE', '=', $code_service)
                    ->where('MATRICULE', '!=', NULL)
                    ->where('REF_MAT', '!=', NULL)->get();
        return view('pages.materiel', [
            'materiels' => $materiel
        ]);
    }
    public function enteredMateriel()
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $materiel = Materiel::with('origine', 'nomenclature', 'categorie.compte')
                    ->where('CODE_SERVICE', '=', $code_service)
                    ->where('REF_MAT', '=', NULL)
                    ->where('MATRICULE', '=', NULL)->get();
        return view('pages.materielEntered', [
            'materiels' => $materiel
        ]);
    }
    public function outedMateriel()
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $materiel = Materiel::with('origine', 'nomenclature', 'categorie.compte', 'sortie')
                    ->where('CODE_SERVICE', '=', $code_service)
                    ->where('MATRICULE', '=', NULL)
                    ->where('ETAT_MAT', '=', 'CONDAMNE')
                    ->where('REF_MAT', '!=', NULL)->get();
        foreach ($materiel as $dd) {
            $carbonDate = Carbon::parse($dd->sortie->DATE);
            $dd->sortie->DATE = $carbonDate->isoFormat('D MMMM YYYY [à] H [heure] mm [minutes]');
        }
        return view('pages.materielOuted', [
            'materiels' => $materiel
        ]);

    }
    public function historiqueMateriel($num){
        $materiel = Materiel::with('origine', 'agent', 'nomenclature', 'categorie.compte', 'sortie', 'historiques.agent')
                    ->where('id', '=', $num)
                    ->first();
        foreach ($materiel->historiques as $dd) {
            $carbonDateDEB = Carbon::parse($dd->DATE_DEB);
            $carbonDateFIN = Carbon::parse($dd->DATE_FIN);
            $dd->DATE_DEB = $carbonDateDEB->isoFormat('D MMMM YYYY [à] H [heure] mm [minutes]');
            $dd->DATE_FIN = $carbonDateFIN->isoFormat('D MMMM YYYY [à] H [heure] mm [minutes]');
        }

        $date = Carbon::parse($materiel->DATE_DEB);
        $materiel->DATE_DEB = $date->isoFormat('D MMMM YYYY [à] H [heure] mm [minutes]');
                    // dd($materiel);
        return view('pages.materielHistorique', [
            'materiel' => $materiel
        ]);
    }

    // LOGIN
    public function pageLogin(){
        $agents = Agent::with('division')->get();
        return view('pages.login', ['agents'=> $agents]);
    }

    // INSERTION
    public function insertionDivision(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $service = Service::where('CODE_SERVICE', '=', $code_service)->get();
        if ($code_service == "ADMIN"){
            $service = Service::get();
        }
        return view('pages.divisionInsertion', ['services' => $service]);
    }
    public function insertionAgent(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $services = Service::where('CODE_SERVICE', '!=', 'ADMIN')->get();
        if ($code_service == "ADMIN"){
            $services = Service::get();
        }
        $divisions = Division::where('CODE_SERVICE', '=', $code_service)->get();
        return view('pages.agentInsertion', ['services' => $services, 'divisions' => $divisions, 'code_service' => $code_service]);
    }

    public function insertionCompte(){
        return view('pages.compteInsertion');
    }
    public function insertionCategorie(){
        $comptes = Compte::get();
        return view('pages.categorieInsertion', ['comptes' => $comptes]);
    }
    public function insertionArticle(){
        $comptes = Compte::get();
        $categories = Categorie::where('COMPTE', '6111')->get();
        return view('pages.articleInsertion', ['comptes' => $comptes, 'categories' => $categories]);
    }

    public function insertionMateriel(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $comptes = Compte::get();
        $nomenclatures = Nomenclature::get();
        $service = Service::where('CODE_SERVICE', '!=', 'ADMIN')->get();
        $categories = Categorie::get();
        return view('pages.materielInsertion', [
            'comptes' => $comptes,
            'nomenclatures' => $nomenclatures,
            'categories' => $categories,
            'services' => $service,
            'code_service' => $code_service
        ]);
    }

    public function insertionDemande(){
        $comptes = Compte::get();
        $categories = Categorie::get();
        $articles = Article::get();
        return view('pages.demandeInsertion', [
            'categories' => $categories,
            'articles' => $articles,
            'comptes' => $comptes
        ]);
    }
    public function insertionOrigine(){
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;

        $comptes = Compte::get();
        $service = Service::where('CODE_SERVICE', '!=', 'ADMIN')->get();
        $categories = Categorie::with('compte')->get();
        $articles = Article::with('categorie.compte')->where('CODE_SERVICE', '!=', $code_service)->get();
        return view('pages.origineInsertion', [
            'comptes' => $comptes,
            'categories' => $categories,
            'code_service' => $code_service,
            'articles' => $articles,
            'services' => $service
        ]);
    }


// UDPATE
    public function updateArticle($id){

        $article = Article::with('categorie.compte')->where('id', $id)->first();
        // dd($article);
        $comptes = Compte::where('COMPTE', '!=', $article->categorie->compte->COMPTE)->get();
        $categories = Categorie::where('id', '!=', $article->categorie->id)->get();
        return view('pages.articleUpdate', [
            'comptes' => $comptes,
            'categories' => $categories,
            'article' => $article
        ]);
    }

    public function modifierMateriel($num)
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        $code_division = $agent->division->CODE_DIVISION;

        $materiel = Materiel::with('origine', 'nomenclature', 'categorie.compte', 'agent')
                    ->where('id', '=', $num)->first();

        $nomenclatures = Nomenclature::get();

        $comptes = Compte::get();
        $categories = Categorie::where('COMPTE', '=', $materiel->categorie->COMPTE)->get();

        $etats = ['BON', 'MOYEN', 'MAUVAIS', 'HORS D\'USAGE'];
        // dd($etats);
        $date = Carbon::now();
        return view('pages.materielEdit', [
            'materiel' => $materiel,
            'nomenclatures' => $nomenclatures,
            'comptes'  => $comptes,
            'categories' => $categories,
            'now' => $date,
            'etats' => $etats
        ]);
    }
    public function detenirMateriel($num)
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        $code_division = $agent->division->CODE_DIVISION;

        $divisions = Division::where('CODE_SERVICE', '=', $code_service)->get();

        $agents = Agent::where('CODE_DIVISION', '=', $code_division)->get();

        $materiel = Materiel::with('origine', 'nomenclature', 'categorie.compte', 'agent')
                    ->where('id', '=', $num)->first();

        $etats = ['BON', 'MOYEN', 'MAUVAIS', 'HORS D\'USAGE'];
        $date = Carbon::now();
        return view('pages.materielUpdate', [
            'materiel' => $materiel,
            'agents' => $agents,
            'divisions' => $divisions,
            'code_division' => $code_division,
            'etats' => $etats,
            'now' => $date
        ]);
    }

    public function changerDetenteurMateriel($num)
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        $code_division = $agent->division->CODE_DIVISION;

        $divisions = Division::where('CODE_SERVICE', '=', $code_service)->get();

        $materiel = Materiel::with('origine', 'nomenclature', 'categorie.compte', 'agent.division')
                    ->where('id', '=', $num)->first();


        $agents = Agent::where('CODE_DIVISION', '=', $code_division)
        ->where('MATRICULE', '!=', $materiel->MATRICULE)->get();

        $etats = ['BON', 'MOYEN', 'MAUVAIS', 'HORS D\'USAGE'];
        $date = Carbon::now();
        return view('pages.materielChange', [
            'materiel' => $materiel,
            'agents' => $agents,
            'divisions' => $divisions,
            'code_division' => $code_division,
            'etats' => $etats,
            'now' => $date
        ]);
    }

    public function condamnerMateriel($num)
    {
        $user = Auth::user();
        $matricule = $user->MATRICULE;
        $agent = Agent::with('division.service')->where('MATRICULE', $matricule)->first();
        $code_service = $agent->division->service->CODE_SERVICE;
        $code_division = $agent->division->CODE_DIVISION;

        $divisions = Division::where('CODE_SERVICE', '=', $code_service)->get();

        $materiel = Materiel::with('origine', 'nomenclature', 'categorie.compte', 'agent.division')
                    ->where('id', '=', $num)->first();


        $agents = Agent::where('CODE_DIVISION', '=', $code_division)
        ->where('MATRICULE', '!=', $materiel->MATRICULE)->get();

        $etats = ['BON', 'MOYEN', 'MAUVAIS', 'HORS D\'USAGE'];
        $statuts = ['PERTE', 'HORS D\'USAGE'];

        $date = Carbon::now();
        return view('pages.materielCondamner', [
            'materiel' => $materiel,
            'agents' => $agents,
            'divisions' => $divisions,
            'code_division' => $code_division,
            'etats' => $etats,
            'statuts' => $statuts,
            'now' => $date
        ]);
    }

// ADD
    public function addArticle($id){

        $article = Article::with('categorie.compte')->where('id', $id)->first();
        // dd($article);
        $services = Service::where('CODE_SERVICE', '!=', 'ADMIN')->get();
        return view('pages.articleAddition', [
            'services' => $services,
            'article' => $article
        ]);
    }

}
