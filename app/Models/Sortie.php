<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;
    protected $table = 'SORTIE';
    protected $fillable = ['REF_SORTIE',
                            'id_materiel',
                            'STATUT',
                            'OBJET',
                            'DATE'
                            ];

    public function materiel(){
        return $this->belongsTo(Materiel::class,'id_materiel', 'id');
    }
}
