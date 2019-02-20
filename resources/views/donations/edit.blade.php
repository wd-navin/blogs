@extends('layouts.app')
@section('content')

<div class="container p-4" style="background-color: #fff !important">
    <div class="row">

        <div class="col-md-6 offset-2">
            <h3 class="mb-4">
                Edit donation data
            </h3>
            <form method="post" action="{{ route('update') }}"  enctype="multipart/form-data">
                @csrf  
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-group">
                    <input type="text" readonly="" name="id" value="{{ $data->id }}">
                </div>
                <div class="form-group">                    
                    <input type="text" name="user_id" value="{{ Auth::id() }}" readonly="" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>

                    <select name="category_id" class="form-control">
                        @foreach( $cat as $row )
                        <option value="{{ $row->id }}" @if($row->id == $data->category_id) selected @endif> {{ $row->product_name }} </option>
                        @endforeach
                    </select>
                  
                </div>
                <div class="form-group">   
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" name="city" value="{{ $data->city }}" class="form-control" id="city" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">State</label>
                    <input type="text" name="state" value="{{ $data->state }}"  class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">image</label>
                    <input type="file" name="image[]" multiple=""  class="form-control" id="exampleInputPassword1" >
                    
                    @if($data->images != '')
                    @foreach($data->images as $image)
                    <img src="{{ $image->image }}" width="50">
                    <input type="text" readonly="" name="image_id" value="{{ $image->id }}">
                    @endforeach
                    
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection