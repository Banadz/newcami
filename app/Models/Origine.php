<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origine extends Model
{
    use HasFactory;
    protected $table = 'ORIGINE';
    protected $fillable = [
        'REF_ORIGINE',
        'id_article',
        'QUANTITE',
        'STOCK',
        'PRIX',
        'MONTANT',
        'UNITE',
        'ORIGINE'
    ];


    public function reference(){
        return $this->belongsTo(ReferenceOrigne::class, 'REF_ORIGINE', 'REFERENCE');
    }

    public function article(){
        return $this->belongsTo(Article::class, 'id_article', 'id');
    }
}
