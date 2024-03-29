<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AgentImport;
use App\Imports\ArticleImport;
use App\Models\Reference;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class ImportController extends Controller
{
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
            $ref_dem->DATE_DEMANDE = $carbonDateDEB->isoFormat('D MMMM YYYY');
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
