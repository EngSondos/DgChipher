@extends('layout.parent')
@section('title','Update Articale')
@section('content')
<div class="col-6 offset-3 text-primary text-center mt-5 h1">
    Create Articale
</div>
<div class="col-6 offset-3 mt-5">
    <form action="{{route('articale.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Image</label>
            <input type="file" name="image" id="file">
        </div>
        @error('image')
        <p class="text-danger font-weight-bold">* {{$message}}</p>
    @enderror
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title"  placeholder="Title" >
        </div>
        @error('title')
        <p class="text-danger font-weight-bold">* {{$message}}</p>
    @enderror
        <div class="form-group">
            <label for="description">Description</label>
           <textarea cols="30" rows="10"  type="text" class="form-control" name="description" id="description"  placeholder="Description"></textarea>
          </div>
          @error('description')
          <p class="text-danger font-weight-bold"> *{{$message}}</p>
          @enderror
          <div class="form-group">
            <label for="Category">Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
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
