<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReferenceOrigne extends Model
{
    use HasFactory;
    protected $table = 'REF_ORIGINE';
    protected $fillable = [
        'REFERENCE',
        'CODE_SERVICE',
        'FACTURE',
        'PRIX_TOTAL',
        'DATE_ORIGINE',
    ];
    public function service(){
        return $this->belongsTo(Service::class, 'CODE_SERVICE', 'CODE_SERVICE');
    }
    public function origines(){
        return $this->hasMany(Origine::class, 'REF_ORIGINE', 'REFERENCE');
    }
    public function origineMat(){
        return $this->hasMany(OrigineMat::class, 'REF_ORIGINE', 'REFERENCE');
    }

    public function createReference(){

        $nombreLignes = DB::table('REF_ORIGINE')->count();
        if ($nombreLignes == 0) {
            $newref = 'ORG' . '/' .date('Y') . '/' . '0001';
        } else {
            $reference = ReferenceOrigne::latest()->first();
            $ref = $reference->REFERENCE;
            $part = explode('/', $ref);
            $annee = date('Y');
            if ($part[1] = $annee){
                $increment = $part[2];
                $increment = intval($increment) +1;

                $newIncrement =  str_pad($increment, 4, '0', STR_PAD_LEFT);
                $newref = 'ORG' . '/' .date('Y') . '/' . $newIncrement;
            }else{
                $newref = date('Y') . '/' . '0001';
            }
        }

        return $newref;
    }
}
