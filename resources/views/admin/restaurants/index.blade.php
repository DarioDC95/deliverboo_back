@extends('layouts.admin')

@section('content')
    <div class="container">
        <div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        @if ($restaurant->isEmpty())
            <h2>Crea il tuo Ristornate</h2>
            <a class="btn btn-success my-3" href="{{ route('admin.restaurants.create') }}">Aggiungi Ristornate</a>
        @else
            <h2>Ecco il tuo ristorante</h2>

            <div class="container mt-5">

                <h2>{{ $restaurant[0]->name }}</h2>
                <h4>{{ $restaurant[0]->p_iva }}</h4>
                <h4>{{ $restaurant[0]->address }}</h4>
                <h4>{{ $restaurant[0]->types[0]->name }}</h4>
                <img class="img-fluid w-15" src="{{ asset('storage/' . $restaurant[0]->cover_path) }}"
                alt="Immagine di copertina del ristorante {{ $restaurant[0]->name }}">

                <div class="d-flex align-center">

                    {{-- * questa rotta modifica le informazioni --}}
                    <a class="btn btn-warning btn-square"
                        href="{{ route('admin.restaurants.edit', $restaurant[0]->id) }}"title="Modifica Dettaglio"><i
                            class="fas fa-edit"></i></a>

                    {{-- * questa rotta elimina il ristorante --}}

                    <form action="{{ route('admin.restaurants.destroy', $restaurant[0]->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-square btn-danger" type="submit" title="Elimina">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
