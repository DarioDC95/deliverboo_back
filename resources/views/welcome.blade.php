{{-- Home --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row flex-column justify-content-center">
        <div class="mt-3 d-flex flex-column text-center col-12">
            <img style="width:700px" class="img-fluid" src="{{Vite::asset('resources/img/logo-blue.png')}}" alt="">
            <h2 class="">Diventa un partner di Deliveboo </h2>
            <p class="fs-5">Insieme possiamo aiutarti a raggiungere sempre più clienti</p>
        </div>
        <div class="col-3">
            <a  class="btn btn-square btn-info position-absolute top-50 start-50 translate-middle text-white" href="{{ route('register') }}">
                Crea un Account
            </a>
        </div>
    </div>

</div>


@endsection
