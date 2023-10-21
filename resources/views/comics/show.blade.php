@extends('layouts.app')

@section('main-content')
    <div class="container">
        <h2>Dati del fumetto:
            <p class="show"> {{ $comics->title }}</p>
        </h2>
        <img class="my-3" src= "{{ $comics->thumb }}" alt="">
        <p class="card-text"><span class="show">Descrizione: </span>
        <p class="des-show">{{ $comics->description }}</p>
        </p>
        <p class="card-text des-show"><span class="show">Prezzo: </span> {{ $comics->price }} €</p>
        <p class="card-text des-show"><span class="show">Serie: </span> {{ $comics->series }}</p>
        <p class="card-text des-show"><span class="show">Data d'uscita : </span> {{ $comics->sale_date }}</p>
        <p class="card-text des-show"><span class="show">Tipologia: </span> {{ $comics->type }}</p>
        <a class="btn btn-primary ml-auto" href="{{ route('comics.index') }}">Torna indietro</a>
        {{-- @dump($comics) --}}
    @endsection
