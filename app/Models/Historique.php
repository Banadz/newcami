<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;
    protected $table = 'HISTORIQUE';
    protected $fillable = ['id_materiel',
                            'MATRICULE',
                            'ETAT',
                            'DATE_DEB',
                            'DATE_FIN'
                            ];

    public function materiel(){
        return $this->belongsTo(Materiel::class, 'id_materiel', 'id');
    }
    public function agent(){
        return $this->belongsTo(Agent::class, 'MATRICULE', 'MATRICULE');
    }
}
