@if ($averageRating)
    <h3>Rata-Rata Rating: {{ number_format($averageRating, 1) }}</h3>
@else
    <h3>Belum ada rating</h3>
@endif
