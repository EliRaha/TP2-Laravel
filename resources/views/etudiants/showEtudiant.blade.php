@extends('layouts.app')
@section('title','student detailes')
@section('titleHeader','student detailes')
@section('content')
<div class="content-wrapper">

    <div class="custom-card ">
        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-primary m-2">Edit</a>
        <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <div class="student-info bg-success">
            <h3 class="text-white text-center">Student Information</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="font-weight-bold ">Etudient ID:</span> {{ $etudiant->id }}<br>
                    <span class="font-weight-bold">Nom:</span> {{ $etudiant->nom }}<br>
                    <span class="font-weight-bold">Adresse:</span> {{ $etudiant->adresse }}<br>
                    <span class="font-weight-bold">Phone:</span> {{ $etudiant->phone }}<br>
                    <span class="font-weight-bold">Email:</span> {{ $etudiant->email }}<br>
                    <span class="font-weight-bold">Date de Naissance:</span> {{ $etudiant->date_de_naissance }}<br>
                    <span class="font-weight-bold">Ville:</span> {{ $etudiant->ville->nom }}<br>
                    <span class="font-weight-bold">Created At:</span> {{ $etudiant->created_at }}<br>
                    <span class="font-weight-bold">Updated At:</span> {{ $etudiant->updated_at }}
                </li>
            </ul>
        </div>

        <a href="{{ route('etudiant.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> list des etudiants
        </a>
    </div>
</div>


@endsection