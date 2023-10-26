@extends('layouts.base-admin')

@section('admin-content')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-3">+ Create Post</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Publish Date</th>
            <th scope="col">Status</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->author->name }}</td>
            <td>{{ \Carbon\Carbon::parse($post->published_at)->format('Y/m/d - H:i') }}</td>
            <td>{{ $post->status ? 'Published' : 'Draft' }}</td>
            <td>@mdo</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
