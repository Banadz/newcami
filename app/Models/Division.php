<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Agent;

class Division extends Model
{
    use HasFactory;
    protected $table = 'DIVISION';
    protected $primaryKey = 'CODE_DIVISION';
    protected $keyType = 'string';
    protected $fillable = ['CODE_DIVISION', 'LABEL_DIVISION','CODE_SERVICE'];

    public function service(){
        return $this->belongsTo(Service::class, 'CODE_SERVICE', 'CODE_SERVICE');
    }

    public function agents()
    {
        return $this->hasMany(Agent::class, 'CODE_DIVISION', 'CODE_DIVISION');
    }

}
