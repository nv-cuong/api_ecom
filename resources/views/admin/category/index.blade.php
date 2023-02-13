@extends('admin.layout')
@section('page_title', 'Category')
@section('category_select')
@section('container')
    {{ session('success') }}
    <h1 class="mb10">Category</h1>
    <a href="{{ route('category.create') }}"><button type="button" class="btn btn-success">Add Category</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_slug }}</td>
                                <td>
                                    @if ($category->status == 1)
                                        <a href="{{ route('category.status', [0, $category->id]) }}"><button
                                                type="button" class="btn btn-success">Active</button></a>
                                    @else
                                        <a href="{{ route('category.status', [1, $category->id]) }}"><button
                                                type="button" class="btn btn-danger">Deactive</button></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}"><button type="button"
                                            class="btn btn-primary">Edit</button></a>
                                    <a href="{{ route('category.delete', $category->id) }}"><button type="button"
                                            class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
