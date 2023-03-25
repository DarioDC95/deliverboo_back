@extends('layouts.admin')

@section('content')

<div class="col-12">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <form method="POST" action="{{route('admin.dishes.store')}}" enctype="multipart/form-data">
        @csrf 

        {{-- * NOME PIATTO --}}
        <div class="form-group my-2">
            <label class="fs-2 fw-semibold" for="name">Nome Piatto</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Inserire Nome Piatto">
        </div>

        {{-- * PREZZO PIATTO --}}
        <div class="form-group my-2">
            <label class="fs-2 fw-semibold" for="name">Prezzo Piatto</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Inserire Prezzo Piatto">
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
                    <option value="false">NO</option> 
                    <option value="true">SI</option> 
            </select>
        </div>
       

        

        {{-- * IMMAGINE --}}
        <div class="mb-3">
            <label for="image_path" class="form-label">Immagine del piatto</label>
            <input class="form-control" type="file"  id="image_path" name="image_path">
        </div>

    <button type="submit" class="btn btn-success">Salva</button>
    </form>
</div>
</div>
</div>
@endsection
