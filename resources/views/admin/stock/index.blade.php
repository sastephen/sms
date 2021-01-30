@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('stock.create') }}" class="btn btn-success">Add New</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
             <!-- /.card-header -->
             <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table id="stocks" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Stock Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($stocks as $stock)
                        {{-- <img src="{{ url('/images/'. $stock->image) }}" alt=""> --}}
                        <tr>
                            <td><a href="#">{{ $stock->name }}<img src="{{ url('/images/'. $stock->image) }}" width="100%" alt=""></a></td>
                            <td>{{ $stock->category->name }}</td>
                            <td>{{ $stock->price }}</td>
                            <td>{{ $stock->qty }}</td>
                            <td>{{ $stock->description }}</td>
                            <td>
                                <div class="form-row">
                                    <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-warning">Edit </a>
                                <form action="{{ route('stock.destroy', $stock->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger ml-2" onclick="return confirm('Are you sure want to delete?');" >Delete</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Stock Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection