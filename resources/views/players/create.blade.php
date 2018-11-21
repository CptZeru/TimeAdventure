@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Player
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
      <form method="post" action="{{ route('players.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Character's Name:</label>
              <input type="text" class="form-control" name="char_name"/>
          </div>
          <div class="form-group">
              <label for="price">Character's Role :</label>
              <input type="text" class="form-control" name="char_role"/>
          </div>
          <div class="form-group">
              <label for="quantity">Character's Clan:</label>
              <input type="text" class="form-control" name="char_clan"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection