<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrigineMat extends Model
{
    use HasFactory;
    protected $table = 'ORIGINE_MAT';
    protected $fillable = [
        'REF_ORIGINE',
        'QUANTITE',
        'PRIX',
        'MONTANT',
        'ORIGINE'
    ];

    public function origne(){
        return $this->belongsTo(Service::class, 'ORIGINE', 'CODE_SERVICE');
    }

    public function materiels(){
        return $this->hasMany(Materiel::class, 'id_origine', 'id');
    }

    public function reference(){
        return $this->belongsTo(ReferenceOrigne::class, 'REF_ORIGINE', 'REFERENCE');
    }
}
