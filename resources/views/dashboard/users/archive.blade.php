@extends('dashboard.layout.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="table-responsive col-lg-6">
    <a href="/dashboard/users/" class="btn btn-primary mb-3">Back</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ ($user->is_admin == true )  ? 'Admin' : 'User' }}</td>
                <td>
                    <!-- <a href="/dashboard/users/{{ $user->username }}" class="btn btn-info"><span data-feather="eye" class="align-text-bottom"></span></a> -->
                    <form action="/dashboard/users/{{ $user->id }}/lost" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="trash" class="align-text-bottom"></span></button>

                    </form>
                    <form action="/dashboard/users/{{ $user->id }}/restore" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning"><span data-feather="triangle" class="align-text-bottom"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>
@endsection