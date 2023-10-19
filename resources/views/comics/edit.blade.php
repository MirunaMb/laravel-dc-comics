@extends('layouts.app')

@section('main-content')
    <a href="{{ route('comics.index') }}" class="btn btn-success">
        Torna alla lista
    </a>

    <h1>Modifica Comic</h1>

    <form action="{{ route('comics.update', $comics) }}" method="POST">
        @csrf {{-- Aggiunge il token CSRF --}}
        @method('PUT') {{-- Utilizza il metodo PUT per l'aggiornamento --}}

        <div class="row">
            <div class="col-3">
                <label for="title">Titolo</label>
                <input type="text" id="title" name="title" value="{{ $comics->title }}" class="form-control">
            </div>

            <div class="col-3">
                <label for="type">Tipo</label>
                <select id="type" name="type" class="form-select">
                    <option value="comic book" @if ($comics->type == 'comic book') selected @endif>Comic Book</option>
                    <option value="graphic novel" @if ($comics->type == 'graphic novel') selected @endif>Graphic Novel</option>
                </select>
            </div>

            <div class="col-3">
                <label for="price">Prezzo</label>
                <input type="number" id="price" name="price" value="{{ $comics->price }}" class="form-control">
            </div>

            <div class="col-3">
                <label for="series">Serie</label>
                <input type="text" id="series" name="series" value="{{ $comics->series }}" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <label for="thumb">Immagine</label>
            <input type="file" id="thumb" name="thumb" class="form-control">
        </div>

        <div class="col-3">
            <label for="sale_date">Data d'uscita</label>
            <input type="text" id="sale_date" name="sale_date" value="{{ $comics->sale_date }}" class="form-control">
        </div>

        <div class="col-3">
            <label for="description">Descrizione</label>
            <textarea id="description" name="description" class="form-control">{{ $comics->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
