@extends('admin.layout')
@section('page_title', 'color')
@section('color_select')
@section('container')
    @if (session()->has('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>
    @endif
    <h1 class="mb10">color</h1>
    <a href="{{ route('color.create') }}"><button type="button" class="btn btn-success">Add color</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Color</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $key => $color)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $color->id }}</td>
                                <td>{{ $color->color }}</td>
                                <td>
                                    @if ($color->status == 1)
                                        <a href="{{ route('color.status', [0, $color->id]) }}"><button type="button"
                                                class="btn btn-success">Active</button></a>
                                    @else
                                        <a href="{{ route('color.status', [1, $color->id]) }}"><button type="button"
                                                class="btn btn-danger">Deactive</button></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('color.edit', $color->id) }}"><button type="button"
                                            class="btn btn-primary">Edit</button></a>
                                    <a href="{{ route('color.delete', $color->id) }}"><button type="button"
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
