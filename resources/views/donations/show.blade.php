@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        
        <h3>
            Donations data
        </h3>
        <a href="{{ route('create') }}" class="ml-auto mb-3 btn btn-primary text-white btn-sm">
            {{ __('Add') }}
        </a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">user_id</th>
      <th scope="col">category</th>
      <th scope="col">city</th>
      <th scope="col">state</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
      @foreach($users as $data)
    <tr>
      <th scope="row">{{ $data->id }}</th>
      <td>{{ $data->user_id }}</td>
      <td>
          @if($data->category != '')
            {{ $data->category->product_name }}
          @endif
      </td>
      <td>{{ $data->city }}</td>
      <td>{{ $data->state }}</td>
    
    </tr>
   @endforeach
  </tbody>
</table>
    </div>
</div>

@endsection