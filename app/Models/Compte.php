<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $table = 'COMPTE';
    protected $primaryKey = 'COMPTE';
    protected $keyType = 'string';
    protected $fillable = ['COMPTE', 'LABEL_COMPTE'];

    public function categories()
    {
        return $this->hasMany(Categorie::class, 'COMPTE', 'COMPTE');
    }

}
