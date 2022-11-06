@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if ($book->image)
            
            <img src="{{ asset('storage/'.$book->image) }}" alt="{{ $book->category->name }}">
              
            @else
                <img src="https://source.unsplash.com/200x300?{{ $book->category->name }}" alt="{{ $book->category->name }}">
            @endif
        </div>
        <div class="col-md-6">
            <h2>{{ $book->title }}</h2>
            <h6>{{ $book->release }}</h6>
            <h5><a href="/buku?kategori={{ $book->category->slug }}">{{ $book->category->name }}</a> by {{ $book->author }}</h5>
            <p>Published by {{ $book->user->name }}</p>
            <p>{{ $book->description }}</p>
            <a href="#" class="btn btn-primary mt-4">Baca</a>
        </div>
    </div>
</div>

@endsection