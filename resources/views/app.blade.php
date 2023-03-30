@extends('partials.main')

@section('slot')
    <h3>Home</h3>
    <div class="row mt-3 gap-3">
        <div class="col-12 col-md-5 col-lg-3 bg-success text-white p-3 rounded shadow-sm">
            <h5>Total Buku : {{ $data['books'] }}</h5>
        </div>
        <div class="col-12 col-md-5 col-lg-3  bg-primary text-white p-3 rounded shadow-sm">
            <h5>Total Buku Terhapus : {{ $data['deleted_books'] }}</h5>
        </div>
        <div class="col-12 col-md-5 col-lg-3  bg-info text-white p-3 rounded shadow-sm">
            <h5>Total Kategori : {{ $data['categories'] }}</h5>
        </div>
        <div class="col-12 col-md-5 col-lg-3  bg-warning text-white p-3 rounded shadow-sm">
            <h5>Total Kategori Terhapus : {{ $data['deleted_categories'] }}</h5>
        </div>
    </div>
@endsection
