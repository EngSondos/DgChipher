@extends('layout.parent')
@section('title','Login')
@section('content')
<form action="{{route('loginRequest')}}" method="post">
    @csrf
<input type="text" placeholder="Email" name="email">
@error('email')
<p class="text-danger font-weight-bold"> *{{$message}}</p>

@enderror
<input type="text" placeholder='Password' name="password">
@error('password')
<p class="text-danger font-weight-bold"> *{{$message}}</p>

@enderror
<select name="role_id">
    @foreach ($roles as $role )
    <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
</select>
<button >submit</button>
</form>
<a href="{{route('register')}}">Register</a>
@endsection
