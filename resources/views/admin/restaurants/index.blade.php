@extends('layouts.admin')

@section('content')
    <div class="container">
        @if ($restaurant->isEmpty())
            <h2>Crea il tuo Ristornate</h2>
            <a class="btn btn-success my-3" href="{{ route('admin.create') }}">Aggiungi Ristornate</a>
        @else
            <h2>Ecco il tuo ristorante</h2>

            <div class="container mt-5">

                <h2>{{ $restaurant[0]->name }}</h2>
                <h4>{{ $restaurant[0]->p_iva }}</h4>
                <h4>{{ $restaurant[0]->address }}</h4>
                <h4>{{ $restaurant[0]->types[0]->name }}</h4>
                <img class="img-fluid w-15" src="{{ asset('storage/' . $restaurant[0]->cover_path) }}"
                    alt="Immagine di copertina del ristorante {{ $restaurant[0]->name }}">

                    {{-- * questa rotta modifica le informazioni --}}
                    <a class="btn btn-warning btn-square" href="{{route('admin.edit', $restaurant[0]->id)}}"title="Modifica Dettaglio"><i
                        class="fas fa-edit"></i></a>

            </div>
        @endif
    </div>
@endsection
