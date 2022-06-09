@extends('layouts.main')

@section('container')
    
    <h1>Kategori</h1>
    
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
            </a>
        
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="/buku">Semua</a></li>
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="/kategori/{{ $category->slug }}">{{ $category->name }}</a></li>
            @endforeach
            
            </ul>
        </div>
        
@endsection