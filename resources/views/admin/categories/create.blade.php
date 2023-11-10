@extends('layouts.base-admin')

@section('admin-content')
<form action="{{ route('admin.categories.store') }}" method="Post">
    @csrf
    <input type="text" name="title" id="title"  placeholder="title" class="text-center">
    <input class="btn btn-success" type="submit" value="Save">
</form>
@endsection
