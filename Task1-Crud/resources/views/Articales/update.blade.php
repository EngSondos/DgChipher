@extends('layout.parent')
@section('title','Update Articale')
@section('content')
<div class="col-6 offset-3 text-primary text-center mt-5 h1">
    Update Articale
</div>
<div class="col-6 offset-3">
    <form action="{{route('articale.update',$articale)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="file">
                <img class="w-100" src="{{asset('images/articales/'.$articale->image)}}" alt="Upload" id="image" >
            </label>
            <input type="file" name="image" id="file" class="d-none" onchange="loadFile(event)">
        </div>
        @error('image')
        <p class="text-danger font-weight-bold">* {{$message}}</p>
    @enderror
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title"  placeholder="Title" value="{{$articale->title}}">
        </div>
        @error('title')
        <p class="text-danger font-weight-bold">* {{$message}}</p>
    @enderror
        <div class="form-group">
            <label for="description">Decription</label>
            <input type="text" class="form-control" name="description" id="description"  placeholder="Description" value="{{$articale->description}}">
          </div>
          @error('description')
          <p class="text-danger font-weight-bold"> *{{$message}}</p>
          @enderror
          <div class="form-group">
            <label for="Category">Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category )
                <option value="{{$category->id}}" @selected($category->id == $articale->category_id)>{{$category->name}}</option>
                @endforeach
            </select>
          </div>
          @error('category_id')
          <p class="text-danger font-weight-bold"> *{{$message}}</p>
          @enderror
          <button class="btn btn-primary w-100">Submit</button>

    </form>
</div>

@endsection
@section('js')
<script>
    var loadFile = function(event) {
      var output = document.getElementById('image');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
@endsection
