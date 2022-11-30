@extends('layout.parent')
@section('title','Registeration')
@section('content')
<form action="{{route('registerRequest')}}" method="post">
    @csrf
    <input type="text" name="name">
<input type="text" placeholder="Email" name="email">
<input type="text" placeholder='Password' name="password">
<select name="role_id" >
    @foreach ($roles as $role )
    <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
</select>
<button >submit</button>
</form>
@endsection
