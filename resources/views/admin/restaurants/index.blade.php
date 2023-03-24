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

                <h2>{{ $restaurant[0]->user->name }}</h2>
                <h4>{{ $restaurant[0]->p_iva }}</h4>
                <h4>{{ $restaurant[0]->address }}</h4>
                <h4>{{ $restaurant[0]->types[0]->name }}</h4>

                <div class="d-flex align-items-center ">
                    @if ($restaurant[0]->cover_path != null)
                        <img class="img-fluid w-15" style="width: 18rem;"
                            src="{{ asset('storage/' . $restaurant[0]->cover_path) }}"
                            alt="Immagine di copertina del ristorante {{ $restaurant[0]->name }}">
                    @else
                        <h2>Immagine non disponibile</h2>
                    @endif
                    <div>
                        {{-- * questa rotta modifica le informazioni --}}
                        <a class="btn btn-warning btn-square"
                            href="{{ route('admin.restaurants.edit', $restaurant[0]->id) }}"title="Modifica Dettaglio"><i
                                class="fas fa-edit"></i></a>
                    </div>
                    {{-- * questa rotta elimina il ristorante --}}

                    <form action="{{ route('admin.restaurants.destroy', $restaurant[0]->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-square btn-danger confirm-delete-button" type="submit" title="Elimina"
                            data-name="{{ $restaurant[0]->name }}" data-bs-toggle="modal"
                            data-restaurant="{{ $restaurant[0]->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
    @include('partials.modal_delete')
@endsection
