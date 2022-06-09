@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buku Saya</h1>

  </div>

  @if (session()->has('sukses'))
      <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
      </div>
  @endif
  <div class="table-responsive">
    <a href="/dashboard/buku/create" class="badge bg-info"><span data-feather="plus-circle"></span></a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">File</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($books as $book)   
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->category->name }}</td>
            <td>{{ $book->file }}</td>
            <td>
                {{-- <a href="/dashboard/buku/{{ $book->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                <a href="/dashboard/buku/{{ $book->id }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                
                <form action="/dashboard/buku/{{ $book->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Apakah yakin ingin menghapus?')"><span data-feather="x-circle"></button>
                </form>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection