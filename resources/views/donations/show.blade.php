@extends('layouts.app')
@section('content')

<div class="container" style="background-color: #fff !important">
    <div class="row p-4">
        <h3>
            Donations data
        </h3>
        <button class="ml-auto mb-3 btn btn-primary text-white btn-sm" id="donationModal">
            {{ __('Add') }}
        </button>
        <table class="table" id="dta">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">category</th>
                    <th scope="col">city</th>
                    <th scope="col">state</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody class="append">
                @foreach($users as $data)
                <tr id="{{ $data->id }}">
                    <th scope="row" class="CheckId" >{{ $data->id }}</th>
                    <td id="cat-id">
                        @if($data->category != '')         
                        {{ $data->category->product_name }}
                        @endif
                    </td>
                    <td id="city-id">{{ $data->city }}</td>
                    <td id="state-id">{{ $data->state }}</td>

                    <td class="appendImges">
                        @if(!empty($data->images))
                        @foreach($data->images as $img) 
                        <div>
                            <img src="{{ asset($img->image) }}" width="50"></br>
                            <button img_id ="{{ $img->id }}" class="deleteImage btn btn-danger btn-sm" >delete</button>
                        </div>
                        @endforeach
                        @else
                        <img src="{{ asset('/images/IMG_20170825_101424.jpg') }}"  width="50">
                        @endif
                    </td>
                    <td>
                        <button class="deleteRecord btn btn-danger btn-sm" data-id="{{ $data->id }}" >Delete </button>
                        <button class="btn btn-danger btn-sm editrecord" edit-data-id = "{{ $data->id }}">Edit</button>
                    </td>
                </tr>
                @endforeach
                {{ $users->links() }}
            </tbody>
        </table>
        
        
    </div>
</div>
<div class="container">
            <h3 class="h3">Donation</h3>
            <div class="row cardappend">                
                @foreach($users as $data)
                <div class="col-md-3  col-sm-6">
                 <div class="product-grid">
                        <div class="product-image">
                            @if(!empty($data->images))
                            @foreach($data->images as $image)
                            <img src='{{ asset( $image->image) }}' width="50">
                            @endforeach
                            @endif
                        </div>
                          <div class="product-content">
                            <h3 class="title"><a href="#" style="color: #000">
                                    @if($data->category != '')         
                                    {{ $data->category->product_name }}
                                    @endif
                                </a></h3>
                            <div class="price">
                                <p>{{ $data->city }}</p>
                            </div>
                            <div class="price">
                                <p>{{ $data->state }}</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>



@endsection