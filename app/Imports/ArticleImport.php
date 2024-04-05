<?php
// app/Imports/YourModelImport.php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticleImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        return $rows;
    }
}


// class AgentImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithStartRow
// {
//     use Importable;

//     public function model(array $row)
//     {
//         return new Agent([
//             'MATRICULE' => $row['column1'],
//             'NOM' => $row['column5'],
//             'PRENOM' => $row['column8'],
//             'GENRE' => $row['column13'],
//             'CODE_DIVISION' => $row['column15'],
//             'FONCTION' => $row['column2'],
//             'EMAIL' => $row['column4'],
//             'TELEPHONE' => $row['column10'],
//             'PSEUDO' => $row['column1'],
//             'ADRESSE_PHYSIQUE' => $row['column9'],
//             'PASSWORD' => Hash::make('000000'),
//             'TYPE' => 'User',
//             // Ajoutez d'autres colonnes au besoin
//         ]);
//     }

//     public function rules(): array
//     {
//         return [
//             'MATRICULE' => 'required',
//             'NOM' => 'required',
//             'CODE_DIVISION' => 'required',
//             'GENRE' => 'required',
//             'FONCTION' => 'required',
//             'TYPE' => 'required',
//             'PSEUDO' => 'required',
//             'PASSWORD' => 'required',
//             'TELEPHONE' => 'required',
//             // Ajoutez d'autres règles au besoin
//         ];
//     }

//     public function batchSize(): int
//     {
//         return 1000; // Nombre de lignes à traiter à la fois
//     }

//     public function startRow(): int
//     {
//         return 2; // La première ligne du fichier Excel qui contient des données
//     }

//     public function getFileType(): string
//     {
//         return 'xlsx'; // Indiquez ici le type de fichier (xlsx, xls, csv, etc.)
//     }
// }



