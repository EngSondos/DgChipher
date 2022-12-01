@extends('layout.parent')
@section('title','Update Articale')
@section('content')
<div class="col-6 offset-3">
    <div class="col-8 offset-3 text-primary text-center mt-5 h1">
        Update Category
    </div>
    <form action="{{route('category.update',$category->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name"  placeholder="Name" value="{{$category->name}}">
        </div>
        @error('name')
        <p class="text-danger font-weight-bold">* {{$message}}</p>
    @enderror

          <button class="btn btn-primary w-100">Submit</button>

    </form>
</div>

@endsection

