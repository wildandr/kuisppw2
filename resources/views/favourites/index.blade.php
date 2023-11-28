{{-- Daftar buku favorit pengguna --}}

@foreach ($favouriteBooks as $book)
    <div>
        <h3>{{ $book->title }}</h3>
        {{-- Informasi lain tentang buku --}}
    </div>
@endforeach
