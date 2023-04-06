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
                    
                    <th>Nome Cliente</th>
                    <th>Cognome Cliente</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Indirizzo</th>
                    <th>Totale</th>
                    <th>Consegnato</th>
                    <th>Dettagli </th>
                </thead>
                <tbody>
                    @forelse ($orders as $order )
                    <tr>
                        <td>{{$order['name_client']}}</td>
                        <td>{{$order['surname_client']}}</td>
                        <td>{{$order['email_client']}}</td>
                        <td>{{$order['phone_client']}}</td>
                        <td>{{$order['address_client']}}</td>
                        <td>{{$order['total_price']}}&#8364;</td>
                        <td>
                            <form method="POST" action="{{ route('admin.order.update', $order->id) }}" >
                                @csrf
                                @method('PUT')
                                @if ($order['delivered']== 1)
                                    <div>
                                        <button type="submit"  class="btn  btn-success"><i class="fa-solid fa-check fa-xs"></i></button>
                                    </div>
                                @else
                                    <div>
                                        <button type="submit"  class="btn  btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                @endif
                            </form>
                        </td>
                        <td><div>
                            <a href="{{ route('admin.order.show', $order->id) }}"
                                class="btn btn-primary text-black"><i class="fas fa-eye"></i></a>
                        </div></td>

                    </tr>

                        
                    @empty
                    <div class="mb-4">
                        <div class="d-inline-block alert alert-success">
                            Non hai nessun ordine 
                        </div>
                    </div>
                        
                    @endforelse
                </tbody>
</div>
@endsection