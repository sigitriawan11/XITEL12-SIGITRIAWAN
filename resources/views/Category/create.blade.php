@extends('partials.main')

@section('slot')
    <div class="d-flex justify-content-center">
        <div class="shadow p-5 mb-5 bg-body rounded border border-primary">
            <form action="/categories" method="post">
                @csrf
                <h3 class="text-center mb-5">Buat Kategori</h3>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="text" name="name" class="form-control" placeholder="Nama Kategori">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>


        </div>
    </div>
@endsection
