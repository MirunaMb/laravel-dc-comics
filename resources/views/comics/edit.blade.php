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
                <input type="text" id="title" name="title" value="{{ old('title', $comics->title) }}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="type">Tipo</label>
                <select id="type" name="type" class="form-select @error('type') is-invalid @enderror">
                    <option value="comic book" @if (old('type', $comics->type) === 'comic book') selected @endif>Comic Book</option>
                    <option value="graphic novel" @if (old('type', $comics->type) === 'graphic novel') selected @endif>Graphic Novel</option>
                </select>
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="price">Prezzo</label>
                <input type="number" id="price" name="price" value="{{ old('price', $comics->price) }}" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-3">
                <label for="series">Serie</label>
                <input type="text" id="series" name="series" value="{{ old('series', $comics->series) }}" class="form-control @error('series') is-invalid @enderror">
                @error('series')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-3">
            <img>
            <label for="thumb">Immagine</label>
            <input type="url" id="thumb" name="thumb" value="{{ old('thumb', $comics->thumb) }}" class="form-control @error('thumb') is-invalid @enderror">
            @error('thumb')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-3">
            <label for="sale_date">Data d'uscita</label>
            <input type="text" id="sale_date" name="sale_date" value="{{ old('sale_date', $comics->sale_date) }}" class="form-control @error('sale_date') is-invalid @enderror">
            @error('sale_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-3">
            <label for="description">Descrizione</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $comics->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
