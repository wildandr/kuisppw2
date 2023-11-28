{{-- Tombol Simpan ke Daftar Favorit --}}
@if (Auth::check())
    <button id="favouriteButton" data-book="{{ $book->id }}">Simpan ke Daftar Favorit</button>
@endif

{{-- Script JavaScript untuk interaksi tombol --}}
<script>
    document.getElementById('favouriteButton').addEventListener('click', function() {
        var bookId = this.getAttribute('data-book');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/book/${bookId}/favourite`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ book_id: bookId })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Tampilkan notifikasi atau perbarui UI setelah buku berhasil ditambahkan ke favorit
        })
        .catch(error => console.error('Error:', error));
    });
</script>


{{-- Cek apakah pengguna telah login --}}
@if (Auth::check())
    <form id="ratingForm">
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <label for="rating">Rating:</label>
        <select name="rating" id="rating">
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <button type="submit">Submit Rating</button>
    </form>
@endif

{{-- JavaScript untuk menangani pengiriman formulir --}}
<script>
    document.getElementById('ratingForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var bookId = this.book_id.value;
        var rating = this.rating.value;

        fetch(`/book/${bookId}/rate`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ rating: rating })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Menambahkan logika untuk memperbarui UI setelah rating berhasil
        })
        .catch(error => console.error('Error:', error));
    });
</script>
