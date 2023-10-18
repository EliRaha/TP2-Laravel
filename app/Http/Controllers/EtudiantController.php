<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

/////////////////////////////////////////////////////////////////

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            // dd("ok");
            $etudiants = Etudiant::all();
            // dd($etudiant);
            return view('etudiants.index', ['etudiants' => $etudiants]);
         
        }
    }
    ///////////////////////////////////////////////////////////////////

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create',['villes' => $villes]);
    }
    ////////////////////////////////////////////////////////////////////////

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $userID = Auth::user()->id;
      
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'phone' => 'required|regex:/^\d{10}$/',
            'date_de_naissance' => 'required|date_format:Y-m-d',
            'ville_id' => 'required|exists:villes,id',
        ]);
            
        Etudiant::create([
            'id' => $userID,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
            
        ]);
        return redirect()->route('etudiant.index');
    } else {
        // User is not authenticated, handle the error or redirect to the login page
        return redirect()->route('login');
    }
    }

    //////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }

    ////////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEtudiant(Etudiant $etudiant)
    {
        return view('etudiants.showEtudiant', ['etudiant' => $etudiant]);
    }

    //////////////////////////////////////////////////////////////////////
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $etudiant->date_de_naissance = Carbon::parse($etudiant->date_de_naissance)->format('Y-m-d');
        $villes = Ville::all();
        return view('etudiants.edit', ['etudiant' => $etudiant , 'villes' => $villes]);
    }

    ////////////////////////////////////////////////////////////////////////
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'phone' => 'required|regex:/^\d{10}$/',
            'email' => 'required|email',
            'date_de_naissance' => 'required|date_format:Y-m-d',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('showEtudiant', $etudiant);
    }

/////////////////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index');
    }
}
