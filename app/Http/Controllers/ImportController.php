<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AgentImport;
use App\Imports\ArticleImport;
use App\Models\Reference;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ImportController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('fr');
    }
    public function ImportAgent(Request $request)
    {
        $request->validate([
            'fichierExcelAgent' => 'required|mimes:xlsx,csv',
        ]);

        $filePath = $request->file('fichierExcelAgent')->getRealPath();

        try {
            // Spécifiez le type de fichier explicitement (xlsx dans cet exemple)
            $importedData = Excel::toCollection(new AgentImport, $filePath, null, \Maatwebsite\Excel\Excel::XLSX);

            return response()->json([
                'success' => true,
                'data' => $importedData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Une erreur s\'est produite lors de l\'importation.'
            ]);
        }
    }
    public function ImportArticle(Request $request)
    {
        $request->validate([
            'fichierExcelArticle' => 'required|mimes:xlsx,csv',
        ]);

        $filePath = $request->file('fichierExcelArticle')->getRealPath();

        try {
            // Spécifiez le type de fichier explicitement (xlsx dans cet exemple)
            $importedData = Excel::toCollection(new ArticleImport, $filePath, null, \Maatwebsite\Excel\Excel::XLSX);
            foreach ($importedData[0] as $article){
                $id_cat = $article["id_cat"];
                
                $categorie = Categorie::where('id', '=', $id_cat)->first();
                $label = $categorie['LABEL_CATEGORIE'];

                $article["id_cat"] = $label;
            }

            return response()->json([
                'success' => true,
                // 'data' => $see
                'data' => $importedData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Une erreur s\'est produite lors de l\'importation.'
            ]);
        }
    }

    public function generateRandomNumbers($length) {
        $numbers = '';
        for ($i = 0; $i < $length; $i++) {
            $numbers .= mt_rand(0, 9);
        }
        return $numbers;
    }

    // public function telechargerPhotoProfil(Request $request)
    // {
    //     // $numeroUnique = Str::random(4);
    //     $numeroUnique = $this->generateRandomNumbers(4);
    //     $matricule = Auth::user()->MATRICULE;

    //     $nouveauNomFichier = $matricule . '_' . $numeroUnique;

    //     $cheminFichier = $request->file('image')->storeAs('public/images/profil', $nouveauNomFichier);


    //     $agent = Agent::where('MATRICULE', $matricule)->first();
    //     $agent->PHOTO = $nouveauNomFichier;

    //     $agent->save();

    //     return response()->json([
    //         'message' => 'Photo de profil téléchargée avec succès.',
    //     ]);

    // }

    public function telechargerPhotoProfil(Request $request)
    {
        $numeroUnique = $this->generateRandomNumbers(4);
        $matricule = Auth::user()->MATRICULE;

        $extension = $request->file('image')->getClientOriginalExtension();
        $nouveauNomFichier = $matricule . '_' . $numeroUnique . '.' . $extension;

        $destinationPath = public_path('images/profil');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        
        $agent = Agent::where('MATRICULE', $matricule)->first();
        $anciennePhoto = $agent->PHOTO;
        
        if ($anciennePhoto && file_exists(public_path('images/profil/' .$anciennePhoto))) {
            unlink(public_path('images/profil/' . $anciennePhoto));
        }

        $request->file('image')->move($destinationPath, $nouveauNomFichier);

        $agent = Agent::where('MATRICULE', $matricule)->first();
        $agent->PHOTO = $nouveauNomFichier;

        $agent->save();

        return response()->json([
            'message' => 'Photo de profil téléchargée avec succès.',
        ]);
    }


    public function ImpressionDemande(Request $request)
    {
        $data = $request->input('donnees');
        $donnees = json_decode($data, true);
        $reference = $request->input('reference');
        $newref = json_decode($reference);

        $ref_dem = Reference::with('agent.division.service', 'demandes.article')
        ->where('REFERENCE', $newref)
        ->first();

        // foreach ($ref_dem as $dd) {
            $carbonDateDEB = Carbon::parse($ref_dem->DATE_DEMANDE);
            $ref_dem->DATE_DEMANDE = $carbonDateDEB->format('d F Y');//->isoFormat('D MMMM YYYY');
        // }

        $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Je vois ta gloire</h1>');
        // return $pdf->download('bon_de_commande.pdf');

        $pdf = pdf::loadView('pages.pdf.bonDeCommande', [
            'donnees' => $donnees,
            'reference' => $ref_dem
        ]);
        return $pdf->stream('bon_de_commande.pdf');
    }


    public function ImpressionLivraison(Request $request)
    {
        $data = $request->input('donnees');
        $donnees = json_decode($data, true);
        $reference = $request->input('reference');
        $newref = json_decode($reference);

        $ref_dem = Reference::with('agent.division.service', 'demandes.article')
        ->where('REFERENCE', $newref)
        ->first();

        // foreach ($ref_dem as $dd) {
            $carbonDateDEB = Carbon::parse($ref_dem->DATE_DEMANDE);
            $ref_dem->DATE_DEMANDE = $carbonDateDEB->isoFormat('D MMMM YYYY');
        // }

        $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Je vois ta gloire</h1>');
        // return $pdf->download('bon_de_commande.pdf');

        $pdf = pdf::loadView('pages.pdf.bonDeLivraison', [
            'donnees' => $donnees,
            'reference' => $ref_dem
        ]);
        return $pdf->stream('bon_de_Livraison.pdf');
    }

    public function ImpressionStock(Request $request)
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Je vois ta gloire</h1>');
        // return $pdf->download('bon_de_commande.pdf');

        $pdf = pdf::loadView('pages.pdf.ficheDeStock');
        return $pdf->stream('bon_de_commande.pdf');
    }

    // public function ImportAgent(Request $request){
    //     $request->validate([
    //         'fichierExcelAgent' => 'required|mimes:xlsx,csv',
    //     ]);
    //     $filePath = $request->file('fichierExcelAgent')->getRealPath();
    //     $importedData = Excel::toCollection(new AgentImport, $filePath)[0];
    //     return response()->json([
    //         'success' => true,
    //         'data' => $importedData
    //     ]);

    // }
}
