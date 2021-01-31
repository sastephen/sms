@extends('layouts.app')

@section('content')
<div class="">
    <a href="{{ route('stock.index') }}" class="btn btn-success">Back</a>
    <div class="row justify-content-center">
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('stock.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input name="price" step="any" type="number" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Qty</label>
                    <input name="qty" step="any" type="number" class="form-control" value="{{ old('qty') }}">
                    @error('qty')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                    @error('description')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">SKU</label>
                    <select name="sku_id" id="" class="form-control">
                    <option value="">Select SKU</option>
                    @foreach ($skus as $sku)
                        <option value="{{ $sku->id }}" class="form-control">{{ $sku->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="form-control">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input name="stock_image" type="file" class="form-control">
                    @error('stock_image')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection