@extends('layouts.app')
@section('title','list the students')
@section('titleHeader','list the students')
@section('content')
<div class="container">
  
    <h4 class="text-center p-3" style="background-color: #F7FAFC;">You can see list of the students here . For more details, click on the select button.</h4>

    <a href="{{ route('etudiant.create') }}" class="btn btn-success m-2">Create</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <!-- <th>Adresse</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date de Naissance</th>
                <th>Ville ID</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->nom }}</td>

                <!-- <td>{{ $etudiant->adresse }}</td>
                <td>{{ $etudiant->phone }}</td>
                <td>{{ $etudiant->email }}</td>
                <td>{{ $etudiant->date_de_naissance }}</td>
                <td>{{ $etudiant->ville->nom }}</td> -->
                <td>
                    <div class="butt">
                        <a href="{{ route('showEtudiant', $etudiant->id) }}" class="btn btn-primary">select</a>
                        <!-- <form action="{{ route('etudient.destroy', $etudient->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> -->
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection