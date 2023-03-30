@extends('partials.main')

@section('slot')

    <h3>Data Kategori Terhapus</h3>
    <div class="my-3">
        <a href="/categories" class="btn btn-primary">Kembali</a>
    </div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-striped shadow-sm" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Dihapus Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <form action="/categories-deleted/{{ $category->slug }}" method="post" class="d-inline p-0">
                            @csrf
                            <button class="btn-sm btn-success">Backup Data</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
