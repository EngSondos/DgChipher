@extends('layout.parent')
@section('title','Home')
@section('content')
@include('Compenent.message')
<div class="col-6 offset-3 mt-5 ">
    @foreach ($articales as $articale)
<div class="row">
  <div class="col-xs-1-12 mt-5">
    <div class="text-right mb-3">
        <form action="{{route('articale.destroy',$articale->id)}}" method="post">
            @method('delete')
            @csrf
            <button class="btn btn-danger">X</button>
        </form>
    </div>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title"> {{$articale->title}}</h3>
        <img src="{{asset('images\\articales\\') .$articale->image}}" class="img-fluid " alt="">
        <hr>

        <div class="h3 text-primary">Description</div>

        <p class="card-text">{{$articale->description}}</p>
        <hr>
        <div class="h4 text-primary">Category</div>

        <div class="h5">{{$articale->category->name}}</div>
        <div class="text-right">
            <form action="{{route('articale.edit',$articale->id)}}">
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
