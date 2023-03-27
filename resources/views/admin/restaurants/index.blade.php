@extends('layouts.admin')

@section('content')
    {{-- messaggio creazione ristorante --}}
    <div class="container mt-2">
        <div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        
        <div class="container mt-5">
            @if ($restaurant->isEmpty())
                <h2>Crea il tuo Ristornate</h2>
                <a class="btn btn-success my-3" href="{{ route('admin.restaurants.create') }}">Aggiungi Ristornate</a>
            @else
                <h2>Ecco il tuo ristorante</h2>
            <div class="d-flex mt-5">
                {{-- cover ristorante  --}}
                <div class="me-5">
                    @if ($restaurant[0]->cover_path != null)
                    <img class="img-fluid" style="width: 23rem;"
                    src="{{ asset('storage/' . $restaurant[0]->cover_path) }}"
                    alt="Immagine di copertina del ristorante {{ $restaurant[0]->name }}">
                    @else
                    <h2>Immagine non disponibile</h2>
                    @endif
                </div>
                    
                <div>
                    <h2>{{ $restaurant[0]->user->name }}</h2>
                    <p>
                        <span class="fw-bold">P.IVA :</span>
                        <span>{{ $restaurant[0]->p_iva }}</span>
                    </p>
                    <p>
                        <span class="fw-bold">Indirizzo:</span>
                        <span>{{ $restaurant[0]->address }}</span>
                    </p>
                    
                    <span class="fw-bold">Tipologia:</span>
                    <ul class="nav">
                        @foreach ( $restaurant[0]->types as $type )
                       <li class="badge rounded-pill  mx-2 my-2 fs-5 bg-badges" style="">{{$type['name']}}</li> 
                        @endforeach
                    </ul>
                </div>

                {{-- bottoni --}}
            </div>
            <div class="d-flex align-items-center mt-4">      
                <div class="d-flex">
                    <div class="me-2">
                        {{-- * questa rotta modifica le informazioni --}}
                        <a class="btn btn-warning btn-square  shadow "
                        href="{{ route('admin.restaurants.edit', $restaurant[0]->id) }}"title="Modifica Dettaglio"><i
                        class="fas fa-edit"></i>Modifica</a>
                    </div>

                     {{-- * questa rotta elimina il ristorante --}}
                    <form action="{{ route('admin.restaurants.destroy', $restaurant[0]->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-square btn-danger confirm-delete-button text-black" type="submit" title="Elimina"
                            data-name="{{ $restaurant[0]->name }}" data-bs-toggle="modal"
                            data-restaurant="{{ $restaurant[0]->id }}">
                            <i class="fas fa-trash"></i> Elimina
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
    @include('partials.modal_delete')
@endsection
