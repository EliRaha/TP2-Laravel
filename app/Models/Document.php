<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
     use HasFactory; 
    protected $fillable = [
        'id',
        'titre',
        'titre_fr',
        // 'titre_en',
        'file',
        'date',
        'user_id',
    ];


    // use HasFactory;
    // public function article()
    // {

    //     return $this->hasOne('App\Models\Article', 'id', 'article_id');
    // }

    
    use HasFactory;
    public function user()
    {

        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    /////////////////////////////////////////////////////////////////

    static public function selectDocument()
    {
        // $lang = session()->get('localeDB');

        $query = Article::Select(
            'id',
            'user_id',
            'date',
         DB::raw("(CASE WHEN titre IS NULL THEN titre ELSE titre END) as titre")
         
        )
            ->OrderBy('titre')
            ->get();
        return $query;
    }
}