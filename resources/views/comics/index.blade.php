@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('main-content')
    <div class="container text-center my-5">
        <div class="container">
            <a href="{{ route('comics.create') }}" class="btn btn-success">
                Crea nuovo comic
            </a>
        </div>


        <h1 class="my-5">I nostri comics</h1>

        <div class="container d-flex flex-wrap text-center">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Info</th>
                        </tr>
                    </thead>
                    @foreach ($comics as $comic)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $comic->id }}</th>
                                <td>{{ $comic->title }}</td>
                                <td class="w-75">{{ $comic->description }}</td>
                                <td>
                                    <div class="d-flex flex-row border-bottom-0 gap-2 ">


                                        <a href="{{ route('comics.show', $comic->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary" href="{{ route('comics.edit', $comic->id) }}"><i
                                                class="fa-solid fa-gear fa-bounce"></i>
                                        </a>
                                        {{-- ICON TRASH --}}
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal-{{ $comic->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        {{-- MODAL PER IL TRASH --}}
                                        <div class="modal fade text-black" id="delete-modal-{{ $comic->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fs-5" id="exampleModalLabel">Elimina elemento
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare definitivamente questo comic
                                                        "{{ $comic->titolo }}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{ route('comics.destroy', $comic) }}" method="POST"
                                                            class="mx-1">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    {{ $comics->links() }}
@endsection
