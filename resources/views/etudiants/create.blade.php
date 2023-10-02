@extends('layouts.app')
@section('title','add a student')
@section('titleHeader','add a student')
@section('content')
<form action="{{ route('etudiant.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
        <div class="invalid-feedback">
            Please enter a name:
        </div>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" id="adresse" name="adresse" required>
        <div class="invalid-feedback">
            Please enter an address:
        </div>
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
        <div class="invalid-feedback">
            Please enter a phone number:
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <div class="invalid-feedback">
            Please enter a valid email address:
        </div>
    </div>

    <div class="form-group">
        <label for="date_de_naissance">Date de Naissance:</label>
        <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
        <div class="invalid-feedback">
            Please enter a valid date:
        </div>
    </div>

    <div class="form-group">
        <label for="ville_id">Ville:</label>

        <select class=" form-control" id="ville_id" name="ville_id" required>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}" >{{ $ville->nom }}</option>
            @endforeach

        </select>
        <div class="invalid-feedback">
            Please enter a valid Ville:
        </div>
    </div>
    <button type="submit" class="btn btn-primary" value="save">Save</button>
  
        @endsection