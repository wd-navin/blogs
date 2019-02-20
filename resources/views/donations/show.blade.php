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
                    <th scope="col">user_id</th>
                    <th scope="col">category</th>
                    <th scope="col">city</th>
                    <th scope="col">state</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody class="append">
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

                    <td>
                        @if(!empty($data->images))
                        @foreach($data->images as $img)                        
                        <img src="{{ asset($img->image) }}" width="50">
                        @endforeach
                         @else
                        <img src="{{ asset('/images/IMG_20170825_101424.jpg') }}" width="50">
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

@endsection