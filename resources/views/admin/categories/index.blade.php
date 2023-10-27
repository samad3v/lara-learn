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
                    <div class="d-flex">
                        <a href="{{ route('admin.categories.edit' , ['category' => $category]) }}" class="btn btn-info mr-3">Edit</a>
                        <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="post"  onsubmit="deleteConfirm(event);">
                            @method('delete')
                            @csrf

                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    function deleteConfirm(event) {
        event.preventDefault();
        let result = confirm("آیا می خواهید آیتم حذف شود؟");
        if (result) {
            event.target.submit();
        }
    }
</script>
@endsection
