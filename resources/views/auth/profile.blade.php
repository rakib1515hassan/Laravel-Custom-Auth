@extends('base')


@section('content')
    <div class="container mt-4">
        <h1>Welcome to your Dashboard!</h1>
        <h4 class="mt-3 mb-2">Profile Info</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
