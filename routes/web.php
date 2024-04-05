<?php

use App\Http\Controllers\InsertionController;
use App\Http\Controllers\SupressionController;
use App\Http\Controllers\getController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\LoginController;
use App\Models\Division;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'pageLogin'])->name('/');
//  function () {

//     // Route('seConnecter');
//     // return view('pages/login');
//     // return Inertia::render('Welcome', [
//     //     'canLogin' => Route::has('login'),
//     //     'canRegister' => Route::has('register'),
//     //     'laravelVersion' => Application::VERSION,
//     //     'phpVersion' => PHP_VERSION,
//     // ]);
// });

Route::get('/seConnecter',[PageController::class, 'pageLogin'])->name('seConnecter');
Route::post('/tologin', [LoginController::class, 'tologin'])->name('login');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])
Route::middleware([
    'auth'
])->group(function () {


    Route::get('/dashbord', [PageController::class, 'dashboard'])->name('dashbord');

    Route::get('/service', [PageController::class, 'pageService'])->name('service');
    Route::get('/division', [PageController::class, 'pageDivision'])->name('division');
    Route::get('/agent', [PageController::class, 'pageAgent'] )->name('agent');

    Route::get('/compte', [PageController::class,'pageCompte'])->name('compte');
    Route::get('/categorie', [PageController::class, 'pageCategorie'])->name('categorie');
    Route::get('/article', [PageController::class, 'pageArticle'])->name('article');

    Route::get('/demande', [PageController::class, 'pageDemande'])->name('demande');
    Route::get('/livringDemande', [PageController::class, 'pagedemandeLivring'])->name('livringDemande');
    Route::get('/LivredDemande', [PageController::class, 'pagedemandeLivred'])->name('LivredDemande');
    Route::get('/deniedDemande', [PageController::class, 'pagedemandeDenied'])->name('deniedDemande');


    Route::get('/materiel', [PageController::class, 'pageMateriel'])->name('materiel');
    Route::get('/profil', [PageController::class, 'userProfil'])->name('profil');

    //  FORMULAIRE:
    Route::get('/newService', function () {return view('pages/serviceInsertion');})->name('newService');
    Route::get('/newDivision', [PageController::class, 'insertionDivision'])->name('newDivision');
    Route::get('/newAgent', [PageController::class, 'insertionAgent'])->name('newAgent');
    Route::get('/newCompte', [PageController::class, 'insertionCompte'])->name('newCompte');
    Route::get('/newCategorie', [PageController::class, 'insertionCategorie'])->name('newCategorie');
    Route::get('/newArticle', [PageController::class, 'insertionArticle'])->name('newArticle');
    Route::get('/newDemande', [PageController::class, 'insertionDemande'])->name('newDemande');
    Route::get('/newOrigine', [PageController::class, 'insertionOrigine'])->name('newOrigine');

    //MATERIEL
    Route::get('/newMateriel', [PageController::class, 'insertionMateriel'])->name('newMateriel');
    Route::get('/enteredMateriel', [PageController::class, 'enteredMateriel'])->name('enteredMateriel');
    Route::get('/outedMateriel', [PageController::class, 'outedMateriel'])->name('outedMateriel');

    Route::get('/enteredMateriel/detenir/{num}', [PageController::class, 'detenirMateriel']);
    Route::get('/materiel/modifier/{num}', [PageController::class, 'modifierMateriel']);
    Route::get('/materiel/changeDetenteur/{num}', [PageController::class, 'changerDetenteurMateriel']);
    Route::get('/materiel/condamner/{num}', [PageController::class, 'condamnerMateriel']);
    Route::get('materiel/historique/{num}', [PageController::class, 'historiqueMateriel']);

    Route::post('/enteredMateriel/attribution/{num}', [UpdateController::class, 'attribuerMateriel']);
    Route::post('/enteredMateriel/modification/{num}', [UpdateController::class, 'Materiel']);
    Route::post('/materiel/changement/{num}', [UpdateController::class, 'Detenteur']);
    Route::post('/materiel/condamnation/{num}', [UpdateController::class, 'condamnation']);


    Route::get('/updateArticle', [PageController::class, 'updateArticle'])->name('updateArticle');

    // INSERTION:
    Route::post('/insertionService', [InsertionController::class, 'Service'])->name('insertionService');
    Route::post('/insertionDivision', [InsertionController::class, 'Division'])->name('insertionDivision');
    Route::post('/insertionAgent', [InsertionController::class, 'Agent'])->name('insertionAgent');
    Route::post('/insertionCompte', [InsertionController::class, 'Compte'])->name('insertionCompte');
    Route::post('/insertionCategorie', [InsertionController::class, 'Categorie'])->name('insertionCategorie');
    Route::post('/insertionArticle', [InsertionController::class, 'Article'])->name('insertionArticle');


    //AJAX:
    Route::post('/deleteService', [SupressionController::class, 'Service'])->name('deleteService');
    Route::post('/getService', [getController::class, 'Service'])->name('getService');
    Route::post('/allService', [getController::class, 'allService'])->name('allService');
    Route::post('/updatingService', [UpdateController::class, 'Service'])->name('updatingService');


    Route::post('/deleteDivision', [SupressionController::class, 'Division'])->name('deleteDivision');
    Route::post('/getDivision', [getController::class, 'Division'])->name('getDivision');
    Route::post('/updatingDivision', [UpdateController::class, 'Division'])->name('updatingDivision');
    Route::post('/allDivision', [getController::class, 'allDivision'])->name('allDivision');
    Route::post('/recupDivisions', [getController::class, 'GroupDivision'])->name('recupDivisions');

    Route::post('/getAgent', [getController::class, 'Agent'])->name('getAgent');
    Route::post('/allAgent', [getController::class, 'allAgent'])->name('allAgent');
    Route::post('/updatingAgent', [UpdateController::class, 'Agent'])->name('updatingAgent');


    Route::post('/updatingcompte', [UpdateController::class, 'Compte'])->name('updatingcompte');
    Route::post('/deleteCompte', [SupressionController::class, 'Compte'])->name('deleteCompte');


    Route::post('/getCategorie', [getController::class, 'Categorie'])->name('getCategorie');
    Route::post('/updatingCategorie', [UpdateController::class, 'Categorie'])->name('updatingCategorie');
    Route::post('/recupCategorie', [getController::class, 'GroupCategorie'])->name('recupCategorie');


    Route::post('/getArticle', [getController::class, 'Article'])->name('getArticle');
    Route::post('/recupArticle', [getController::class, 'GroupArticle'])->name('recupArticle');
    Route::post('/controlQuant', [getController::class, 'Quantite'])->name('controlQuant');

    Route::post('/recupAgent', [getController::class, 'GroupAgent'])->name('recupAgent');
    Route::post('/recupDetenteur', [getController::class, 'GroupDetenteur'])->name('recupDetenteur');
    Route::post('/getCondamnation',[getController::class, 'SearchCondemnation'])->name('getCondamnation');

    Route::post('/valideDemande', [InsertionController::class, 'Demande'])->name('valideDemande');
    Route::post('/validationDemande', [InsertionController::class, 'validerDem'])->name('validationDemande');
    Route::post('/refuseDemande', [InsertionController::class, 'refuserDem'])->name('refuseDemande');
    Route::post('/confirmationDemande', [InsertionController::class, 'confirmerDem'])->name('confirmationDemande');
    Route::post('/validOrigine', [InsertionController::class, 'Origine'])->name('validOrigine');
    Route::post('/valideMateriel', [InsertionController::class, 'Materiel'])->name('valideMateriel');

    Route::delete('/tologout', [LoginController::class, 'tologout'])->name('logout');

    Route::get('/article/{id}', [PageController::class, 'updateArticle']);
    Route::post('/modification/{id}', [UpdateController::class, 'Article']);
    Route::get('/addition/{id}', [PageController::class, 'addArticle']);
    // Route::post('/modification/{id}', [UpdateController::class, 'Article']);


    Route::post('/sameRefDemande', [getController::class, 'GroupDemande'])->name('sameRefDemande');

    Route::post('/allData', [getController::class, 'allData'])->name('allData');

    Route::post('/importAgent', [ImportController::class, 'ImportAgent'])->name('importerAgent');
    Route::post('/insertionMultipleAgent', [InsertionController::class, 'multiAgent'])->name('insererMutliAgent');


    Route::post('/importArticle', [ImportController::class, 'ImportArticle'])->name('importerArticle');
    Route::post('/insertionMultipleArticle', [InsertionController::class, 'multiArticle'])->name('insererMutliArticle');


    Route::get('/imprimerDemande', [ImportController::class, 'ImpressionDemande'])->name('imprimerDemande');
    Route::get('/imprimerStock', [ImportController::class, 'ImpressionStock'])->name('imprimerStock');

    Route::post('/updateUserProfilBase', [UpdateController::class, 'Profil'])->name('updateUserProfilBase');
    Route::post('/updateUserProfilParam', [UpdateController::class, 'UpdateProfil'])->name('updateUserProfilParam');
    // Route::post('/putinPanier', [getController::class, 'Article'])->name('putinPanier');

    // Route::get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');
    // Route::get('/Article', function () {
    //     return Inertia::render('Home/Article');
    // })->name('Article');

    // Route::get('/ArticleInsertion', function () {
    //     return Inertia::render('Insertion/ArticleInsertion');
    // })->name('ArticleInsertion');
    // Route::get('/ArticleListe', function () {
    //     return Inertia::render('Liste/ArticleListe');
    // })->name('ArticleListe');

    // Route::get('/Materiel', function () {
    //     return Inertia::render('Home/Materiel');
    // })->name('Materiel');
});


