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
                                <input class="form-control col-8" type="text" name="name" autofocus>
                                <button class="btn btn-success col-4"><i class="fas fa-folder-plus"></i> Add SKU </button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        @foreach ($skus as $sku)
                        @if (count($sku->stocks) === 0)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        @if (count($sku->stocks) == 0)
                                        <button type="button" class="btn btn-danger m-l-10 m-b-10 mr-2"><i class="fas fa-empty-set"></i> Out Of Stock
                                        </button>
                                        @endif

                                        <button type="button" class="btn btn-danger m-l-10 m-b-10 " data-toggle="modal" data-target="#staticModal">
                                            <i class="fas fa-trash"></i> Remove
                                        </button>

                                        <form action="{{ route('sku.update', $sku->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input class="mr-3 ml-3" type="text" name="name"
                                                value="{{ $sku->name }}">
                                            <button class="btn btn-info"><i class="fas fa-save"></i> Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal static -->
                        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
                        data-backdrop="static">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticModalLabel">Confirm?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are you sure want to <b>REMOVE {{ $sku->name }}</b> ?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('sku.destroy', $sku->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            REMOVE
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- end modal static -->
                        @endif
                        
                        @endforeach
                    </div>

                        <hr>
                    
                    <div class="row">
                        @foreach ($skus as $sku)
                        @if (count($sku->stocks))
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        @if (count($sku->stocks) <= 5)
                                        <button type="button" class="btn btn-warning m-l-10 m-b-10 mr-2">Stock:
                                            <span class="badge badge-light">{{ count($sku->stocks) }}</span>
                                        </button>
                                        @else 
                                        <button type="button" class="btn btn-success m-l-10 m-b-10 mr-2">Stock:
                                            <span class="badge badge-light">{{ count($sku->stocks) }}</span>
                                        </button>
                                        @endif

                                        <button type="button" class="btn btn-primary m-l-10 m-b-10 " data-toggle="modal" data-target="#{{ $sku->id }}">
											Show all <i class="fas fa-list-alt"></i>
										</button>

                                        <form action="{{ route('sku.update', $sku->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input class="mr-3 ml-3" type="text" name="name"
                                                value="{{ $sku->name }}">
                                            <button class="btn btn-info"><i class="fas fa-save"></i> Save</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- modal small -->
                                <div class="modal fade" id="{{ $sku->id }}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="smallmodalLabel"><b>{{ $sku->name }}</b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach ($sku->stocks as $item)
                                                    <p>{{ $item->name }}</p>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal small -->
                            </div>
                        </div>
                        @endif
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