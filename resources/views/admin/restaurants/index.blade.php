@extends('layouts.admin')

@section('content')

<div class="container">
    <h2>Crea il tuo Ristornate</h2>
    <a class="btn btn-success my-3" href="{{route('admin.create')}}">Aggiungi Ristornate</a>
</div>

@endsection