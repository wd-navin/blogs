@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        
        <h3>
            Category data
        </h3>
        <a href="{{ route('add') }}" class="ml-auto mb-3 btn btn-primary text-white btn-sm">
            {{ __('Add') }}
        </a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
    
    </tr>
  </thead>
  <tbody>
      @foreach($data as $row)
    <tr>
      <th scope="row">{{ $row->id }}</th>
      <td>{{ $row->product_name }}</td>
    
    </tr>
   @endforeach
  </tbody>
</table>
    </div>
</div>

@endsection