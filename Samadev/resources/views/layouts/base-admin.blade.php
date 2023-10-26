@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="list-group-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                    <li class="list-group-item">Categories</li>
                </ul>
            </div>
            <div class="col-md-8">
                @yield('admin-content')
            </div>
        </div>
    </div>
@endsection
