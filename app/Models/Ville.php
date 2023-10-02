<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom'
    ];

    public function etudiant()
    {
        return $this->hasMany('App\Models\Etudiant','ville_id', 'id');
    }
}
