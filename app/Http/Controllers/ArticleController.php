<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Etudiant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ArticleController extends Controller
{
    ///////////////////////////////////////////////////////////////
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        $userID = Auth::user()->id;

        if ($userID) {
            // $articles = Article::all();
            $articles = Article::selectArticle();
            // $etudiant = Etudiant::where('user_id', $user->id)->first();

            // if ($etudiant) {
            //     $etudiantId = $etudiant->id;
                return view('articles.index', compact('articles', 'userID'));
            // }
        }

        $message = "You must be logged in as a student user to view articles.";
        return view('articles.index', compact('message'));
    }
/////////////////////////////////////////////////////////////////////
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }
/////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        // $etudiant = Etudiant::where('user_id', $user->id)->first();

        $request->validate([
             'titre' => 'required|min:2|max:50',
             'titre_fr' => 'required|min:2|max:50',
             'contenu' => 'required',
             'contenu_fr' => 'required',
             'date_de_creation' => 'required|date_format:Y-m-d',
             
        ]);

        // $article = new Article;
        // $article->titre = $request->titre;
        // // $article->titre_fr = ucfirst($request->titre_fr);
        // // $article->titre_en = ucfirst($request->titre);
        // $article->contenu = $request->contenu;
        // // $article->contenu_fr = $request->contenu_fr;
        // // $article->contenu_en = $request->contenu_en;
        // $article->date_de_creation = $request->date_de_creation;
        // $article->user_id = $userID;
        // $article->save();
        Article::create([
            'titre' => $request->titre,
            'titre_fr' => ucfirst($request->titre_fr),
           'contenu' => $request->contenu,
            'contenu_fr' => $request->contenu_fr,
            'date_de_creation' => $request->date_de_creation,
            'user_id' => $userID
        ]);

        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

///////////////////////////////////////////////////////////////////////////

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $userID = Auth::user()->id;
        //  $etudiantId="";
        // if ($user) {
        //     $etudiant = Etudiant::where('user_id', $user->id)->first();
        //     if ($etudiant) {
        //         $etudiantId = $etudiant->id;
        //     }
        // }
        
        return view('articles.show', compact('article', "userID"));
    }

    /////////////////////////////////////////////////////////////////////

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $userID = Auth::user()->id;
        $etudiantId = "";
        if ($userID==$article->user_id) {
            // $etudiant = Etudiant::where('user_id', $user->id)->first();
            // if ($etudiant) {
            //     $etudiantId = $etudiant->id;
                $request->validate([
                    'titre' => 'required|min:2|max:50',
                    'titre_fr' => 'required|min:2|max:50',
                    'contenu' => 'required',
                    'contenu_fr' => 'required',
                    'date_de_creation' => 'required|date_format:Y-m-d',
                   
                ]);
                $article->update([
                    'titre' => ucfirst($request->titre),
                    'titre_fr' => ucfirst($request->titre_fr),
                    'contenu' => $request->contenu,
                    'contenu_fr' => $request->contenu_fr,
                    'date_de_creation' => $request->date_de_creation,
                    //'etudiant_id' => $etudiantId,
                ]);
                return redirect()->route('article.show', $article)->with('success', 'Article updated successfully');
           
            
        }

        return redirect()->route('login')->with('error', 'forbidden access');
       
    }
    /////////////////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully');
    }

    public function page(){
        $article = Article::Select()
                    ->paginate(5);

        return view('article.page', ['articles' => $article]);
    }

    public function showPDF(Article $article){
      

        $pdf = PDF::loadView('articles.show-pdf', ['article' => $article]);
        //return $pdf->download('pdfname.pdf');
        return $pdf->stream('pdfname.pdf');
    }
}
