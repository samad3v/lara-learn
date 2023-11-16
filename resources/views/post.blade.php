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
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ url('uploads/' . $post->image) }}" alt="{{ $post->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add a comment</h5>
                                <div class="card-text">
                                    <form method="post" action="{{ route('comment.add', ['post' => $post->id]) }}" >
                                        @csrf
                                        <input class="form-control mb-2" type="text" placeholder="name" id="name" name="name">
                                        <input class="form-control mb-2" type="email" placeholder="email" name="email">
                                        <textarea class="form-control mb-2" name="content" id="content" cols="30" rows="10"></textarea>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($post->comments as $comment)
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $comment->name }}</h5>
                                        <p class="card-text">{!! $comment->content !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
