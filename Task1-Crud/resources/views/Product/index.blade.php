@extends('layout.parent')
@section('title','Home')
@section('content')
@include('Compenent.message')
<div class="col-6 offset-3 mt-5 ">
    @foreach ($products as $product)
<div class="row">
  <div class="col-xs-1-12 mt-5">
    <div class="text-right mb-3">
        <form action="{{route('product.destroy',$product->id)}}" method="post">
            @method('delete')
            @csrf
            <button class="btn btn-danger">X</button>
        </form>
    </div>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title"> {{$product->name}}</h3>
        <hr>

        <div class="h3 text-primary">Description</div>

        <p class="card-text">{{$product->description}}</p>
        <hr>

        <div class="h3 text-primary">Price</div>

        <p class="card-text">{{$product->price }}$</p>
        <hr>
        <div class="text-right">
            <form action="{{route('product.edit',$product)}}">
                <button class="btn btn-primary">Edit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
@endsection
