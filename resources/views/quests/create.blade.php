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
      <form method="post" action="{{ route('quests.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Quest's Name :</label>
              <input type="text" class="form-control" name="quest_name" />
          </div>
          <div class="form-group">
              <label for="price">Quest's Objective :</label>
              <input type="text" class="form-control" name="quest_obj" />
          </div>
          <div class="form-group">
              <label for="quantity">Quest's Level :</label>
              <input type="text" class="form-control" name="quest_level"/>
          </div>
		  <div class="form-group">
              <label for="quantity">Quest's Reward :</label>
              <input type="text" class="form-control" name="quest_reward"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection