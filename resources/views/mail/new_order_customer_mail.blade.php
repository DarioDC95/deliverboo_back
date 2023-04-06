<?php

$totale = null;

foreach ($lead as $restaurant) {
    foreach ($restaurant as $dish) {
        $totale += number_format(($dish['dish']['price'] * $dish['quantity']), 2, '.', '');
    }
}

?>

<h1>Congratulazioni per il tuo ordine!</h1>

<h3>di seguito il tuo riepilogo:</h3>

@foreach ($lead as $restaurant)
    <h4>Ristorante: {{ $restaurant[0]['dish']['restaurant']['user']['name'] }}</h4>
    @foreach ($restaurant as $dish)
    <ul>
        <li>
            <span>Piatto: {{ $dish['dish']['name'] }}</span>
            <div>Quantità: {{ $dish['quantity'] }}</div>
        </li>
    </ul>
    @endforeach
@endforeach

<h3>Questo è il tuo prezzo totale pagato: <?php echo $totale ?> €</h3>

