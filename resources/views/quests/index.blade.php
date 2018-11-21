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
  <h1>Time Adventure Quests</h1>
  <hr>
  <a href="{{route('quests.create')}}"<button type="submit" class="btn btn-primary">Add Player</button></a>
  <br>
  <br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No.</td>
          <td>Quest</td>
          <td>Objective</td>
          <td>Level</td>
          <td>Reward</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
		@php $no = 1; @endphp
        @foreach($quests as $q)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$q->quest_name}}</td>
            <td>{{$q->quest_obj}}</td>
            <td>{{$q->quest_level}}</td>
            <td>{{$q->quest_reward}}</td>
            <td><a href="{{ route('quests.edit', $q->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('quests.destroy', $q->id)}}" method="post">
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