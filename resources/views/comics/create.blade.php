@extends('layouts.app')

@section('main-content')
<div class="container my-5"> <h1>Crea un nuovo Comic</h1> <form action="{{ route('comics.store') }}" method="POST"
    enctype="multipart/form-data"> @csrf <div class="row">
        <div class="col-6">
        <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>

    <div class="mb-3">
        <label for="series" class="form-label">Serie</label>
        <input type="text" class="form-control" id="series" name="series">
    </div>
</div>

<div class="col-6">
    <div class="mb-3">
        <label for="thumb" class="form-label">Immagine</label>
        <input type="file" class="form-control" id="thumb" name="thumb">
    </div>

    <div class="mb-3">
        <label for="sale_date" class="form-label">Data d'uscita</label>
        <input type="text" class="form-control" id="sale_date" name="sale_date">
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Tipologia</label>
        <select class="form-select" id="type" name="type">
            <option value="comic book">Comic Book</option>
            <option value="graphic novel">Graphic Novel</option>
        </select>
    </div>
</div>
</div>

<button type="submit" class="btn btn-primary">Salva</button>
</form>
</div>
@endsection