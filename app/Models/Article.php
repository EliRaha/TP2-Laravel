<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory; 
    protected $fillable = [
        'id',
        'titre',
        'titre_fr',
        
        'contenu',
        'contenu_fr',
        
        'date_de_creation',
        // 'langue',
        'user_id',
    ];


    use HasFactory;
    public function user()
    {

        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    /////////////////////////////////////////////////////////////////

    static public function selectArticle()
    {
        // $lang = session()->get('localeDB');

        $query = Article::Select(
            'id',
            'user_id',
            'date_de_creation',
         DB::raw("(CASE WHEN titre IS NULL THEN titre ELSE titre END) as titre")
         
        )
            ->OrderBy('titre')
            ->get();
        return $query;
    }
}