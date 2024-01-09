<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AgentImport;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function ImpressionDemande(Request $request)
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Je vois ta gloire</h1>');
        // return $pdf->download('bon_de_commande.pdf');

        $pdf = pdf::loadView('pages.pdf.bonDeCommande');
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
