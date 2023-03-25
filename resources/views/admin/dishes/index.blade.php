@extends('layouts.admin')
@section('content')
	<div class="text-white py-5">
		<div class="d-flex justify-content-between align-items-center">
			<h1>PIATTI</h1>
			<a href="{{route('admin.dishes.create')}}" class="btn btn-success">
				<i class="fa-solid fa-square-plus fa-lg fa-fw"></i> Aggiungi nuovo piatto
			</a>
		</div>

		@if ($dishes->isEmpty())
		<div class="d-flex align-items-center justify-content-center">
			<div class="alert border border white text-center m-0" role="alert">
				nessun piatto, <a href="{{route('admin.dishes.create') }}">clicca qui</a> per aggiungerne uno
			</div>
		</div>
		
		@else
			<div class="dishes-table">
				
				<div class="t-head grid-container fw-bold py-4 px-3">
					<div class="grid-item g-col-2">Nome</div>
					<div class="grid-item g-col-2">Ingredienti</div>
					<div class="grid-item g-col-2">Prezzo</div>
					<div class="grid-item g-col-2">Visibilità</div>
                    <div class="grid-item g-col-2">Disponibilità</div>
                    <div class="grid-item g-col-2">Descrizione</div>
				</div>

				
				<div class="t-body">
					@foreach ($dishes as $item)	
						<div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
							<div class="grid-item">{{$item['name']}}</div>
							<div class="grid-item">{{$item['ingredients']}}</div>
							<div class="grid-item">{{$item['price']}}</div>
                            @if($item['visible'])
                                <div class="grid-item"><i class="fa-solid fa-check" style="color: #008000;"></i></div>
                            @else
                                <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i></div>
                            @endif
                            @if($item['availability'])
                                <div class="grid-item"><i class="fa-solid fa-check" style="color: #008000;"></i></div>
                            @else
                                <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i></div>
                            @endif
                            <div class="grid-item">{{$item['description']}}</div>
							<div class="grid-item d-flex gap-3">
								<a href="{{ route('admin.dishes.edit', $item) }}" class="text-white"><i class="fa-solid fa-pen-to-square"></i></a>
								<a href="{{ route('admin.dishes.show', $item->id) }}" class="text-white"><i class="fa-solid fa-eye"></i></a>
								 <form class="d-inline-block" action="{{route('admin.dishes.destroy', $item->id)}}" method="POST">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm text-white p-0 confirm-delete" data-title="{{ $item->name }}" data-title="{{ $item->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal" type="submit" title="Cancella dishes">
										<i class="fa-solid fa-dumpster-fire"></i>
									</button>
								</form> 
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	</div>


@endsection