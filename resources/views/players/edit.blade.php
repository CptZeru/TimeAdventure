@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Player
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('players.update', $player->id) }}">
	  @method('PATCH')
	  @csrf
          <div class="form-group">
              @csrf
              <label for="name">Characters Name:</label>
              <input type="text" class="form-control" name="char_name" value="{{$player->player_name}}" />
          </div>
          <div class="form-group">
              <label for="price">Characters Role :</label>
              <input type="text" class="form-control" name="char_role" value="{{$player->player_role}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Characters Clan:</label>
              <input type="text" class="form-control" name="char_clan" value="{{$player->player_clan}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection