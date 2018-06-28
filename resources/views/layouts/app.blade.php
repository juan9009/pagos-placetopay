<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="wrapper">

        <div class="content-wrapper">
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/formValidation.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-validation.min.js') }}"></script>
    <script src="{{ asset('js/es_CL.js') }}"></script>
    <script src="{{ asset('js/respond.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/iniciarpago.js') }}"></script>
</body>

</html>