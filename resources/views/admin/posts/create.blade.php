@extends('layouts.base-admin')

@section('admin-content')
    @if(count($categories) < 1)
       You must Create a Category first!
    @else
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row align-items-end">
            @csrf
            <div class="form-group col-md-6 mb-3">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <div class="custom-file">
                    <label class="custom-file-label" for="file">Choose Image...</label>
                    <input type="file" class="custom-file-input" id="image"  name="image" required>
                    <label class="custom-file-label" for="file">Choose Image...</label>
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="form-group col-md-6 mb-3">
                <label class="my-1 mr-2" for="status">Status</label>
                <select class="custom-select my-1 mr-sm-2" id="status" name="status" required>
                    <option value="0">Draft</option>
                    <option value="1">Published</option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label class="my-1 mr-2" for="category_id">Category</label>
                <select class="custom-select my-1 mr-sm-2" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" rows="5" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endif
@endsection
