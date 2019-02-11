@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-2">
            <form method="post" action="{{ route('store') }}">
            @csrf
                 <div class="form-group">
                    <label for="exampleInputPassword1">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="product_name">
                 </div>
  
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection