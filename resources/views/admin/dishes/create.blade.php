@extends('layouts.admin')

@section('content')

    <div class="col-12">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- * NOME PIATTO --}}
            <div class="form-group my-2">
                <label class="fs-2 fw-semibold" for="name">Nome Piatto</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Inserire Nome Piatto">
            </div>

            {{-- * PREZZO PIATTO --}}
            <div class="form-group my-2">
                <label class="fs-2 fw-semibold" for="name">Prezzo Piatto</label>
                <input type="number" step=".01" class="form-control" name="price" id="price"
                    placeholder="Inserire Prezzo Piatto">
            </div>

            {{-- * INGREDIENTI --}}
            <div class="form-group my-2">
                <label class="fs-2 fw-semibold" for="name">Ingredienti</label>
                <textarea class="form-control" name="ingredients" id="ingredients" placeholder="Inserire Ingredienti"></textarea>
            </div>

            <div class="form-group my-2">
                <label class="fs-2 fw-semibold" for="name">Descrizione</label>
                <textarea class="form-control" name="description" id="description" placeholder="Inserire Descrizione"></textarea>
            </div>

            {{-- * VISIBILITA' --}}
            <div class="col-5">
                <label class="control-label my-2 fw-bold">Visibile</label>
                <select class="form-control" name="visible" id="visible">
                    <option value="0">NO</option>
                    <option value="1" selected>SI</option>
                </select>
            </div>

            {{-- * VEGANO' --}}
            <div class="col-5">
                <label class="control-label my-2 fw-bold">Vegano</label>
                <select class="form-control" name="vegan" id="visible">
                    <option value="" disable selected>Inserisci un opzione</option>
                    <option value="0">NO</option>
                    <option value="1">SI</option>
                </select>
            </div>

            {{-- * VEGETARIANO' --}}
            <div class="col-5">
                <label class="control-label my-2 fw-bold">Vegetariano</label>
                <select class="form-control" name="vegetarian" id="visible">
                    <option value="" disable selected>Inserisci un opzione</option>
                    <option value="0">NO</option>
                    <option value="1">SI</option>
                </select>
            </div>

            {{-- * IMMAGINE --}}
            <div class="mb-3">
                <label for="image_path" class="form-label">Immagine del piatto</label>
                <input class="form-control" type="file" id="image_path" name="image_path">
            </div>

            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
