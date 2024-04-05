<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $table = 'MATERIEL';
    protected $fillable = ['REF_MAT',
                            'DESIGN_MAT',
                            'SPEC_MAT',
                            'ETAT_MAT',
                            'DATE_DEB',
                            'MATRICULE',
                            'CODE_SERVICE',
                            'id_nomenclature',
                            'id_categorie',
                            'id_origine'
                            ];

    public function categorie(){
        return $this->belongsTo(Categorie::class, 'id_categorie', 'id');
    }
    public function agent(){
        return $this->belongsTo(Agent::class, 'MATRICULE', 'MATRICULE');
    }
    public function nomenclature(){
        return $this->belongsTo(Nomenclature::class, 'id_nomenclature', 'id');
    }
    public function origine(){
        return $this->belongsTo(OrigineMat::class, 'id_origine', 'id');
    }
    public function historiques(){
        return $this->hasMany(Historique::class, 'id_materiel', 'id');
    }
    public function sortie(){
        return $this->hasOne(Sortie::class,'id_materiel', 'id');
    }
}
