@extends('admin.layout')
@section('page_title', 'size')
@section('size_select')
@section('container')
    {{ session('success') }}
    <h1 class="mb10">size</h1>
    <a href="{{ route('size.create') }}"><button type="button" class="btn btn-success">Add size</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizes as $key => $size)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $size->id }}</td>
                                <td>{{ $size->size }}</td>
                                <td>
                                    @if ($size->status == 1)
                                        <a href="{{ route('size.status', [0, $size->id]) }}"><button type="button"
                                                class="btn btn-success">Active</button></a>
                                    @else
                                        <a href="{{ route('size.status', [1, $size->id]) }}"><button type="button"
                                                class="btn btn-danger">Deactive</button></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('size.edit', $size->id) }}"><button type="button"
                                            class="btn btn-primary">Edit</button></a>
                                    <a href="{{ route('size.delete', $size->id) }}"><button type="button"
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
