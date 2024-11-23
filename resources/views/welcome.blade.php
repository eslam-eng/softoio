<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>softoio</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="antialiased">

<div class="container">
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Avg Orders Price</h5>
                <p class="card-text">{{$avg_orders_price}}</p>
            </div>
        </div>
        <div class="card me-1" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total orders within month ago</h5>
                <p class="card-text">{{$total_orders_with_month_from_now}}</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total orders per product</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>product</td>
                            <td>total sales</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productsWithOrderSum as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->total_sales ?? 0}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{--                    {{$productsWithOrderSum->links()}}--}}
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top 20 product</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>product</td>
                            <td>total sales</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bestSellingProducts as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->total_sales ?? 0}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{--                    {{$productsWithOrderSum->links()}}--}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
