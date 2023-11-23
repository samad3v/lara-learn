@extends('layouts.base-admin')

@section('admin-content')
    <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
        <div class="row align-items-end">
            @method('put')
            @csrf
            <div class="form-group col-md-6 mb-3">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}" required autocomplete="title" autofocus>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"  name="image">
                    <label class="custom-file-label" for="file">Choose Image...</label>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="form-group col-md-6 mb-3">
                <label class="my-1 mr-2" for="status">Status</label>
                <select class="custom-select my-1 mr-sm-2" id="status" name="status" required>
                    <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Draft</option>
                    <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Published</option>
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
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
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
            <label for="summery">Summery</label>
            <textarea class="form-control @error('summery') is-invalid @enderror" id="summery" rows="5" name="summery" required>{{ old('summery', $post->summery) }}</textarea>
            @error('summery')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="5" name="content" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
