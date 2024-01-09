<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Division;

class Service extends Model
{
    use HasFactory;
    protected $table = 'SERVICE';
    protected $primaryKey = 'CODE_SERVICE';
    protected $keyType = 'string';
    protected $fillable = ['CODE_SERVICE', 'LABEL_SERVICE', 'ENTETE1', 'ENTETE2', 'ENTETE3','ENTETE4','ENTETE5',
    'SIGLE_SERVICE','VILLE_SERVICE','ADRESSE_SERVICE','CONTACT_SERVICE','ADRESSE_MAIL'];

    public function divisions()
    {
        return $this->hasMany(Division::class, 'CODE_SERVICE', 'CODE_SERVICE');
    }
}
