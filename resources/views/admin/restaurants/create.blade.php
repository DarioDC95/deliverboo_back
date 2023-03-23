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
            <form method="POST" action="{{route('admin.store')}}">
                @csrf 

                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="name">Nome Ristorante</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Inserire Nome Ristorante">
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="p_iva">P.IVA</label>
                    <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Inserisci P.IVA">
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="address">Indirizzo</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Inserisci Indirizzo">
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="types">Categorie</label>
                    <select class="form-control" name="types" id="types">
                        @foreach ($types as $type)
                        <option value="{{$type->id}}">
                            {{$type->name}}
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Salva</button>
            </form>
        </div>
    </div>
</div>
@endsection
