@extends('layouts.admin')
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row my-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2>Elenco Piatti</h2>
                            </div>
                            <div>
                                <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Aggiungi un nuovo
                                    Piatto</a>
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
                                <th>Immagine</th>
                                <th>Nome</th>
                                <th>Ingredienti</th>
                                <th>Prezzo</th>
                                <th>Descrizione</th>
                                <th>Visibilità</th>
                                <th>Vegano</th>
                                <th>Vegetariano</th>
                                <th>Azioni</th>
                            </thead>
                            <tbody>
                                @forelse ($dishes as $dish)
                                    <tr>
                                        <td>
                                            @if ($dish->image_path != null)
                                                <img class="img-fluid " style="width: 10rem;"
                                                    src="{{ asset('storage/' . $dish->image_path) }}"
                                                    alt="Immagine di copertina del piatto {{ $dish->name }}">
                                            @else
                                                <h2>Immagine non disponibile</h2>
                                            @endif
                                        </td>
                                        <td>{{ $dish['name'] }}</td>
                                        <td>{{ $dish['ingredients'] }}</td>
                                        <td>{{ $dish['price'] }} €</td>
                                        <td>{{ $dish['description'] }}</td>
                                        <td>
                                            @if ($dish['visible'])
                                                <div class="grid-item"><i class="fa-solid fa-check"
                                                        style="color: #008000;"></i></div>
                                            @else
                                                <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i>
                                                </div>
                                            @endif
                                        </td>

                                        {{-- * VEGANO --}}
                                        <td>
                                            @if ($dish['vegan'] === null)
                                                <p>Non è Disponibile</p>
                                            @elseif ($dish['vegan'] == true)
                                                <div class="grid-item"><i class="fa-solid fa-check"
                                                    style="color: #008000;"></i></div>
                                            @elseif ($dish['vegan'] == false)
                                                <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i></div>
                                            @endif
                                        </td>

                                        {{-- * VEGETARIANO --}}
                                        <td>
                                            @if ($dish['vegetarian'] === null)
                                                <p>Non è Disponibile</p>
                                            @elseif ($dish['vegetarian'] == true)
                                                <div class="grid-item"><i class="fa-solid fa-check"
                                                        style="color: #008000;"></i></div>
                                            @elseif ($dish['vegetarian'] == false)
                                                <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i></div>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex">

                                                {{-- * questa rotta visualizza il dettaglio del progetto --}}
                                                <div>
                                                    <a href="{{ route('admin.dishes.show', $dish->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                </div>

                                                {{-- * Questa rotta modifica il piatto --}}
                                                <div class="mx-1">
                                                    <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                                                        class="btn btn-warning"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </div>

                                                {{-- * Questa rotta elimina il piatto --}}
                                                <form action="{{ route('admin.dishes.destroy', $dish->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-square btn-danger confirm-delete-button"
                                                        type="submit" title="Elimina" data-name="{{ $dish->name }}"
                                                        data-bs-toggle="modal">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="mb-4">
                                        <div class="d-inline-block alert alert-success">
                                            Non hai nessun Piatto Inserito, <span
                                                class="fw-semibold text-primary text-decoration-underline">clicca su
                                                aggiungi un Nuovo Piatto</span> per iniziare
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
    @include('partials.modal_delete')
@endsection
