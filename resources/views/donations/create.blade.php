@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-2">
            <form method="post" action="javascript:void(0)" class="submitForm">
            @csrf
                 <div class="form-group">                    
                     <input type="text" name="user_id" value="{{ Auth::id() }}" readonly="" class="form-control" id="exampleInputPassword1" name="product_name">
                 </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    
                    <select name="category_id" class="form-control">
                        @foreach($data as $row)
                        <option value="{{ $row->id }}">{{ $row->product_name }}</option>
                        @endforeach
                    </select>
                    
                 </div>
            <div class="form-group">   
                    <label for="exampleInputPassword1">City</label>
                     <input type="text" name="city"  class="form-control" id="city" name="City">
                 </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">State</label>
                     <input type="text" name="state"  class="form-control" id="exampleInputPassword1" name="State">
                 </div>
             
  
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection