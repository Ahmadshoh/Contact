<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ahmadshoh Nasrulloev">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}" type="text/css">
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
                </div>

                @yield('content')
            </div>
        </div>
    </div>
</div>

</body>

</html>
