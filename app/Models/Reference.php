<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;
use App\Models\Demande;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;

class Reference extends Model
{
    use HasFactory;

    protected $table = 'REF_DEMANDE';
    protected $fillable = [
        'REFERENCE',
        'MATRICULE',
        'ETAT',
        'DATE_DEMANDE',
        'VALIDATION',
        'LIVRAISON',
        'CODE_SERVICE'
    ];

    public function service(){
        return $this->belongsTo(Service::class, 'CODE_SERVICE', 'CODE_SERVICE');
    }

    public function agent(){
        return $this->belongsTo(Agent::class, 'MATRICULE', 'MATRICULE');
    }
    public function demandes(){
        return $this->hasMany(Demande::class, 'REF_DEMANDE', 'REFERENCE');
    }

    public function createReference(){

        $nombreLignes = DB::table('REF_DEMANDE')->count();
        if ($nombreLignes == 0) {
            $newref = date('Y') . '/' . '0001';
        } else {
            $reference = Reference::latest()->first();
            $ref = $reference->REFERENCE;
            $part = explode('/', $ref);
            $annee = date('Y');
            if ($part[0] = $annee){
                $increment = $part[1];
                $increment = intval($increment) +1;

                $newIncrement =  str_pad($increment, 4, '0', STR_PAD_LEFT);
                $newref = date('Y') . '/' . $newIncrement;
            }else{
                $newref = date('Y') . '/' . '0001';
            }
        }

        return $newref;
    }
}
