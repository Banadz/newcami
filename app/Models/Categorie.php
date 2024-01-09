<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'CATEGORIE';
    protected $fillable = ['LABEL_CATEGORIE','COMPTE'];

    public function compte(){
        return $this->belongsTo(Compte::class, 'COMPTE', 'COMPTE');
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
