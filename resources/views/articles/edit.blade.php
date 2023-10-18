@extends('layouts.app')
@section('title', trans('lang.text_titleEditPage'))
@section('titleHeader', trans('lang.text_titleEditPage'))
@section('content')

<form action="{{ route('article.update', $article->id) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group">
       <label for="titre">Title:</label>
        <input type="text" class="form-control" id="titre" name="titre" value="{{ $article->titre }}" required>
        <div class="invalid-feedback">
           {{ trans('lang.text_title') }}
        </div>
    </div>
     <div class="form-group">
        <label for="titre">Titre:</label>
        <input type="text" class="form-control" id="titre_fr" name="titre_fr" value="{{ $article->titre_fr }}" required>
        <div class="invalid-feedback">
            {{ trans('lang.text_title') }}
        </div>
    </div> 

    <div class="form-group">
        <label for="contenu">Content(en):</label>
        <textarea class="form-control" id="contenu" name="contenu" required>{{ $article->contenu }}</textarea>
        <div class="invalid-feedback">
            {{ trans('lang.text_insertModification') }}
        </div>
    </div>
     <div class="form-group">
        <label for="contenu">Contenu(fr) :</label>
        <textarea class="form-control" id="contenu" name="contenu_fr" required>{{ $article->contenu_fr }}</textarea>
        <div class="invalid-feedback">
            {{ trans('lang.text_insertModification') }}
        </div>
    </div> 

    <div class="form-group">
        <label for="date_de_creation">{{ trans('lang.text_date') }} :</label>
        <input type="date" id="date_de_creation" name="date_de_creation" class="form-control" value="{{ $article->date_de_creation }}">
        <div class="invalid-feedback">
            {{ trans('lang.text_messageDateCreation') }}
        </div>
    </div>


    <button type="submit" class="btn btn-primary">{{ trans('lang.text_updatedAt') }}</button>
</form>
@endsection