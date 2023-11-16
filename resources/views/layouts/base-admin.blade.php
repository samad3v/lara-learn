@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="list-group-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                    <li class="list-group-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="list-group-item"><a href="{{ route('admin.comments.index') }}">Comments</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                @yield('admin-content')
            </div>
        </div>
    </div>
    @if (session()->has('status'))
        <div class="snack-bar">
            {{ session('status') }}
        </div>
    @endif
@endsection
