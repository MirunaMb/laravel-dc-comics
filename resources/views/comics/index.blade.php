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
                <table class="table">
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
                                <td class="d-flex flex-row border-bottom-0 gap-2 ">
                                    <a href="{{ route('comics.show', $comic->id) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
