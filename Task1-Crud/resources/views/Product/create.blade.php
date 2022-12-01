@extends('layout.parent')
@section('title','Create Product')
@section('content')
<div class="col-6 offset-3 text-primary text-center mt-5 h1">
    Create Product
</div>
<div class="col-6 offset-3 mt-5">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">name</label>
          <input type="text" class="form-control" name="name" id="name"  placeholder="Name" >
        </div>
        @error('name')
        <p class="text-danger font-weight-bold">* {{$message}}</p>
    @enderror
    <div class="form-group">
        <label for="title">price</label>
        <input type="text" class="form-control" name="price" id="name"  placeholder="Price" >
      </div>
      @error('price')
      <p class="text-danger font-weight-bold">* {{$message}}</p>
  @enderror
        <div class="form-group">
            <label for="description">Description</label>
           <textarea cols="30" rows="10"  type="text" class="form-control" name="description" id="description"  placeholder="Description"></textarea>
          </div>
          <div class="form-group">
            <label for="title">Code</label>
            <input type="text" class="form-control" name="code" id="code"  placeholder="Code" >
          </div>
          @error('Code')
          <p class="text-danger font-weight-bold">* {{$message}}</p>
      @enderror
          @error('description')
          <p class="text-danger font-weight-bold"> *{{$message}}</p>
          @enderror


          <button class="btn btn-primary w-100">Submit</button>
    </form>
</div>

@endsection
