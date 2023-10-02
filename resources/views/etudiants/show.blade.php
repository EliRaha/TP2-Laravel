@extends('layouts.app')
@section('title','list des Etudients')
@section('titleHeader','list des Etudients')
@section('content')
<div class="content-wrapper">
    <div class="custom-card">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="font-weight-bold">Etudient ID:</span> {{ $etudient->id }}<br>
                <span class="font-weight-bold">Nom:</span> {{ $etudient->nom }}<br>
                <span class="font-weight-bold">Adresse:</span> {{ $etudient->adresse }}<br>
                <span class="font-weight-bold">Phone:</span> {{ $etudient->phone }}<br>
                <span class="font-weight-bold">Email:</span> {{ $etudient->email }}<br>
                <span class="font-weight-bold">Date de Naissance:</span> {{ $etudient->date_de_naissance }}<br>
                <span class="font-weight-bold">Ville ID:</span> {{ $etudient->ville_id }}<br>
                <span class="font-weight-bold">Created At:</span> {{ $etudient->created_at }}<br>
                <span class="font-weight-bold">Updated At:</span> {{ $etudient->updated_at }}
            </li>
        </ul>
        <a href="{{ route('etudient.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> list des etudients 
        </a>
    </div>
</div>

@endsection