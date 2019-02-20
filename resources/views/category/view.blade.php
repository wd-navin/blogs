@extends('layouts.app')
@section('content')

<div class="container" style="background-color: #fff !important">
    <div class="row p-4">
        
        <h3>
            Category data
        </h3>
        <button class="ml-auto mb-3 btn btn-primary text-white btn-sm" id="CategoryAddData">
            {{ __('Add') }}
        </button>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Data</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody class="appenddata">
      @foreach($data as $row)
    <tr>
      <th scope="row">{{ $row->id }}</th>
      <td>{{ $row->product_name }}</td>
      <td>
          @if(!empty($row->freedata))
            {{ $row->freedata->name }}
          @endif
      </td>
       <td>
          <button  cat-id ="{{ $row->id }}" class="btn btn-primary btn-sm cat_delete">delete</button>
      </td>    
    </tr>
   @endforeach
   {{ $data->links() }}
  </tbody>
</table>
    </div>
</div>

@endsection