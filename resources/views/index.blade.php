@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($categories as $category )
                            <li class="list-group-item">{{ $category->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ url('uploads/' . $post->image) }}" alt="{{ $post->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text text-muted">
                                        {{ $post->summery ?? substr($post->content, 0, 20) }}
                                    </p>
                                    <a href="{{ route('post.show', ['post' => $post]) }}" class="btn btn-primary">Show post</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
