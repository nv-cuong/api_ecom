@extends('admin.layout')
@section('page_title', 'Product')
@section('product_select')
@section('container')
    @if (session()->has('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>
    @endif
    <h1 class="mb10">Product</h1>
    <a href="{{ route('product.create') }}"><button type="button" class="btn btn-success">Add Product</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        <a href="{{ route('product.status', [0, $product->id]) }}"><button type="button"
                                                class="btn btn-success">Active</button></a>
                                    @else
                                        <a href="{{ route('product.status', [1, $product->id]) }}"><button type="button"
                                                class="btn btn-danger">Deactive</button></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}"><button type="button"
                                            class="btn btn-primary">Edit</button></a>
                                    <a href="{{ route('product.delete', $product->id) }}"><button type="button"
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
