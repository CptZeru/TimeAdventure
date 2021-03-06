@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Item
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
      <form method="post" action="{{ route('generalshop.update', $item->id) }}">
	  @method('PATCH')
	  @csrf
          <div class="form-group">
              @csrf
              <label for="name">Item's Name:</label>
              <input type="text" class="form-control" name="item_name" value="{{$item->item_name}}" />
          </div>
          <div class="form-group">
              <label for="price">Item's Price :</label>
              <input type="text" class="form-control" name="item_price" value="{{$item->price}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection