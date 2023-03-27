{{-- registrazione --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" class="myform" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- nome ristorante  --}}
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div id="error-name" class="d-none text-danger">
                                    Devi inserire un Nome
                                </div>
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div id="error-email" class="d-none text-danger">
                                    Devi inserire una Email
                                </div>
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- conferma password --}}
                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div id="error-password" class="d-none text-danger">
                                    Devi inserire due password uguali
                                </div>
                            </div>
                        </div>

                        {{-- indirizzo --}}
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo ') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="" required
                                minlength="4" maxlength="255" >
                                <div id="error-address" class="d-none text-danger">
                                    Devi inserire un Indirizzo
                                </div>
                            </div>
                        </div>

                        {{-- P. iva --}}
                        <div class="mb-4 row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA ') }}</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" class="form-control" name="p_iva" value="" required
                                minlength="11" maxlength="20" >
                                <div id="error-p_iva" class="d-none text-danger">
                                    Devi inserire una Partita Iva
                                </div>
                            </div>
                        </div>

                        {{-- * CATEGORIA --}}
                        {{-- <div class="mb-4 row">

                            <div class="form-group my-2">
                                <label class="fs-2 fw-semibold" for="types">Categorie</label>
                                <div>
                                    @foreach ($types as $type)
                                    <div class="form-check">
                                        <input class="form-check-input types-checks" type="checkbox" value="{{$type->id}}" name="types[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                    <div id="error-types" class="d-none text-danger">
                                        Non ci sono tipologie selezionate
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="mb-4 row">

                            <label for="types" class="col-md-4 col-form-label text-md-right">{{ __('Tipologia') }}</label>

                            <div class="col-md-6">

                                <div class="container-select">
                                    <div class="select-btn">
                                        <div class="btn-text">Seleziona Tipologia</div>
                                        <div class="arrow-dwn">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </div>
                                    </div>
                        
                                    <ul class="list-items">
                                        @foreach ($types as $type)
                                        <li class="item">
                                            <input type="checkbox" class="input-checkbox types-checks" value="{{$type->id}}" name="types[]">
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
                        
                        {{-- cover ristorante --}}
                        <div class="mb-4 row">
                            <label for="cover_path" class="form-label">Cover del ristorante</label>
                            <input class="form-control" type="file" id="cover_path" name="cover_path">
                        </div>

                        {{-- bottone  --}}
                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="register-user-submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript Requirements -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\StoreUserRequest') !!}
@endsection