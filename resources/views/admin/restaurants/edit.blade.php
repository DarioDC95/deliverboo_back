@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <form method="POST" action="{{route('admin.restaurants.update' ,['restaurant'=> $restaurant['id']])}}" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="name">Modifica Nome Ristorante</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Inserire Nome Ristorante" value="{{old('name') ?? $restaurant->name }}">
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="p_iva">Modifica P.IVA</label>
                    <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Inserisci P.IVA" value="{{old('p_iva') ?? $restaurant->p_iva }}">
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="address">Modifica Indirizzo</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Inserisci Indirizzo" value="{{old('address') ?? $restaurant->address }}">
                </div>

                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="types">Modifica Categorie</label>
                    <div>
                        @foreach ($types as $type)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$type->id}}" id="types" name="types[]"
                            {{ $restaurant->types->contains($type) ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $type->name }}
                            </label>
                        </div>                        
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cover_path" class="form-label">Modifica Cover del ristorante</label>
                    <input class="form-control" type="file"  id="cover_path" name="cover_path">
                </div>
                
            <button type="submit" class="btn btn-success">Salva</button>
            </form>
        </div>
    </div>
</div>
@endsection