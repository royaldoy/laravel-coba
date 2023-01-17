@extends('dashboard.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
</div>

<div class="col-lg-8">

    <form method="post" action="/dashboard/users/{{ $users->id }}" class="mb-5">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ old('email', $users->email)}}" name="email" class="form-control   @error('email') is-invalid @enderror" id="email" autofocus required>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" value="{{ old('name', $users->name) }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" value="{{ old('username', $users->username) }}" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <!-- <input type="hidden" name="passwordlama" value="{{ $users->password }}" id=""> -->
            <input type="password" value="" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <small>left empty if dont wanna change password</small>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Level</label>
            <select class="form-select" name="is_admin">
                <option value="0" {{ old('is_admin', $users->is_admin) == 0 ? 'selected' : '' }}>User</option>
                <option value="1" {{ old('is_admin', $users->is_admin) == 1 ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>


@endsection