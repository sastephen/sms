@extends('layouts.app')

@section('content')
<div class="">
    <a href="{{ route('stock.create') }}" class="btn btn-success">Add New</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- /.card-header -->
            <div class="card-body">
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
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($stocks as $stock)
                        {{-- <img src="{{ url('/images/'. $stock->image) }}" alt=""> --}}
                        <tr>
                            <td>{{ $stock->id }}</td>
                            {{-- <td><a href="#">{{ $stock->name }}<img src="{{ url('/images/'. $stock->image) }}"
                                width="100%" alt=""></a></td> --}}
                            <td>{{ $stock->name }}</td>
                            <td>{{ $stock->sku->name }}</td>
                            <td>{{ $stock->category->name }}</td>
                            <td>{{ $stock->price }}</td>
                            <td>{{ $stock->qty }}</td>
                            @if ($stock->status === 1 && $stock->qty > 0 )
                            {{-- <td class="text-success">Active</td> --}}
                            <td>
                                <div>
                                    <button type="button" class="text-success dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-check"></i> Active
                                    </button>

                                    <div class="dropdown-menu">
                                        <form action="stock/{{ $stock->id }}/disable" method="post">
                                            @csrf
                                            @method('put')
                                            {{-- <button class="dropdown-item">Disable</button> --}}
                                            {{-- <input class="dropdown-item" type="submit" value="Disable"> --}}
                                            <button class="dropdown-item text-success"><i class="fas fa-times"></i>
                                                Disable
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                            @else
                            {{-- <td class="text-danger">Disable</td> --}}
                            <td>
                                <div>
                                    <button type="button" class="text-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-times"></i> Disable
                                    </button>

                                    <div class="dropdown-menu">
                                        <form action="stock/{{ $stock->id }}/active" method="post">
                                            @csrf
                                            @method('put')
                                            <button class="dropdown-item text-success"><i class="fas fa-check"></i>
                                                Active</button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                            @endif
                            <td>
                                <button type="button" class="btn btn-info mb-1" data-toggle="modal"
                                    data-target="#{{ $stock->id }}">
                                    <i class="fas fa-clipboard-list"></i> Detail
                                </button>

                        
                            </td>
                        </tr>
                        <!-- modal medium -->
                        <div class="modal fade" id="{{ $stock->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="mediumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mediumModalLabel">{{ $stock->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row py-2">

                                            <div class="col-6">
                                                <img src="{{ url('/images/'. $stock->image) }}" width="50%" alt="{{ $stock->name }}">
                                            </div>
                                            <div class="col-6">

                                                {!! QrCode::generate( route('item', $stock->id)  ); !!}
                                            </div>
                                        </div>
                                        <h5><b>Name : </b>{{ $stock->name }}</h5>
                                        <h5><b>SKU : </b>{{ $stock->sku->name }}</h5>
                                        <h5><b>Category : </b>{{ $stock->category->name }}</h5>
                                        <h5><b>Price : </b>{{ $stock->price }}</h5>
                                        <h5><b>Qty : </b>{{ $stock->qty }}</h5>
                                        <h5><b>Status : </b>{{ $stock->status ? 'Active' : 'Disable' }} </h5>
                                        <h5><b>Description : </b>{{ $stock->description }}</h5>
    
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-row mr-auto">
                                            <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-warning"><i
                                                    class="fas fa-edit"></i> Edit </a>
    
                                            <form action="{{ route('stock.destroy', $stock->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger ml-2"
                                                    onclick="return confirm('Are you sure want to delete?');"><i
                                                        class="fas fa-trash"></i> Delete</button>
                                            </form>
    
                                        </div>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                                class="fas fa-window-close"></i> Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal medium -->
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
