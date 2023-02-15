@extends('admin.layout')
@section('page_title', 'Coupon')
@section('coupon_select')
@section('container')
    @if (session()->has('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>
    @endif
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->title }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->value }}</td>
                                <td>
                                    @if ($coupon->status == 1)
                                        <a href="{{ route('coupon.status', [0, $coupon->id]) }}"><button type="button"
                                                class="btn btn-success">Active</button></a>
                                    @else
                                        <a href="{{ route('coupon.status', [1, $coupon->id]) }}"><button type="button"
                                                class="btn btn-danger">Deactive</button></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('coupon.edit', $coupon->id) }}"><button type="button"
                                            class="btn btn-primary">Edit</button></a>
                                    <a href="{{ route('coupon.delete', $coupon->id) }}"><button type="button"
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
