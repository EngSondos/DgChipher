@extends('layout.parent')
@section('title','Home')
@section('content')
@include('Compenent.message')
<div class="col-6 offset-3 mt-5">
    <div class="col-6 offset-3 text-primary text-center mt-5 h1">
        Categories
    </div>

<table class="table">
    <thead>
        <tr>
            <th>Category Id</th>
            <th>Category Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category )
        <tr>
            <td scope="row">{{$category->id}}</td>
            <td>{{$category->name}}</td>

            <td><form action="{{route('category.edit',$category->id)}}"> @csrf <button class="btn btn-primary">Edit</button></form></td>
            <td><form action="{{route('category.destroy',$category->id)}}" method="post">@csrf @method('delete')<button class="btn btn-danger">Delete</button></form></td>

        </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection
