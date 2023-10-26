@extends('layouts.base-admin')

@section('admin-content')
<form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post">
    @method('put')
    @csrf
    <div class="row">
        <div class="col-md-9">
            <input type="text" value="{{ old('title', $category->title) }}" class="form-control" id="EG" placeholder="{{ old('title', $category->title) }}" name="title">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </div>
</form>
@endsection
