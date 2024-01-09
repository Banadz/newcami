<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insérer une nouvelle ligne dans la table "SERVICE"
        Service::create([
            'CODE_SERVICE' => 'ADMIN',
            'LABEL_SERVICE' => 'SERVICE ADMINISTRATEUR',
            'ENTETE1' => 'Entête 1',
            'ENTETE2' => 'Entête 2',
            'ENTETE3' => 'Entête 3',
            'ENTETE4' => 'Entête 4',
            'ENTETE5' => 'Entête 5',
            'SIGLE_SERVICE' => 'Sigle 1',
            'VILLE_SERVICE' => 'FIANARANTSOA',
            'ADRESSE_SERVICE' => 'Fianarantsoa 301',
            'CONTACT_SERVICE' => '+261 34 38 079 86',
            'ADRESSE_MAIL' => 'xandrianajorobanadz@gmail.com',
        ]);

        Division::create([
            'CODE_DIVISION' => 'BACK-END',
            'LABEL_DIVISION' => 'Développeur Web',
            'CODE_SERVICE' => 'ADMIN',
        ]);

        Agent::create([
            'MATRICULE' => '100000',
            'NOM' => 'NOMENJANAHARY',
            'CODE_DIVISION' => 'BACK-END',
            'PRENOM' => 'Pierre Andrianajoro',
            'GENRE' => 'M',
            'PHOTO' => '',
            'FONCTION' => 'Gestion de comptes utilisateurs',
            'TYPE' => 'Super Admin',
            'PSEUDO' => 'Najoro',
            'EMAIL' => 'xandrianajorobanadz@gmail.com',
            'PASSWORD' => '$2y$10$RPXeLUBUnn2KWP2tgTvwm.NBzPod/4H7KUa500vuo3HOZdeKUp.TW',
            'ADRESSE_PHYSIQUE' => 'Andrainjato Fianarantsoa',
            'TELEPHONE' => '+261 34 38 079 86',

        ]);

        // Ajoutez d'autres enregistrements si nécessaire
    }
}
