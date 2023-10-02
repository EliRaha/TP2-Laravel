@extends('layouts.app')
@section('title','student detailes')
@section('titleHeader','student detailes')
@section('content')
<div class="content-wrapper">

    <div class="custom-card ">
        <a href="{{ route('etudient.edit', $etudient->id) }}" class="btn btn-primary m-2">Edit</a>
        <form action="{{ route('etudient.destroy', $etudient->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <div class="student-info bg-success">
            <h3 class="text-white text-center">Student Information</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="font-weight-bold ">Etudient ID:</span> {{ $etudient->id }}<br>
                    <span class="font-weight-bold">Nom:</span> {{ $etudient->nom }}<br>
                    <span class="font-weight-bold">Adresse:</span> {{ $etudient->adresse }}<br>
                    <span class="font-weight-bold">Phone:</span> {{ $etudient->phone }}<br>
                    <span class="font-weight-bold">Email:</span> {{ $etudient->email }}<br>
                    <span class="font-weight-bold">Date de Naissance:</span> {{ $etudient->date_de_naissance }}<br>
                    <span class="font-weight-bold">Ville:</span> {{ $etudient->ville->nom }}<br>
                    <span class="font-weight-bold">Created At:</span> {{ $etudient->created_at }}<br>
                    <span class="font-weight-bold">Updated At:</span> {{ $etudient->updated_at }}
                </li>
            </ul>
        </div>

        <a href="{{ route('etudient.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> list des etudients
        </a>
    </div>
</div>


@endsection