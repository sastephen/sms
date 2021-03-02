<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        a img {
            display: none;
        }

        a:hover img {
            display: block;
            width: 100%;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ url('/images/'. $item->image) }}" width="100%" alt="{{ $item->name }}">
            </div>
            <div class="col-md-6">
                <h5 class="my-3"><b>Name : </b>{{ $item->name }}</h5>
                <h5><b>SKU : </b>{{ $item->sku->name }}</h5>
                <h5><b>Category : </b>{{ $item->category->name }}</h5>
                <h5><b>Price : </b>{{ $item->price }}</h5>
                <h5><b>Qty : </b>{{ $item->qty }}</h5>
                <h5><b>Status : </b>{{ $item->status ? 'Active' : 'Disable' }} </h5>
                <h5><b>Description : </b>{{ $item->description }}</h5>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
