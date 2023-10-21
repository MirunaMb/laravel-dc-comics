@extends('layouts.app')

@section('main-content')
    <div class="container my-5">
        <h1>Crea un nuovo Comic</h1>
        <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="series" class="form-label">Serie</label>
                        <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"
                            name="series" value="{{ old('series') }}">
                        @error('series')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="thumb" class="form-label">Immagine</label>
                        <input type="url" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                            name="thumb" value="{{ old('thumb') }}">
                        @error('thumb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sale_date" class="form-label">Data d'uscita</label>
                        <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                            name="sale_date" value="{{ old('sale_date') }}">
                        @error('sale_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipologia</label>
                        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                            <option value="comic book" {{ old('type') === 'comic book' ? 'selected' : '' }}>Comic Book
                            </option>
                            <option value="graphic novel" {{ old('type') === 'graphic novel' ? 'selected' : '' }}>Graphic
                                Novel</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
