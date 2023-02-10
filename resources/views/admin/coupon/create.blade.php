@extends('admin.layout')

@section('container')
    <h1 class="mb10">Manage Category</h1>
    <a href="{{ route('coupon.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    {{ session('success') }}
                    <div class="card">
                        <div class="card-header">Manage Coupon</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Coupon</h3>
                            </div>
                            <hr>
                            <form action="{{ route('coupon.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title</label>
                                    <input id="title" name="title" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="code" class="control-label mb-1">Code</label>
                                    <input id="code" name="code" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('code') }}">
                                        @error('code')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="value" class="control-label mb-1">Value</label>
                                    <input id="value" name="value" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('value') }}">
                                        @error('value')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
