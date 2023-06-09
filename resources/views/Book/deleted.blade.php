@extends('partials.main')

@section('slot')

    <h3>Data Buku Terhapus</h3>
    <div class="my-3">
        <a href="/books" class="btn btn-primary">Kembali</a>
    </div>
    @if (session('flash'))
    <div class="alert alert-danger" style="width: fit-content;" role="alert">
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
                <td>
                    <img src="{{ asset('storage/' . $book->image) }}" class="img-thumbnail" width="100px" height="100px" alt="">
                </td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->release }}</td>
                <td>
                    <form action="/books-deleted/{{ $book->slug }}" method="post" class="d-inline p-0">
                        @csrf
                        <button class="btn-sm btn-success">Backup Data</button>
                    </form>
                </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
