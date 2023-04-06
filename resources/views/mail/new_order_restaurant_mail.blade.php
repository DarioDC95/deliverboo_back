<h1>Nuovo Ordine ricevuto da Deliveboo</h1>

<h4>Il seguente contatto:</h4>

<p>{{ $lead['name_client'] }}</p>
<p>{{ $lead['surname_client'] }}</p>
<p>{{ $lead['email_client'] }}</p>
<p>{{ $lead['phone_client'] }}</p>
<p>{{ $lead['address_client'] }}</p>

<h5>I piatti che ti sono stati ordinati:</h5>

@foreach ($lead['dishes'] as $item)
    <p>{{ $item['dish']['name'] }}</p>
@endforeach

<a href="{{ url('http://127.0.0.1:8000/admin/order/' . $lead['order_id']) }}">link al piatto</a>