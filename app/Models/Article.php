<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'ARTICLE';
    protected $fillable = ['id_categorie', 'DESIGNATION', 'SPECIFICATION', 'UNITE', 'EFFECTIF', 'DISPONIBLE', 'CODE_SERVICE'];

    public function categorie(){
        return $this->belongsTo(Categorie::class, 'id_categorie', 'id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'CODE_SERVICE', 'CODE_SERVICE');
    }

    public function demandes(){
        return $this->hasMany(Demande::class, 'id_article', 'id');
    }
}
