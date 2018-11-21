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
  <h1>Time Adventure's General Shop</h1>
  <hr>
  <a href="{{route('generalshop.create')}}"<button type="submit" class="btn btn-primary">Add Item</button></a>
  <br>
  <br>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No.</td>
          <td>Items</td>
          <td>Price</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
		@php $no = 1; @endphp
        @foreach($items as $i)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$i->item_name}}</td>
            <td>{{$i->price}}</td>
            <td><a href="{{ route('generalshop.edit',$i->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('generalshop.destroy', $i->id)}}" method="post">
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