@extends('partials.main')

@section('slot')

    <h3>Data Kategori</h3>
    <div class="my-3">
        <a href="/categories/create" class="btn btn-success">Tambah Data</a>
        <a href="/categories-deleted" class="btn btn-danger">Data Terhapus</a>
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
                    <th>Nama</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <button  class="btn-sm btn-warning"><a class=" text-decoration-none text-white" href="/categories/{{ $category->slug }}/edit">Edit</a></button>
                        <form action="/categories/{{ $category->slug }}" method="post" class="d-inline p-0">
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
