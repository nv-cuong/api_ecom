@extends('admin.layout')
@section('page_title', 'Coupon')
@section('coupon_select')
@section('container')
    {{ session('success') }}
    <h1 class="mb10">Category</h1>
    <a href="{{ route('coupon.create') }}"><button type="button" class="btn btn-success">Add Coupon</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $coupons as $coupon )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->title }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->value }}</td>
                            <td>
                                <a href="{{ route('coupon.edit', $coupon->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="{{ route('coupon.delete', $coupon->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
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
