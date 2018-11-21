@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Enemy
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
      <form method="post" action="{{ route('enemies.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Enemy's Name:</label>
              <input type="text" class="form-control" name="enemy_name"/>
          </div>
		  <div class="form-group">
              <label for="name">Enemy's Role:</label>
              <input type="text" class="form-control" name="enemy_role"/>
          </div>
          <div class="form-group">
              <label for="price">Enemy's Health Points :</label>
              <input type="number" class="form-control" name="enemy_hp"/>
          </div>
		  <div class="form-group">
              <label for="price">Enemy's Mana Points :</label>
              <input type="number" class="form-control" name="enemy_mp"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection