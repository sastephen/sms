@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="py-2">
                        <form action="/sku" method="post">
                            @csrf
                            <div class="form-group row alert alert-secondary">
                                <input class="form-control col-8" type="text" name="name">
                                <button class="btn btn-success col-4">Add SKU</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        @foreach ($skus as $sku)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <form action="{{ route('sku.destroy', $sku->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete?');" >Delete</button>
                                        </form>


                                        <form action="{{ route('sku.update', $sku->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input class="mr-3 ml-3" type="text" name="name" value="{{ $sku->name }}">
                                            <button class="btn btn-warning">Update</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h4>Stocks: {{ count($sku->stocks) }}</h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection