@extends('partials.main')

@section('slot')

    <h3>Data Buku Perpustakaan</h3>
    <div class="my-3">
        <a href="/books/create" class="btn btn-success">Tambah Data</a>
        <a href="/books-deleted" class="btn btn-danger">Data Terhapus</a>
    </div>
    @if (session('flash'))
    <div class="alert alert-success" style="width: fit-content;" role="alert">
        {{ session('flash') }}
      </div>
    @endif
    <div class="table-responsive">
        <table id="dataTable" class="table table-striped shadow-sm" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Pemilik</th>
                    <th>Rilis Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $book->image) }}" class="img-thumbnail" width="100px" height="100px" alt="">
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->release }}</td>
                    <td>
                        <button  class="btn-sm btn-warning"><a class=" text-decoration-none text-white" href="/books/{{ $book->slug }}/edit">Edit</a></button>
                        <form action="/books/{{ $book->slug }}" method="post" class="d-inline p-0">
                            @csrf
                            @method('delete')
                            <button class="btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
