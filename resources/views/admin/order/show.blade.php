@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped w-100 table-hover">
                <thead>
                    <th>Immagine</th>
                    <th>Nome</th>
                    <th>Ingredienti</th>
                    <th>Prezzo</th>
                    <th>Descrizione</th>
                    <th>Visibilità</th>
                    <th>Vegano</th>
                    <th>Vegetariano</th>
                    <th>Quantità</th>
                </thead>
                    @foreach($order->dishes as $item)
                        <tr>
                            <td>
                                @if ($item->image_path != null)
                                    <img class="img-fluid " style="width: 10rem;"
                                        src="{{ asset('storage/' . $item->image_path) }}"
                                        alt="Immagine di copertina del piatto {{ $item->name }}">
                                @else
                                    <h2>Immagine non disponibile</h2>
                                @endif
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td class="text-break">{{ $item['ingredients'] }}</td>
                            <td class="text-nowrap">{{ $item['price'] }} €</td>
                            <td class="text-break">{{ $item['description'] }}</td>
                            <td>
                                @if ($item['visible'])
                                    <div class="grid-item"><i class="fa-solid fa-check"
                                            style="color: #008000;"></i></div>
                                @else
                                    <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i>
                                    </div>
                                @endif
                            </td>

                            {{-- * VEGANO --}}
                            <td>
                                @if ($item['vegan'] === null)
                                    <p>Non è Disponibile</p>
                                @elseif ($item['vegan'] == true)
                                    <div class="grid-item"><i class="fa-solid fa-check"
                                            style="color: #008000;"></i></div>
                                @elseif ($item['vegan'] == false)
                                    <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i>
                                    </div>
                                @endif
                            </td> 

                            {{-- * VEGETARIANO --}}
                            <td>
                                @if ($item['vegetarian'] === null)
                                    <p>Non è Disponibile</p>
                                @elseif ($item['vegetarian'] == true)
                                    <div class="grid-item"><i class="fa-solid fa-check"
                                            style="color: #008000;"></i></div>
                                @elseif ($item['vegetarian'] == false)
                                    <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="text-break">{{$item->pivot->quantity}}</td>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div> 
</div>
    
@endsection
