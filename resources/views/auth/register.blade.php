{{-- registrazione --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                            </div>
                        </div>

                        {{-- indirizzo --}}
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo ') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="" required
                                minlength="4" maxlength="255" >
                            </div>
                        </div>

                        {{-- P. iva --}}
                        <div class="mb-4 row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA ') }}</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" class="form-control" name="p_iva" value="" required
                                minlength="11" maxlength="20" >
                            </div>
                        </div>

                        {{-- * CATEGORIA --}}
                        <div class="mb-4 row">

                            <div class="form-group my-2">
                                <label class="fs-2 fw-semibold" for="types">Categorie</label>
                                <div>
                                    @foreach ($types as $type)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$type->id}}" id="types" name="types[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
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
                                <button type="submit" class="btn btn-primary">
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
@endsection