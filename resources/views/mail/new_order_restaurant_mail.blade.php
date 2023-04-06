<h1>Nuovo Ordine ricevuto da Deliveboo</h1>

<h3>Il seguente contatto:</h3>

<p>Nome: {{ $lead['name_client'] }}</p>
<p>Cognome: {{ $lead['surname_client'] }}</p>
<p>Email: {{ $lead['email_client'] }}</p>
<p>Cellulare: {{ $lead['phone_client'] }}</p>
<p>Indirizzo: {{ $lead['address_client'] }}</p>

<h3>ha ordinato i seguenti piatti:</h3>

@foreach ($lead['dishes'] as $item)
<ul>
    <li>
        <span>Piatto: {{ $item['dish']['name'] }}</span>
        <div>Quantità: {{ $item['quantity'] }}</div>
    </li>
</ul>
@endforeach

<a href="{{ url('http://127.0.0.1:8000/admin/order/' . $lead['order_id']) }}">link all'ordine</a>