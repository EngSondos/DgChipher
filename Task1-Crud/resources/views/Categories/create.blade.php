@extends('layout.parent')
@section('title','Create Category')
@section('content')
@include('Compenent.message')
<div class="col-6 offset-3 text-primary text-center mt-5 h1">
    Create  Category
</div>
<div class="col-6 offset-3">
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name"  placeholder="Name" >
        </div>
        @error('name')
        <p class="text-danger font-weight-bold">* {{$message}}</p>
    @enderror
    <button class="btn btn-primary w-100">Submit</button>

    </form>
</div>

@endsection
