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
            <form class="myform" method="POST" action="{{route('admin.restaurants.update' ,['restaurant'=> $restaurant['id']])}}" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="p_iva">Modifica P.IVA</label>
                    <input type="text" class="form-control" minlength="11" maxlength="11" name="p_iva" id="p_iva" placeholder="Inserisci P.IVA" value="{{old('p_iva') ?? $restaurant->p_iva }}">
                </div>
                <div class="form-group my-2">
                    <label class="fs-2 fw-semibold" for="address">Modifica Indirizzo</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Inserisci Indirizzo" value="{{old('address') ?? $restaurant->address }}">
                </div>

                <div class="form-group my-2">

                    <label for="types" class="fs-2 fw-semibold">{{ __('Tipologia ') }}</label>

                    <div>

                        <div class="container-select">
                            <div class="select-btn">
                                <div class="btn-text">Seleziona Tipologia</div>
                                <div class="arrow-dwn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </div>
                
                            <ul class="list-items">
                                @foreach ($types as $type)
                                <li class="item {{ $restaurant->types->contains($type) ? 'checked' : '' }}">
                                    <input type="checkbox" class="input-checkbox types-checks" class=`` value="{{$type->id}}" name="types[]" {{ $restaurant->types->contains($type) ? 'checked' : '' }}>
                                    <div class="checkbox">
                                        <i class="fa-solid fa-check check-icon"></i>
                                    </div>
                                    <div class="item-text">{{ $type->name }}</div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="error-message" style="display: none; color: red;" class="help-block error-help-block">Seleziona almeno una Tipologia</div>
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

<!-- Javascript Requirements -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\UpdateRestaurantRequest') !!}
@endsection