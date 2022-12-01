@extends('layout.parent')
@section('title', 'Update Product')
@section('content')
    <div class="col-6 offset-3 text-primary text-center mt-5 h1">
        Update Product
    </div>
    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif
    <div class="col-6 offset-3">
        <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                    value="{{ $product->name }}">
            </div>
            @error('name')
                <p class="text-danger font-weight-bold">* {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{ $product->price }}">
            </div>
            @error('price')
                <p class="text-danger font-weight-bold">* {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Code"
                    value="{{ $product->code }}">
            </div>
            @error('Code')
                <p class="text-danger font-weight-bold">* {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="description">Description</label>
                <textarea cols="30" rows="10" type="text" class="form-control" name="description" id="description"
                    placeholder="Description">{{ $product->description }}</textarea>
            </div>
            @error('description')
                <p class="text-danger font-weight-bold"> *{{ $message }}</p>
            @enderror

            <button class="btn btn-primary w-100">Submit</button>

        </form>
    </div>


@endsection
