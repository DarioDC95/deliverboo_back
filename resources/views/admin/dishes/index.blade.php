@extends('layouts.admin')
@section('content')

<main>
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2>Elenco Tipologie</h2>
                        </div>
                        <div>
                            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Aggiungi una nuova Tipologia</a>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('message'))
                <div class="row">
                    <div class="col-4">
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <th>Nome</th>
                            <th>Ingredienti</th>
                            <th>Prezzo</th>
                            <th>Descrizione</th>
                            <th>Visibilità</th>
                            <th>Azioni</th>
                        </thead>
                        <tbody>
                            @forelse ( $dishes as $dish )
                                <tr>
                                    <td>
                                        @if ($dish->image_path != null)
                                        <img class="img-fluid w-15" style="width: 18rem;"
                                            src="{{ asset('storage/' . $dish->image_path) }}"
                                            alt="Immagine di copertina del ristorante {{ $dish->name }}">
                                        @else
                                        <h2>Immagine non disponibile</h2>
                                        @endif
                                    </td>
                                    <td>{{ $dish['name'] }}</td>
                                    <td>{{ $dish['ingredients'] }}</td>
                                    <td>{{ $dish['price'] }}</td>
                                    <td>{{ $dish['description'] }}</td>
                                    <td>
                                        @if($dish['visible'])
                                        <div class="grid-item"><i class="fa-solid fa-check" style="color: #008000;"></i></div>
                                        @else
                                        <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i></div>
                                        @endif
                                    </td>
                                    
                                    <td class="d-flex">
                                        <div>
                                            <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        </div>
                                        <div class="mx-1">
                                            <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                        <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                            <div>
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty 
                                <div class="mb-4">
                                    <div class="d-inline-block alert alert-success">
                                        Non hai nessun progetto, <span class="fw-semibold text-primary text-decoration-underline">clicca su aggiungi Tipologia</span> per iniziare <span class="fw-semibold text-primary text-decoration-underline">o in basso per riempirla di default</span>
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection