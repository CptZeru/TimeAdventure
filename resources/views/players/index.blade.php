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
  <h1>Time Adventure Players</h1></br>
  <h2><?php echo"2018"; ?></h2>
  <hr>
  <a href="{{route('players.create')}}"<button type="submit" class="btn btn-primary">Add Player</button></a>
  <br>
  <br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No.</td>
          <td>Player Name</td>
          <td>Player Role</td>
          <td>Clan</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
		@php $no = 1; @endphp
        @foreach($players as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$p->player_name}}</td>
            <td>{{$p->player_role}}</td>
            <td>{{$p->player_clan}}</td>
            <td><a href="{{ route('players.edit',$p->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('players.destroy', $p->id)}}" method="post">
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