<?php

namespace Database\Seeders;

use App\Models\Compte;
use App\Models\Nomenclature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreparationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nomenclature::create([
            'NOMENCLATURE' => '03',
            'DETAIL_NOM' => 'Budget de Fonctionnement',
        ]);
        Nomenclature::create([
            'NOMENCLATURE' => '05',
            'DETAIL_NOM' => 'Investissement type (Immobilisation corporelle)',
        ]);
        // COMPTE......
        Compte::create([
            'COMPTE' => '6111',
            'LABEL_COMPTE' => 'Fournitures et articles de bureau',
        ]);
        Compte::create([
            'COMPTE' => '6112',
            'LABEL_COMPTE' => 'Imprimes, cachet et documents administratifs',
        ]);

        Compte::create([
            'COMPTE' => '6113',
            'LABEL_COMPTE' => 'Consomptibles informatiques',
        ]);
        Compte::create([
            'COMPTE' => '6114',
            'LABEL_COMPTE' => 'Produits, pétits matériels et menues dépenses d\'entretien',
        ]);
        Compte::create([
            'COMPTE' => '6211',
            'LABEL_COMPTE' => ' Entretien de batiments ',
        ]);
        Compte::create([
            'COMPTE' => '6213',
            'LABEL_COMPTE' => 'Entretien de matériel de  transports',
        ]);

        Compte::create([
            'COMPTE' => '6215',
            'LABEL_COMPTE' => 'Entretien et réparation des matériels  et mobiliers de  Bureau',
        ]);
        Compte::create([
            'COMPTE' => '6216',
            'LABEL_COMPTE' => 'Maintenance des matériels informatiques, électriques, électroniques et téléphoniques',
        ]);
        Compte::create([
            'COMPTE' => '6217',
            'LABEL_COMPTE' => 'Maintenance des réseaux, logiciels et systèmes informatiques',
        ]);
        Compte::create([
            'COMPTE' => '6224',
            'LABEL_COMPTE' => 'Impression, reliures, insertions, publicités et promotions',
        ]);

    }
}
