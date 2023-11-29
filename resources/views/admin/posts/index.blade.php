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
            <th scope="col">Category</th>
            <th scope="col">Change Status</th>
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
            <td>{{ $post->category->title }}</td>
            <td>
                <form action="{{ route('admin.post.changeStatus', ['post' => $post]) }}" method="post">
                        @csrf
                        @method('patch')
                        @if($post->status == 'pending')
                            <input type="hidden" value="publish" name="new_status">
                            <input type="submit" class="card-link btn btn-primary" value="Publish">
                        @else
                            <input type="hidden" value="pending" name="new_status">
                            <input type="submit" class="card-link btn btn-primary" value="Pending">
                        @endif
                    </form>
                </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-info mr-2">Edit</a>
                    <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger mr-4" value="Delete">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
