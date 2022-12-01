@extends('layout.parent')
@section('title','Registration')
@section('content')
<div class= 'col-6 offset-3 text-center text-primary h1 mt-3'>
Sign Up
</div>
<div class= 'col-6 offset-3'>

<form action="{{route('loginRequest')}}" method="post">
    @csrf
    <input type="text" placeholder="Name" name="name"  class="mt-5 form-control">
@error('name')
<p class="text-danger font-weight-bold"> *{{$message}}</p>

@enderror
<input type="text" placeholder="Email" name="email"  class="mt-5 form-control">
@error('email')
<p class="text-danger font-weight-bold"> *{{$message}}</p>

@enderror
<input type="text" placeholder='Password' name="password" class="mt-5 form-control">
@error('password')
<p class="text-danger font-weight-bold"> *{{$message}}</p>

@enderror
<select name="role_id" class="mt-5 form-control">
    @foreach ($roles as $role )
    <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
</select>
<button class ='btn btn-primary w-100'>submit</button>
</form>
</div>

@endsection
