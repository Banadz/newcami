<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Agent as Authenticatable;
use App\Models\Division;

class Agent extends Authenticatable
{
    use HasFactory;
    protected $table = 'AGENT';
    protected $primaryKey = 'MATRICULE';
    protected $fillable = ['MATRICULE', 'NOM', 'PRENOM', 'CODE_DIVISION', 'GENRE','PHOTO','FONCTION',
    'TYPE','PSEUDO','EMAIL','PASSWORD','ADRESSE_PHYSIQUE', 'TELEPHONE'];

    public function division()
    {
        return $this->belongsTo(Division::class, 'CODE_DIVISION', 'CODE_DIVISION');
    }
    public function demandes(){
        return $this->hasMany(Demande::class, 'MATRICULE', 'MATRICULE');
    }
    public function materiels(){
        return $this->hasMany(Materiel::class, 'MATRICULE', 'MATRICULE');
    }

    public function historiques(){
        return $this->hasMany(Materiel::class, 'MATRICULE', 'MATRICULE');
    }


    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

    public function getAuthIdentifierName()
    {
        return 'MATRICULE';
    }
}
