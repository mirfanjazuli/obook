@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Buku</h1>
  
</div>
<div class="col-lg-8">
  <form method="post" action="/dashboard/buku" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title') }}">
      @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Kategori</label>
      <select class="form-select" name="category_id">
        <option selected>Pilih kategori</option>
        @foreach ($categories as $category)
          @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="release" class="form-label">Tahun</label>
      <input type="text" class="form-control @error('release') is-invalid @enderror" id="release" name="release" value="{{ old('release') }}">
      @error('release')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Penulis</label>
      <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
      @error('author')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Gambar</label>
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
      @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="file" class="form-label">Buku</label>
      <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file">
      @error('file')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      @error('description')
          <p class="text-danger"{{ $message }}></p>
      @enderror
      <input id="description" type="hidden" name="description" value="{{ old('description') }}">
    <trix-editor input="description"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/buku/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault()
  })

</script>

@endsection