<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practica 01</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container jumbotron">
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                @yield('view')
            </div>
        </div>

    </div>
</body>
</html>
