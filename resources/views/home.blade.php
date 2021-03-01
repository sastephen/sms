@extends('layouts.app')

@section('content')
<div class="section__content section__content--p30">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">overview</h2>
                <a href="{{ route('stock.create') }}" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>add stock</a>
                {{-- <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add stock</button> --}}
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $totalStockPrice }}</h2>
                            <span>Total Stock Value</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        {{-- <canvas id="widgetChart1"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $totalStocks }}</h2>
                            <span>Stocks</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        {{-- <canvas id="widgetChart2"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $totalCategory }}</h2>
                            <span>Categories</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        {{-- <canvas id="widgetChart3"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                        <div class="text">
                            <h2>${{ $totalStockPrice }}</h2>
                            <span>total earnings</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart4"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    
    <div class="row">
        <div class="col-lg-3">
            <h2 class="title-1 m-b-25 text-center">Latest SKU</h2>
            <div class="au-card bg-info au-card-top-countries m-b-40">
                <div class="au-card-inner">
                    <div class="table-responsive">
                        <table class="table table-top-countries">
                            <tbody>
                                {{-- <tr>
                                    <td>United States</td>
                                    <td class="text-right">$119,366.96</td>
                                </tr> --}}
                                @foreach ($latestSKU as $sku)
                                    <tr>
                                        <td>{{ $sku->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h2 class="title-1 m-b-25 text-center">Latest Stock</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>2018-09-29 05:57</td>
                            <td>100398</td>
                            <td>iPhone X 64Gb Grey</td>
                            <td class="text-right">$999.00</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$999.00</td>
                        </tr> --}}
                        @foreach ($latestStocks as $stock)
                            <tr>
                                <td>{{ $stock->name }}</td>
                                <td>{{ $stock->price }}</td>
                                <td>{{ $stock->qty }}</td>
                                <td>{{ $stock->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
            <h2 class="title-1 m-b-25 text-center">Latest Category</h2>
            <div class="au-card bg-info au-card-top-countries m-b-40">
                <div class="au-card-inner">
                    <div class="table-responsive">
                        <table class="table table-top-countries">
                            <tbody>
                                {{-- <tr>
                                    <td>United States</td>
                                    <td class="text-right">$119,366.96</td>
                                </tr> --}}
                                @foreach ($latestCategories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection