@extends('admin.layout')

@section('container')
    <h1 class="mb10">Manage Color</h1>
    <a href="{{ route('color.index') }}"><button type="button" class="btn btn-secondary">Back</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    {{ session('success') }}
                    <div class="card">
                        <div class="card-header">Manage Color</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Color</h3>
                            </div>
                            <hr>
                            <form action="{{ route('color.update', $color->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="color" class="control-label mb-1">Color</label>
                                    <input id="color" name="color" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ $color->color }}">
                                    @error('color')
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
