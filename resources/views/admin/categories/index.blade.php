@extends('layouts.base-admin')

@section('admin-content')
<a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">+ Create Category</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)    
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit' , ['category' => $category]) }}" class="btn btn-info mr-3">Edit</a>
                    <a href="" class="btn btn-danger ml-3">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection