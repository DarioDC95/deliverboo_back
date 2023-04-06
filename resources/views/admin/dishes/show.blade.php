@extends('layouts.admin')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row my-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2>{{ $dish->name }}</h2>
                            </div>
                            <div>
                                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i> Modifica</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @if ($dish->image_path != null)
                            <img class="img-fluid w-15 mb-3" style="width: 100%; max-width: 350px;"
                                src="{{ asset('storage/' . $dish->image_path) }}"
                                alt="Immagine di copertina del ristorante {{ $dish->name }}">
                        @else
                            <img src="{{Vite::asset('resources/img/logo-blue.png')}} " style="width: 20rem" >
                        @endif

                    </div>
                    <div class="col-md-6">
                        <h4>Ingredienti:</h4>
                        <p>{{ $dish->ingredients }}</p>
                        <h4>Prezzo:</h4>
                        <p>{{ $dish->price }} €</p>
                        <h4>Descrizione:</h4>
                        <p>{{ $dish->description }}</p>
                        <h4>Visibilità:</h4>
                        @if ($dish->visible)
                            <p><i class="fa-solid fa-check" style="color: #008000;"></i> Visibile</p>
                        @else
                            <p><i class="fa-solid fa-x" style="color: #ff0000;"></i> Non visibile</p>
                        @endif
                        <h4>Vegano:</h4>
                        @if ($dish->vegan === null)
                            <p>Non disponibile</p>
                        @elseif ($dish->vegan == true)
                            <p><i class="fa-solid fa-check" style="color: #008000;"></i> Sì</p>
                        @elseif ($dish->vegan == false)
                            <p><i class="fa-solid fa-x" style="color: #ff0000;"></i> No</p>
                        @endif
                        <h4>Vegetariano:</h4>
                        @if ($dish->vegetarian === null)
                            <p>Non disponibile</p>
                        @elseif ($dish->vegetarian == true)
                            <p><i class="fa-solid fa-check" style="color: #008000;"></i> Sì</p>
                        @elseif ($dish->vegetarian == false)
                            <p><i class="fa-solid fa-x" style="color: #ff0000;"></i> No</p>
                        @endif
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <a href="{{ route('admin.dishes.index') }}" class="btn btn-49ac9f btn-secondary "><i
                                class="fas fa-arrow-left"></i> Torna all'elenco</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('partials.modal_delete')
@endsection
