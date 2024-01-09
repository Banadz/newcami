<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomenclature extends Model
{
    use HasFactory;
    protected $table = 'NOMENCLATURE';
    protected $fillable = ['NOMENCLATURE','DETAIL_NOM'];

    public function categories()
    {
        return $this->hasMany(Materiel::class, 'id_nomenclature', 'id');
    }
}
