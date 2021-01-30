@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="py-2">
                        <form action="/category" method="post">
                            @csrf
                            <div class="form-group row alert alert-secondary">
                                <input class="form-control col-8" type="text" name="name">
                                <button class="btn btn-success col-4">Add Category</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-footer">
                                    <div class="row">
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>


                                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input class="mr-3 ml-3" type="text" name="name" value="{{ $category->name }}">
                                            <button class="btn btn-warning">Update</button>
                                        </form>
                                    </div>

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