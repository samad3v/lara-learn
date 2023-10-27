@extends('layouts.base-admin')

@section('admin-content')
<div class="container">
    <div class="alert alert-success">
        <strong>warning!</strong>are you shure?
    </div>
    <div>
        <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="post">
            @method('delete')
            @csrf

            <button type="submit" class="btn btn-danger">delete</button>
        </form>
    </div>
</div>
@endsection