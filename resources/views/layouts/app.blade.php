<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/cropped-logo.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.css') }}"/>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Pace Loader -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/blue/pace-theme-minimal.min.css"
          rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js"></script>
</head>
<body>

@yield('content')

<script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
