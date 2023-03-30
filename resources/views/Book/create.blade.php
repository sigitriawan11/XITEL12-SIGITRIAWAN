@extends('partials.main')

@section('slot')
    <div class="">
        <div class="shadow p-5 mb-5 bg-body rounded border border-primary">
            <form action="/books" method="post" enctype="multipart/form-data">
                @csrf
                <h3 class="text-center mb-5">Buat Buku Perpustakaan</h3>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control shadow-sm @error('image') is-invalid @enderror" name="image" type="file" id="formFile">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Judul</label>
                    <input type="text" value="{{ old('title') }}" name="title" value="{{ old('title') }}" class="form-control shadow-sm @error('title') is-invalid @enderror" placeholder="Judul">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Deskripsi</label>
                    <input type="text" value="{{ old('description') }}" name="description" class="form-control shadow-sm @error('description') is-invalid @enderror" placeholder="Deskripsi">
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Konten</label>
                    <textarea name="content" class="form-control shadow-sm @error('content') is-invalid @enderror" id="" cols="30" rows="5" placeholder="Konten Buku">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}" name="category_id">
                        <option selected>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>

                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Author</label>
                    <input type="text" value="{{ old('author') }}" name="author" class="form-control shadow-sm @error('author') is-invalid @enderror" placeholder="Judul">
                    @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Rilis</label>
                    <input type="date" value="{{ old('release') }}" name="release" class="form-control shadow-sm @error('release') is-invalid @enderror" placeholder="Judul">
                    @error('release')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
