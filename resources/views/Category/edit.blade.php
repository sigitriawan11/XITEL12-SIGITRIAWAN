@extends('partials.main')

@section('slot')
    <div class="d-flex justify-content-center">
        <div class="shadow p-5 mb-5 bg-body rounded border border-primary">
            <form action="/categories/{{ $category->slug }}" method="post">
                @csrf
                @method('put')
                <h3 class="text-center mb-2">Edit Kategori</h3>
                <h4 class="text-center mb-5">{{ $category->name }}</h4>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Nama Kategori">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning mt-2">Edit</button>
            </form>


        </div>
    </div>
@endsection
