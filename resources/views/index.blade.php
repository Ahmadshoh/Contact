<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ahmadshoh Nasrulloev">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body id="page-top">

<div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">
            <div class="container-fluid">
                <div class="row" style="margin-top: 25px;">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Контакты</h1>
                    <div class="text-right">
                        <form class="form-inline mt-2 mt-md-0" action="{{ route('search') }}" method="get">
                            <input class="form-control mr-sm-2" type="text" name="query" placeholder="Поиск" aria-label="Поиск">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Найти</button>
                        </form>
                    </div>
                </div>



                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
