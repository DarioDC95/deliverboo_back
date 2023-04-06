{{-- Home --}}
@extends('layouts.app')

{{-- Bg-animato --}}



@section('content')
    <div class="container">
        <div class="row flex-column justify-content-center">
            <div class="mt-3 d-flex flex-column text-center col-12">
                <img style="width:700px" class="img-fluid" src="{{ Vite::asset('resources/img/logo-blue.png') }}"
                    alt="">
                <h2 class="">Diventa un partner di Deliveboo </h2>
                <p class="fs-5">Insieme possiamo aiutarti a raggiungere sempre più clienti</p>
            </div>

            @if (Auth::check())
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card ">
                            <a class="text-decoration-none" href="{{ route('register') }}">
                                <div class="card-header bg-selected text-center text-white h5">
                                    {{ __('Hai effettuato l\'accesso!') }}
                                </div>
                            </a>
                            <div class="card-body text-center">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <a class="text-decoration-none" href="{{ route('register') }}">
                                    {{ __('Inizia a navigare nel tuo pannello di controllo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                    <a class="btn btn-square btn-info text-white"
                        href="{{ route('register') }}">
                        Crea un Account
                    </a>
                </div>
            @endif
            <div class="col-12 d-flex justify-content-center align-items-center mt-5">
                <a class="btn btn-square btn-info text-white"
                    href="{{ url('http://localhost:5173/') }}">
                    Torna alla Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

