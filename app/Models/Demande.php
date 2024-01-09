<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reference;
use App\Models\Article;

class Demande extends Model
{
    use HasFactory;


    protected $table = 'DEMANDE';
    protected $fillable = [
        'REF_DEMANDE',
        'id_article',
        'QUANTITE',
        'STOCK',
        'UNITE',
        'ETAT_DEMANDE'
    ];


    public function reference(){
        return $this->belongsTo(Reference::class, 'REF_DEMANDE', 'REFERENCE');
    }

    public function article(){
        return $this->belongsTo(Article::class, 'id_article', 'id');
    }
}
