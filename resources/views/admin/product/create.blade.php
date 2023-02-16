@extends('admin.layout')

@section('container')
    <h1 class="mb10">Manage Product</h1>
    <a href="{{ route('product.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    {{ session('success') }}
                    <div class="card">
                        <div class="card-header">Manage Product</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Product</h3>
                            </div>
                            <hr>
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Product name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="control-label mb-1">Category</label>
                                    <select id="category_id" name="category_id" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Image</label>
                                    <input id="image" name="image" type="file" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand" class="control-label mb-1">Brand</label>
                                    <input id="brand" name="brand" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('brand') }}">
                                    @error('brand')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="model" class="control-label mb-1">Model</label>
                                    <input id="model" name="model" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('model') }}">
                                    @error('model')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="short_desc" class="control-label mb-1">Short description</label>
                                    <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ old('short_desc') }}</textarea>
                                    @error('short_desc')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">Description</label>
                                    <textarea id="description" name="description" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="control-label mb-1">Keywords</label>
                                    <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ old('keywords') }}</textarea>
                                    @error('keywords')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="technical_specification" class="control-label mb-1">Technical
                                        specification</label>
                                    <textarea id="technical_specification" name="technical_specification" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">{{ old('technical_specification') }}</textarea>
                                    @error('technical_specification')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="uses" class="control-label mb-1">Uses</label>
                                    <textarea id="uses" name="uses" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ old('uses') }}</textarea>
                                    @error('uses')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="warranty" class="control-label mb-1">Warranty</label>
                                    <textarea id="warranty" name="warranty" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false">{{ old('warranty') }}</textarea>
                                    @error('warranty')
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
