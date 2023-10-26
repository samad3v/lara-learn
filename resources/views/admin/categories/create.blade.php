@extends('layouts.base-admin')

@section('admin-content')
<form action="{{ route('admin.categories.store') }}" method="Post">
    @csrf
    <input type="text" name="title" id="title" value="Title" class="text-center">
    <input type="submit" value="Save">
</form>
@endsection
