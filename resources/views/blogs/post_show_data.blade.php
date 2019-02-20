@extends('layouts.app')
@section('content')
<div class="container" style="background-color: #fff !important">
    <div class="row p-4">
         <h3>
            Donations data
        </h3>
        <a href="{{ route('post') }}" class="ml-auto mb-3 btn btn-primary text-white btn-sm">
            {{ __('Add') }}
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User_id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->user_id }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->description }}</td>
                    <td>
                        <a  href="{{ route('delete', $row->id) }}" class="btn btn-primary btn-sm text-white delete">
                            {{ __('delete') }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection