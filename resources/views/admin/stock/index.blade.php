@extends('layouts.app')

@section('content')
<div class="section__content section__content--p30">
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
                            <th>id</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($stocks as $stock)
                        {{-- <img src="{{ url('/images/'. $stock->image) }}" alt=""> --}}
                        <tr>
                            <td>{{ $stock->id }}</td>
                            <td><a href="#">{{ $stock->name }}<img src="{{ url('/images/'. $stock->image) }}" width="100%" alt=""></a></td>
                            <td>{{ $stock->sku->name }}</td>
                            <td>{{ $stock->category->name }}</td>
                            <td>{{ $stock->price }}</td>
                            <td>{{ $stock->qty }}</td>
                            @if ($stock->status === 1 && $stock->qty > 0 )
                                {{-- <td class="text-success">Active</td> --}}
                                <td>
                                    <div>
                                        <button type="button" class="text-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Active
                                        </button>
                                        
                                        <div class="dropdown-menu">
                                            <form action="stock/{{ $stock->id }}/disable" method="post">
                                                @csrf
                                                @method('put')
                                            {{-- <button class="dropdown-item">Disable</button> --}}
                                            <input class="dropdown-item" type="submit" value="Disable">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                
                                @else
                            {{-- <td class="text-danger">Disable</td> --}}
                            <td>
                                <div>
                                    <button type="button" class="text-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Disable
                                    </button>
                                    
                                    <div class="dropdown-menu">
                                      <form action="stock/{{ $stock->id }}/active" method="post">
                                            @csrf
                                            @method('put')
                                        <button class="dropdown-item">Active</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            
                            @endif
                            <td>{{ $stock->description }}</td>
                            <td>
                                <div class="form-row">
                                    <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-warning">Edit </a>
                                    <form action="{{ route('stock.destroy', $stock->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ml-2" onclick="return confirm('Are you sure want to delete?');" >Del</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Status</th>
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