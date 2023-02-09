@extends('admin.layout')

@section('container')
    <h1 class="mb10">Manage Category</h1>
    <a href="{{ route('category.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    {{ session('success') }}
                    <div class="card">
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Category</h3>
                            </div>
                            <hr>
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="category_name" class="control-label mb-1">Category name</label>
                                    <input id="category_name" name="category_name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                    @error('category_name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_slug" class="control-label mb-1">Category slug</label>
                                    <input id="category_slug" name="category_slug" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                        @error('category_slug')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
