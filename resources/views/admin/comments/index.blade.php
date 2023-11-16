@extends('layouts.base-admin')

@section('admin-content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>post Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->post_id }}</td>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->status }}<td>
                    <div class="d-flex">
                        <a href="{{ route('admin.comment.show' , ['comment' => $comment]) }}" class="btn btn-info mr-3">Show Comment</a>
        @endforeach
    </tbody>
</table>
@endsection
