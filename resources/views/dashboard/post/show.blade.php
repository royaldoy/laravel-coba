@extends('dashboard.layout.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>
</div>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/post/" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all post</a>
            <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span> Edit</a>
            <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="trash" class="align-text-bottom"></span> Delete</button>

            </form>
            <h1>{{ $post->title }}</h1>
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

        </div>
    </div>
</div>
@endsection