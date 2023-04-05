@extends('layouts.admin')


@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <h2>Elenco Ordini</h2>
                    <img class="ms-2" style="width:3rem" src="{{ Vite::asset('resources/img/orders.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped w-100 table-hover">
                <thead>
                    
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Azioni</th>
                </thead>
                <tbody>
                    @forelse ($orders as $order )
                        
                    @empty
                    <div class="mb-4">
                        <div class="d-inline-block alert alert-success">
                            Non hai nessun ordine 
                        </div>
                    </div>
                        
                    @endforelse

</div>
@endsection