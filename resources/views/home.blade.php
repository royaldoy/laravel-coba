@extends('layout/main')

@section('container')

<h2 class="text-center mb-3"> {{ $title }}</h2>

<div class="row mb-3 justify-content-center">
    <div class="col-md-6">
        <form action="/" method="get">
            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" name="search" value=" {{ request('search') }}" class="form-control" placeholder="Search">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if($post->count())
<div class="card mb-3">
    @if($post[0]->image)
    <div style="max-height: 400px ; overflow: hidden ;">
        <img src="{{ asset('storage/' . $post[0]->image) }}" class="img-fluid" alt="...">
    </div>

    @else
    <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="img-fluid" alt="...">
    @endif
    <div class="card-body">
        <h3 class="card-title">{{ $post[0]->title }}</h3>
        <small class=" text-muted">
            <p>Ditulis oleh <a class="text-decoration-none" href="/?author={{ $post[0]->user->username }}"> {{ $post[0]->user->name }} </a> Dalam <a class="text-decoration-none" href="/?category={{ $post[0]->category->slug  }} "> {{ $post[0]->category->name  }}</a> {{ $post[0]->created_at->diffForHumans() }} </p>
        </small>
        <p class="card-text">{{ $post[0]->excerpt }}</p>
        <a class="btn btn-primary" href="/buku/{{ $post[0]->slug }}">Baca Disini</a>

    </div>
</div>


<div class="container">
    <div class="row">
        @foreach($post->skip(1) as $p)
        <div class="col-md-4 mb-3">
            <div class="card" style="">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7) ;"><a class="text-white text-decoration-none" href="/?author={{ $p->user->username }}"> {{ $p->category->name  }} </a> </div>
                @if($p->image)
                <div style="max-height: 500px ; overflow: hidden ;">
                    <img src="{{ asset('storage/' . $p->image) }}" class="img-fluid" alt="...">
                </div>

                @else
                <img src="https://source.unsplash.com/500x400?{{ $p->category->name }}" class="img-fluid" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $p->title }}</h5>
                    <p>Ditulis oleh <a class="text-decoration-none" href="/?author={{ $p->user->username }}"> {{ $p->user->name }} </a> Dalam <a class="text-decoration-none" href="/?category={{ $p->category->slug  }} "> {{ $p->category->name  }}</a> </p>
                    <p class="card-text">{{ $p->excerpt }}</p>
                    <a class="btn btn-primary" href="/buku/{{ $p->slug}}">Baca Disini</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center fs-4">No Post Found.</p>
@endif
<div class="d-flex justify-content-center">

    {{ $post->links() }}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection