@extends('layouts.base-admin')

@section('admin-content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $comment->email }}</h6>
                <p class="card-text">{{ $comment->content }}</p>
                <div class="d-flex">
                    <form action="{{ route('admin.comment.changeStatus', ['comment' => $comment]) }}">
                        @csrf
                        @method('patch')
                        @if($comment->status == 'pending')
                            <input type="hidden" value="publish" name="new_status">
                            <input type="submit" class="card-link btn btn-primary" value="Publish">
                        @else
                            <input type="hidden" value="pending" name="new_status">
                            <input type="submit" class="card-link btn btn-primary" value="Pending">
                        @endif
                    </form>
                    <form action="{{ route('admin.comment.destroy', ['comment' => $comment]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="card-link btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
