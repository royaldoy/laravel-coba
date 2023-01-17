@extends('layout/main')

@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $post->title }}</h1>
            <p>Ditulis oleh <a href="/?author={{ $post->user->username }}"> {{ $post->user->name }} </a> Dalam <a href="/?category={{ $post->category->slug  }} "> {{ $post->category->name  }}</a> </p>
            @if($post->image)
            <div style="max-height: 400px ; overflow: hidden ;">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="...">
            </div>

            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="...">
            @endif
            <article class="my-3 fs-5">

                {!! $post->body !!}
            </article>

            <a href="/">Back</a>
        </div>
    </div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection