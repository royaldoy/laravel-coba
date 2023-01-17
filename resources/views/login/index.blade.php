@extends('layout.main')
@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dimissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dimissible fade show" role="alert">
            {{ session('loginError') }}
        </div>
        @endif


        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->

            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" value=" {{ old('email') }} " name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required>
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>


                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

            </form>
            <smal class="d-block text-center">Not Registered? <a href="/register">Register Now!</a></small>
        </main>
    </div>
</div>



@endsection