@extends('layouts.app')
@section('title','edit the student')
@section('titleHeader','edit the student')
@section('content')
<form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
        <div class="invalid-feedback">
            Please enter a name.
        </div>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $etudiant->adresse }}" required>
        <div class="invalid-feedback">
            Please enter an address.
        </div>
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $etudiant->phone }}" required>
        <div class="invalid-feedback">
            Please enter a phone number.
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}" required>
        <div class="invalid-feedback">
            Please enter a valid email address.
        </div>
    </div>

    <div class="form-group">
        <label for="date_de_naissance">Date de Naissance:</label>
        <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{ $etudiant->date_de_naissance}}">

        <div class="invalid-feedback">
            Please enter a valid date of birth.
        </div>
    </div>

    <div class="form-group">
        <label for="ville_id">Ville:</label>

        <select class=" form-control" id="ville_id" name="ville_id" required>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}" {{ $etudient->ville_id == $ville->id ? 'selected' : ""}}>{{ $ville->nom }}</option>
            @endforeach

        </select>
        <div class="invalid-feedback">
            Please enter a valid Ville:
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection