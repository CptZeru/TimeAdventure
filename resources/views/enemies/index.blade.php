@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Time Adventure's Enemy</h1>
  <hr>
  <a href="{{route('enemies.create')}}"<button type="submit" class="btn btn-primary">Add Enemy</button></a>
  <br>
  <br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No.</td>
          <td>Name</td>
          <td>Role</td>
          <td>HP</td>
          <td>MP</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
		@php $no = 1; @endphp
        @foreach($enemies as $e)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$e->enemy_name}}</td>
            <td>{{$e->enemy_role}}</td>
            <td>{{$e->enemy_hp}}</td>
            <td>{{$e->enemy_mp}}</td>
            <td><a href="{{ route('enemies.edit',$e->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('enemies.destroy', $e->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection