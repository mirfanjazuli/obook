@extends('layouts.main')

@section('container')

    <h3 class="mb-3">{{ $title }}</h3>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/buku">
                @if (request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" name="cari" value="{{ request('cari') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                  </div>
            </form>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="row">
            @foreach($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <a href="/buku?kategori={{ $book->category->slug }}">
                        <div class="position-absolute px-3 py-2">{{ $book->category->name }}</div>
                    </a>
                    <a href="/buku/{{ $book->slug }}">
                        @if ($book->image)
            
                        <img src="{{ asset('storage/'.$book->image) }}" alt="{{ $book->category->name }}" class="card-img-top" alt="{ $book->category->name }}">
                        
                        @else
                        <img src="https://source.unsplash.com/200x300?{{ $book->category->name }}" class="card-img-top" alt="{{ $book->category->name }}">
                        @endif
                        
                    </a>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- @else
        <p class="text-center fs-4">Buku tidak ada!</p>
    @endif --}}

    {{ $books->links() }}
    
@endsection